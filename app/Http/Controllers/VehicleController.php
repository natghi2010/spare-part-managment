<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
      $vehcile =Vehicle::with('parts.part_type')->get()->first();

      foreach($vehcile->parts as $part){
        echo $part->name.'<br/>';
      }
    }
}
