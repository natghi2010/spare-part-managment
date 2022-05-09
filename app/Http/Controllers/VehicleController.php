<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    // public function index(){
    //   $vehcile =Vehicle::with('parts.part_type')->get()->first();

    //   foreach($vehcile->parts as $part){
    //     echo $part->name.'<br/>';
    //   }
    // }
    //display all parts
    public function index(){
        $vehicles = Vehicle::all();
        return view('list-vehicles',['vehciles'=>$vehicles]);
    }

    public function create(){
        return view('create-edit-vehicle');
    }

    public function edit($id){
        $vehicle = Vehicle::find($id);
        return view('create-edit-vehicle',['vehicle'=>$vehicle]);
    }


    public function store(Request $request){
        $this->validate($request,[
            'model'=>'required|max:50'
         ]);

        $vehicle = new Vehicle;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;


        $vehicle->save();

        return redirect(route('vehicles'))->with('mssg','Successfully created a vehicle');
    }

    public function update(Request $request){
        $vehicle = Vehicle::find($request->id);
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->save();

        return redirect(route('edit-vehicles',['id'=>$request->id]))->with('mssg','Successfully Update Supplier');
    }

    public function trash($id){
        $vehicle = Vehicle::find($id);
        if($vehicle->delete()){
            return "Successfully Deleted Vehicle - ".Str::upper($vehicle->model);
        }
    }

    public function restore($id){
        $vehicle = Vehicle::find($id);
        if($vehicle->restore()){
            return "Successfully Restored Vehicle - ".Str::upper($vehicle->model);
        }
    }
}
