<?php

namespace App\Http\Controllers;

use App\Customers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

     //display all users
     public function index(){
        $customers = Customers::all();
        return view('list-customers',['customers'=>$customers]);
    }

    public function create(){
        return view('create-edit-customer');
    }

    public function edit($id){
        $customer = Customers::find($id);
        return view('create-edit-customer',['customer'=>$customer]);
    }

    public function show($id){
        $customer = Customers::find($id);
        return view('view-customer',['customer'=>$customer]);
    }


    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|max:50',
            'tin_number'=>'min:10',
            'status'=>'required'
         ]);


        $customer = new Customers;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->tin_number = $request->tin_number;
        $customer->address = $request->address;
        $customer->contact_person = $request->contact_person;
        $customer->status = $request->status;

        $customer->save();

        return redirect(route('customers'))->with('mssg','Successfully created a Customer');
    }

    public function update(Request $request){
        $customer = Customers::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->tin_number = $request->tin_number;
        $customer->address = $request->address;
        $customer->contact_person = $request->contact_person;
        $customer->status = $request->status;

        $customer->save();

        return redirect(route('edit-customer',['id'=>$request->id]))->with('mssg','Successfully Update Customer');
    }


    public function trash($id){
        $customer = Customers::find($id);
        if($customer->delete()){
            return "Successfully Deleted Customer - ".Str::upper($customer->name);
        }
    }

    public function delete(){

    }

}
