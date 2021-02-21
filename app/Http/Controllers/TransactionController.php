<?php

namespace App\Http\Controllers;

use App\Parts;
use App\PartType;
use App\Suppliers;
use App\Transaction;
use App\Vehicle;
use App\ActivityLog;
use App\Customers;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function loadBuyForm()
    {
        $suppliers = Suppliers::all();
        $parts = Parts::all();
        $vehicles = Vehicle::all();
        return view('buy-parts', compact('suppliers', 'parts', 'vehicles'));
    }

    public function loadSellForm()
    {
        $customers = Customers::all();
        $parts = Parts::all();
        $vehicles = Vehicle::all();
        return view('sell-parts',compact('customers', 'parts', 'vehicles'));
    }


    public function loadFormComponent($componentType, $part_type_id = false)
    {
        if ($componentType == 'part_type') {
            $label = 'Part Type';
            $options =  PartType::all();
            return view('components.dropDown', ['componentType' => $componentType, 'options' => $options, 'label' => $label]);
        } else {
            $label = 'Part';
            $options =  Parts::where('part_type_id', $part_type_id)->get();
            return view('components.dropDown', ['componentType' => $componentType, 'options' => $options, 'label' => $label]);
        }
    }


    public function buyPart(Request $request)
    {
        $transaction  =  new Transaction;
        $transaction->type = 'Buy';
        $transaction->user_id = auth()->user()->id;

        //from form
        $transaction->supplier_id = $request->supplier_id;
        $transaction->vehicle_id = $request->vehicle_id;
        $transaction->part_type_id = $request->part_type_id;
        $transaction->part_id = $request->part_id;
        $transaction->qty = $request->qty;
        $transaction->price = $request->price;
        $transaction->date = $request->date;

        $transaction->save();

        $new_balance =  $transaction->part->qty + $transaction->qty;
        $transaction_id = 'TRBY-' . (1000 + $transaction->id);

        //updating balances
        $transaction->update(['new_balance' => $new_balance, 'transaction_id' => $transaction_id]);
        $transaction->part->update(['qty' => $new_balance]);



        $transaction->part->update(['qty' => $new_balance]);


        ActivityLog::create(['user_id'=>auth()->user()->id,'action'=>'Bought '.$transaction->part->name]);

        return redirect(route('dashboard'));
    }

    public function sellPart(Request $request)
    {
        $transaction  =  new Transaction;
        $transaction->type = 'Sell';





        $transaction->user_id = auth()->user()->id;

        //from form
        $transaction->customer_id = $request->customer_id;
        $transaction->vehicle_id = $request->vehicle_id;
        $transaction->part_type_id = $request->part_type_id;
        $transaction->part_id = $request->part_id;
        $transaction->qty = $request->qty;
        $transaction->price = $request->price;
        $transaction->date = $request->date;



        $transaction->save();

        $new_balance =  $transaction->part->qty - $transaction->qty;
        $transaction_id = 'TRBY-' . (1000 + $transaction->id);

        //updating balances
        $transaction->update(['new_balance' => $new_balance, 'transaction_id' => $transaction_id]);
        $transaction->part->update(['qty' => $new_balance]);



        $transaction->part->update(['qty' => $new_balance]);


        ActivityLog::create(['user_id'=>auth()->user()->id,'action'=>'sold '.$transaction->part->name]);

        return redirect(route('dashboard'));




    }
}
