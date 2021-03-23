@extends('layouts.master')

@section('title', 'Profile')

@section('content')

    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow container">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 bg-default">
                        <h4>Profile</h4>
                        <p class="text-success">{{ session('photoMssg') }}</p>
                        <p class="text-danger">{{ session('err') }}</p>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form class="form-vertical" action="{{ route('change-photo') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">

                        <div class="form-group mb-4 col-md-8 col-xs-12">
                            <label class="control-label">Photo</label>
                            <input type="file" name="photo">
                        </div>


                    </div>

                    <center>
                        <button class="btn btn-success" type="submit">Change Photo</button>
                    </center>

                </form>

            </div>



        </div>
        <div class="statbox widget box box-shadow container">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 bg-default">
                        <h4>Change Password</h4>
                        <p class="text-success">{{ session('mssg') }}</p>
                        <p class="text-danger">{{ session('err') }}</p>
                    </div>
                </div>
            </div>


            <div class="widget-content widget-content-area">
                <form class="form-vertical" action="{{ route('change-password') }}" method="POST">

                    @csrf
                    <div class="">

                        <div class="form-group mb-4">
                            <label class="control-label">Current Password</label>
                            <input type="text" name="current_password" class="form-control">
                        </div>

                        <div class="form-group mb-4">
                            <label class="control-label">New Password</label>
                            <input type="text" name="new_password" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Confirm Password</label>
                            <input type="text" name="confirm_password" class="form-control">
                        </div>

                    </div>

                    <center>
                        <button class="btn btn-primary mt-3" type="submit">Change Password</button>
                    </center>

                </form>

            </div>
        </div>

    @endsection
