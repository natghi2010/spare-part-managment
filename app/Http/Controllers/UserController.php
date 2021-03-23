<?php

namespace App\Http\Controllers;

use App\User;
use App\ActivityLog;
use App\Part;
use App\PartType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //display all users
    public function index()
    {


        $users = User::all();
        return view('list-users', ['users' => $users]);
    }

    public function create()
    {
        return view('create-edit-user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('create-edit-user', ['user' => $user]);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'type' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->password = Hash::make('admin');
        $user->save();

        //Logging Activity START
        $activity_log = new ActivityLog;
        $activity_log->user_id = auth()->user()->id;
        $activity_log->action = 'Added User';
        $activity_log->save();
        //Logging Activity END

        return redirect(route('users'))->with('mssg', 'Successfully created a User');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->save();

        return redirect(route('edit-user', ['id' => $request->id]))->with('mssg', 'Successfully Update User');
    }


    public function trash($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return "Successfully Deleted User - " . Str::upper($user->name);
        }
    }

    public function restore($id)
    {
        $user = User::find($id);
        if ($user->restore()) {
            return "Successfully Restored User - " . Str::upper($user->name);
        }
    }


    public function showUsersActivity()
    {
        $activity_logs = ActivityLog::with('user')->get();
        return view('activity-log', ['activity_logs' => $activity_logs]);
    }
    public function showMyActivity()
    {

        $user =  User::where('id', auth()->user()->id)->with('activity_logs')->get()->first();
        return view('activity-log', ['activity_logs' => $user->activity_logs]);
    }



    public function createTimeStampAlias()
    {
        $activity_logs = ActivityLog::all();
        $now = Carbon::now();
        foreach ($activity_logs as $log) {
            $log->duration = $log->created_at->diffForHumans($now);
        }
        $activity_logs = $activity_logs->sortBy('duration')->skip(0)->take(6);
        return view('dashboard', ['activity_logs' => $activity_logs]);
    }


    public function profile()
    {
        return view('profile');
    }

    public function changePassword(Request $request)
    {

        $user = User::find(auth()->user()->id);

        if (Hash::check($request->current_password, $user->password)) {
            if ($request->new_password == $request->confirm_password) {


                $user->update(['password' => hash::make($request->new_password)]);

                return redirect(route('profile'))->with('mssg', 'Password successfully Changed');
            } else {
                return redirect(route('profile'))->with('err', 'Your new password must match your confirm password');
            }
        } else {
            return redirect(route('profile'))->with('err', 'Your current password does not match our records');
        }
    }

    public function changePhoto(Request $request){

        $this->validate($request, [
            'photo' => 'required',
        ]);

        $photo = $request->file('photo');
        $filename = $photo->getClientOriginalName();
        //when moving, use public path
        $photo->move(public_path(),$filename);
       
        $user = User::find(auth()->user()->id);
        //when refering use url
        $user->photo = url($filename);
        $user->save();
        return redirect(route('profile'))->with('photoMssg','Successfully updated Photo');
    }
}
