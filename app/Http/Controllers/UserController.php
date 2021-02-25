<?php

namespace App\Http\Controllers;

use App\User;
use App\ActivityLog;


use Illuminate\Http\Request;

class UserController extends Controller
{

    //display all users
    public function index(){
        $users = User::all();
        return view('list-users',['users'=>$users]);
    }

    public function create(){
        return view('create-edit-user');
    }

    public function edit($id){
        $user = User::find($id);
        return view('create-edit-user',['user'=>$user]);
    }


    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->password = bcrypt('admin');
        $user->save();

        //Logging Activity START
        $activity_log = new ActivityLog;
        $activity_log->user_id = auth()->user()->id;
        $activity_log->action = 'Added User';
        $activity_log->save();
         //Logging Activity END

        return redirect(route('users'))->with('mssg','Successfully created a User');
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->save();

        return redirect(route('edit-user',['id'=>$request->id]))->with('mssg','Successfully Update User');
    }

    public function delete(){

    }

    public function showUsersActivity(){
        $activity_logs = ActivityLog::with('user')->get();
        return view('activity-log',['activity_logs'=>$activity_logs]);
    }
    public function showMyActivity(){

       $user =  User::where('id',auth()->user()->id)->with('activity_logs')->get()->first();
       return view('activity-log',['activity_logs'=>$user->activity_logs]);

    }

}
