<?php

namespace App\Http\Controllers;

use App\Suppliers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplierController extends Controller
{

    //display all users
    public function index(){
        $suppliers = Suppliers::all();
        return view('list-suppliers',['suppliers'=>$suppliers]);
    }

    public function create(){
        return view('create-edit-supplier');
    }

    public function edit($id){
        $supplier = Suppliers::find($id);
        return view('create-edit-supplier',['supplier'=>$supplier]);
    }


    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|max:50',
            'tin_number'=>'min:10',
            'status'=>'required'
         ]);

        $supplier = new Suppliers;
        $supplier->name = $request->name;
        $supplier->country_of_origin = $request->country_of_origin;
        $supplier->tin_number = $request->tin_number;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->status = $request->status;

        $supplier->save();

        return redirect(route('suppliers'))->with('mssg','Successfully created a Supplier');
    }

    public function update(Request $request){
        $supplier = Suppliers::find($request->id);
        $supplier->name = $request->name;
        $supplier->country_of_origin = $request->country_of_origin;
        $supplier->tin_number = $request->tin_number;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->status = $request->status;
        $supplier->save();

        return redirect(route('edit-supplier',['id'=>$request->id]))->with('mssg','Successfully Update Supplier');
    }

    public function trash($id){
        $supplier = Suppliers::find($id);
        if($supplier->delete()){
            return "Successfully Deleted Supplier - ".Str::upper($supplier->name);
        }
    }

    public function delete(){

    }
}
