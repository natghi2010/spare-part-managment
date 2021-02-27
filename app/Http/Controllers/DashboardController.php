<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function createTimeStampAlias(){
        $activity_logs = ActivityLog::all();
        $now = Carbon::now();
        foreach($activity_logs as $log){
            $log->duration = $log->created_at->diffForHumans(null,true).' ago';
        }

      
        $sorted = $activity_logs->sortBy('duration')->skip(0)->take(6);
        return view('dashboard',['activity_logs'=>$sorted]);

    }
}
