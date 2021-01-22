@extends('layouts.master')

@section('title','Create')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Create User</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="#">
                <div class="form-group mb-4">
                    <label class="control-label">First Name:</label>
                    <input type="text" name="first_name" class="form-control" >
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" >
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Email:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" name="email" class="form-control" >
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Password:</label>
                    <div class="input-group mb-4">
                        <input type="password" name="pass" class="form-control" >
                        <span class="input-group-addon"><i class="icon-user"></i></span>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Confirm Password:</label>
                    <div class="input-group">
                        <input type="password" name="cpass" class="form-control">
                        <span class="input-group-addon"><i class="icon-user"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>



        </div>
    </div>

@endsection
