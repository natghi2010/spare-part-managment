<?php

namespace App\Http\Controllers;

use App\User;

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

        return redirect(route('users'));
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
 
}
