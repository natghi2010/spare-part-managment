<?php

namespace App\Http\Controllers;

use App\Parts;
use App\PartType;
use App\Vehicle;
use Illuminate\Http\Request;

class PartController extends Controller
{
    //display all parts
    public function index (){
      $parts=Parts::with('vehicle','part_type')->get();
      return view('list-parts',['Parts'=>$parts]);
    }
    public function indexType (){
        $part_types=PartType::all();
        return view('list-part-type',['part_types'=>$part_types]);
      }
    public function show ($id){
        return Parts::where('id',$id)->with('vehicle','part_type')->get()->first();
    }
    public function create(){
        $vehicles = Vehicle::all(['id','model']);
        $part_types = PartType::all(['id','name']);
        return view('create-edit-part',compact('vehicles'),compact('part_types'));

    }
    public function createType(){
        return view('create-edit-part-type');

    }

    public function edit($id){
        $vehicles = Vehicle::all(['id','model']);
        $part_types = PartType::all(['id','name']);
        $part = Parts::where('id',$id)->with('vehicle','part_type')->get()->first();

        return view('create-edit-part',['part'=>$part],compact('part_types','vehicles'));
    }
    public function editType($id){
        $part_type = PartType::find($id);
        return view('create-edit-part-type',['part_type'=>$part_type]);
    }


    public function store(Request $request){
        $parts = new Parts;
        $parts->part_no = $request->part_no;
        $parts->name = $request->name;
        $parts->vehicle_id = $request->vehicle_id;
        $parts->part_type_id = $request->part_type_id;
        $parts->qty= $request->qty;
        $parts->save();

        return redirect(route('parts'))->with('mssg','Successfully created a Part');
    }

    public function storeType(Request $request){

        $part_type = new PartType;
        $part_type->name = $request->name;
        $part_type->save();
        return redirect(route('part-types'))->with('mssg','Successfully created a Part Type');
    }


    public function update(Request $request){
        $parts = Parts::find($request->id);
        $parts->part_no = $request->part_no;
        $parts->name = $request->name;
        $parts->vehicle_id = $request->vehicle_id;
        $parts->part_type_id = $request->part_type_id;
        $parts->qty= $request->qty;
        $parts->save();

        return redirect(route('edit-parts',['id'=>$request->id]))->with('mssg','Successfully Update Supplier');
    }
    public function updateType(Request $request){

        $part_type = PartType::find($request->id);
        $part_type->name = $request->name;
        $part_type->save();
        return redirect(route('part-types',['id'=>$request->id]))->with('mssg','Successfully Update Supplier');
    }

    public function delete(){

    }
}
