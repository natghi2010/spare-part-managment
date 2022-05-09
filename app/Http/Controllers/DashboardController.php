<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function createTimeStampAlias(){
        $activity_logs = ActivityLog::get()->sortByDesc('id')->skip(0)->take(6);

        foreach($activity_logs as $log){
            $log->duration = $log->created_at->diffForHumans(null,true).' ago';
        }

        return view('dashboard',['activity_logs'=>$activity_logs]);

    }
}
