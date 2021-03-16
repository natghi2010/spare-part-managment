@extends('layouts.master')

@section('title',isset($user->id) ? 'Edit User' : 'Create User')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($user->id) ? 'Edit' : 'Create'}} User</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($user->id) ? 'update-user':'store-user')}}" method="POST">

                @csrf

                @if(isset($user->id))
                    <input name="id" type="text" value="{{$user->id}}" readonly hidden>
                @endif

                <div class="form-group mb-4">
                    <label class="control-label">Name </label>
                    <input type="text" name="name" class="form-control" value="{{$user->name ?? old('name')}}">
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Email:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" name="email" class="form-control" value="{{$user->email ?? old('email')}}">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Type</label>
                    <select class="custom-select mb-4" name="type" value="{{$user->type ?? ''}}">
                        <option selected  disabled>Type</option>
                        <option value="Admin
                            {{(isset($user->id) && $user->type === 'Admin' || old('type') === 'Admin') ? 'Selected' : ''}}
                            ">Admin</option>
                        <option value="Employee" 
                            {{(isset($user->id) && $user->type === 'Employee' || old('type') === 'Employee') ? 'Selected' : ''}}
                            >Employee</option>
                        <option value="Manager" 
                            {{(isset($user->id) && $user->type === 'Manager' || old('type') === 'Manager') ? 'Selected' : ''}}
                            >Manager</option>
                    </select>

                </div>


                <button type="submit" class="btn btn-primary mt-3">{{isset($user->id) ? 'Update' : 'Submit'}} </button>
            </form>
           
           
            @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <br/>
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
           @endif



        </div>
    </div>

@endsection
