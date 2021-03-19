<?php

namespace App\Http\Controllers;

use App\Part;
use App\PartType;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartController extends Controller
{
    //display all parts
    public function index (){
      $parts=Part::with('vehicle','part_type')->get();
      return view('list-parts',['Parts'=>$parts]);
    }
    public function indexType (){
        $part_types=PartType::all();
        return view('list-part-type',['part_types'=>$part_types]);
      }
    public function show ($id){
        return Part::where('id',$id)->with('vehicle','part_type')->get()->first();
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
        $part = Part::where('id',$id)->with('vehicle','part_type')->get()->first();

        return view('create-edit-part',['part'=>$part],compact('part_types','vehicles'));
    }
    public function editType($id){
        $part_type = PartType::find($id);
        return view('create-edit-part-type',['part_type'=>$part_type]);
    }


    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|max:50',
            'vehicle'=>'required',
            'part_type'=>'required'
         ]);

        $parts = new Part;
        $parts->part_no = $request->part_no;
        $parts->name = $request->name;
        $parts->vehicle_id = $request->vehicle;
        $parts->part_type_id = $request->part_type;
        $parts->qty= $request->qty;
        $parts->save();

        return redirect(route('parts'))->with('mssg','Successfully created a Part');
    }

    public function storeType(Request $request){

        $this->validate($request,[
            'name'=>'required|max:50'
         ]);

        $part_type = new PartType;
        $part_type->name = $request->name;
        $part_type->save();
        return redirect(route('part-types'))->with('mssg','Successfully created a Part Type');
    }


    public function update(Request $request){
        $parts = Part::find($request->id);
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

    public function trash($id){
        $part = Part::find($id);
        if($part->delete()){
            return "Successfully Deleted Part - ".Str::upper($part->name);
        }
    }

    public function restore($id){
        $part = Part::find($id);
        if($part->restore()){
            return "Successfully Restored Part - ".Str::upper($part->name);
        }
    }
    public function trashType($id){
        $part_type = PartType::find($id);
        if($part_type->delete()){
            return "Successfully Deleted Part Type - ".Str::upper($part_type->name);
        }
    }

    public function restoreType($id){
        $part_type = PartType::find($id);
        if($part_type->restore()){
            return "Successfully Restored Part Type - ".Str::upper($part_type->name);
        }
    }
}
