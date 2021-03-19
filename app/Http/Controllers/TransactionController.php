<?php

namespace App\Http\Controllers;

use App\Part;
use App\PartType;
use App\Suppliers;
use App\Transaction;
use App\Vehicle;
use App\ActivityLog;
use App\Ammendment_tracker;
use App\Customers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function PHPSTORM_META\type;

class TransactionController extends Controller
{

    public function index(){
        $customers = Customers::all();
        $suppliers = Suppliers::all();
        $parts = Part::all();
        $vehicles = Vehicle::all();
        $transactions = Transaction::all();
        $part_type= PartType::all();
        $users = User::all();

        return view('list-transaction',['transactions'=>$transactions],
        compact('customers','suppliers', 'parts', 'vehicles','part_type','users'));
    }

    public function loadBuyForm()
    {
        $suppliers = Suppliers::all();
        $parts = Part::all();
        $vehicles = Vehicle::all();
        return view('buy-parts', compact('suppliers', 'parts', 'vehicles'));
    }

    public function edit($transaction_id){
        $transaction = Transaction::find($transaction_id);
        $vehicles = Vehicle::all();
        $part_types = PartType::all();
        $parts = Part::all();
        $suppliers = Suppliers::all();
        $customers = Customers::all();

        return view($transaction->type.'-parts',compact('transaction','vehicles','part_types','parts','suppliers','customers'));
    }


    public function loadSellForm()
    {
        $customers = Customers::all();
        $parts = Part::all();
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
            $options =  Part::where('part_type_id', $part_type_id)->get();
            return view('components.dropDown', ['componentType' => $componentType, 'options' => $options, 'label' => $label]);
        }
    }


    public function buyPart(Request $request)
    {

        $this->validate($request,[
            'supplier'=>'required',
            'qty'=>'min:1',
            'price'=>'min:1',
            'date'=>'required'
         ]);

        $transaction  =  new Transaction;
        $transaction->type = 'Buy';
        $transaction->user_id = auth()->user()->id;

        //from form
        $transaction->supplier_id = $request->supplier;
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




        ActivityLog::create(['user_id'=>auth()->user()->id,'action'=>'Bought '.$transaction->part->name]);

        return redirect(route('dashboard'))->with('mssg','Transaction Successful');
    }

    public function sellPart(Request $request)
    {


        if(Part::find($request->part_id)->qty < $request->qty){
            return redirect(route('sell-parts'))->with('mssg','The quantity you inserted ('.$request->qty.') is more than the stock ('.Part::find($request->part_id)->qty.').');
        }

        $this->validate($request,[
            'customer'=>'required',
            'qty'=>'min:1',
            'price'=>'min:1',
            'date'=>'required'
         ]);



        $transaction  =  new Transaction;
        $transaction->type = 'Sell';


        $transaction->user_id = auth()->user()->id;

        //from form
        $transaction->customer_id = $request->customer;
        $transaction->vehicle_id = $request->vehicle_id;
        $transaction->part_type_id = $request->part_type_id;
        $transaction->part_id = $request->part_id;
        $transaction->qty = $request->qty;
        $transaction->price = $request->price;
        $transaction->date = $request->date;

        $transaction->save();

        $new_balance =  $transaction->part->qty - $transaction->qty;


        $transaction_id = 'TRSL-' . (1000 + $transaction->id);

        //updating balances
        $transaction->update(['new_balance' => $new_balance, 'transaction_id' => $transaction_id]);


        //**NEEDS CHECK */
        $transaction->part->update(['qty' => $new_balance]);


        ActivityLog::create(['user_id'=>auth()->user()->id,'action'=>'sold '.$transaction->part->name]);

        return redirect(route('dashboard'))->with('mssg','Transaction Successful');


    }


    public function loadDailyGraphData(){

        $buy_daily_results = array(
            "Mon"=>20,
            "Tue"=>30,
            "Wed"=>40,
            "Thu"=>25,
            "Fri"=>21,
            "Sat"=>50
        );

        $sell_daily_results = array(
            "Mon"=>25,
            "Tue"=>31,
            "Wed"=>12,
            "Thu"=>23,
            "Fri"=>41,
            "Sat"=>31
        );

        $labels = [];
        $buy_values = [];
        $sell_values = [];
        $total_buy= 2000 ;
        $total_sale = 5000 ;
        $total_profit = $total_sale - $total_buy;

        foreach($buy_daily_results as $date=>$transaction){
            array_push($labels,$date);
            array_push($buy_values,$transaction);
        }

        foreach($sell_daily_results as $date=>$transaction){
            array_push($sell_values,$transaction);
        }


        return array(
            'labels'=>$labels,
            'buy_values'=>$buy_values,
            'sell_values'=>$sell_values,
            'total_profit'=>$total_profit
        );

    }


    public function loadTopSellingPartTypeGraphData(){

        //get all part types
        $part_types = PartType::all();

        //creating our containers
        $labels = [];
        $sell_values = [];


        //filling our containers
        foreach($part_types as $part_type){
            array_push($labels,$part_type->name);
            array_push($sell_values,$part_type->sales = Transaction::
                                     where('part_type_id',$part_type->id)
                                   ->where('type','Sell')
                                   ->get()->count());
        }

        return array(
            "labels"=>$labels,
            "values"=>$sell_values
        );


    }
    public function loadDailySalesGraphData(){

        $last_week = array(
            "Mon"=>20,
            "Tue"=>30,
            "Wed"=>40,
            "Thu"=>25,
            "Fri"=>21,
            "Sat"=>50
        );

        $sales = array(
            "Mon"=>50,
            "Tue"=>80,
            "Wed"=>20,
            "Thu"=>55,
            "Fri"=>13,
            "Sat"=>80
        );

        $labels = [];
        $last_week_values = [];
        $sale_values = [];



        foreach($last_week as $date=>$transaction){
            array_push($labels,$date);
            array_push($last_week_values,$transaction);
        }

        foreach($sales as $date=>$transaction){
            array_push($sale_values,$transaction);
        }


        return array(
            'labels'=>$labels,
            'last_week_values'=>$last_week_values,
            'sale_values'=>$sale_values,



        );


    }
    public function update(Request $request){
        $transaction= Transaction::find($request->id);

        if(isset($transaction->customer_id)){
            $transaction->customer_id = $request->customer;
            $transaction->type = 'Sell';
        }
        if(isset($transaction->supplier_id))
        {
            $transaction->supplier_id = $request->supplier;
            $transaction->type = 'Buy';
        }
        $transaction->vehicle_id = $request->vehicle_id;
        $transaction->part_type_id = $request->part_type_id;
        $transaction->part_id = $request->part_id;
        $transaction->qty = $request->qty;
        $transaction->price = $request->price;
        $transaction->date = $request->date;
        $transaction->save();

        Ammendment_tracker::create(['user_id'=>auth()->user()->id,'transaction_id'=>$transaction->transaction_id]);

        return redirect(route('edit-transaction',['transaction_id'=>$request->id]))->with('mssg','Successfully Updated Transaction');
    }

}
