@extends('layouts.master')

@section('title',isset($customer->id) ? 'Edit Customer' : 'Create Customer')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($customer->id) ? 'Edit' : 'Create'}} customer</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($customer->id) ? 'update-customer':'store-customer')}}" method="POST">

                @csrf

                @if(isset($customer->id))
                    <input name="id" type="text" value="{{$customer->id}}" readonly hidden>
                @endif

                <div class="form-group mb-4">
                    <label class="control-label">Name </label>
                    <input type="text" name="name" class="form-control" value="{{$customer->name ?? old('name')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Tin Number </label>
                    <input type="text" name="tin_number" class="form-control" value="{{$customer->tin_number ?? old('tin_number')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Phone Number </label>
                    <input type="text" name="phone" class="form-control" value="{{$customer->phone ?? old('phone')}}">
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Email:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" name="email" class="form-control" value="{{$customer->email ?? old('email')}}">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Address </label>
                    <input type="text" name="address" class="form-control" value="{{$customer->address ?? old('address')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Contact Person</label>
                    <input type="text" name="contact_person" class="form-control" value="{{$customer->contact_person ?? old('contact_person')}}">
                </div>

                <div class="form-group mb-4" >
                    <label class="control-label">Status</label>

                <div class="custom-control custom-radio custom-control-inline" >
                    <input type="radio" value="active"
                    {{(isset($customer->id) && $customer->status=="active" || old('status') === 'active')? "checked" : "" }}
                     id="active" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="active">Active</label>
                    </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="inactive"
                    {{ (isset($customer->id) && $customer->status=="inactive" || old('status') === 'inactive')? "checked" : "" }}
                    id="inactive" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="inactive">Inactive</label>
                </div>

                <button type="submit" class="btn btn-primary mt-3">{{isset($customer->id) ? 'Update' : 'Submit'}} </button>
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
