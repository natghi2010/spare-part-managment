<?php

namespace App\Http\Controllers;

use App\Parts;
use App\Suppliers;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function loadBuyForm()
    {
        $suppliers = Suppliers::all();
        $parts = Parts::all();
        return view('buy-parts',compact('suppliers','parts'));
    }

    public function loadSellForm()
    {
        return view('sell-parts');
    }


    public function sellPart()
    {
       $transaction  =  New Transaction();
       $transaction->type = 'Sell';

       $transaction->save();

       Parts::find($transaction->part_id)->update(['qty'=>$transaction->new_balance]);
    }
    public function buyPart()
    {
        $transaction  =  New Transaction();
        $transaction->type = 'Buy';


        Parts::find($transaction->part_id)->update(['qty'=>$transaction->new_balance]);
    }
}
