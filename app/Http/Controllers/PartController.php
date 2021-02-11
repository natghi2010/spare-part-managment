<?php

namespace App\Http\Controllers;

use App\Parts;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index (){
      return Parts::with('vehicle','part_type')->get();
    }
    public function show ($id){
      return Parts::where('id',$id)->with('vehicle','part_type')->get()->first();
    }
}
