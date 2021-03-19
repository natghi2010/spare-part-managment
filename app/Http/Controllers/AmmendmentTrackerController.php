<?php

namespace App\Http\Controllers;

use App\Ammendment_tracker;
use Illuminate\Http\Request;

class AmmendmentTrackerController extends Controller
{
    //
    public function index (){
        $ammendments=Ammendment_tracker::all();
        return view('list-ammendments',['ammendments'=>$ammendments]);
      }
}
