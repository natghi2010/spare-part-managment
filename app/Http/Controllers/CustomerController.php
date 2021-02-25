<?php

namespace App\Http\Controllers;

use App\Customers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //


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


    public function store(Request $request){
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

    public function delete(){

    }

}
