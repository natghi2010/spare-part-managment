@extends('layouts.master')

@section('title',isset($supplier->id) ? 'Edit Supplier' : 'Create Supplier')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($supplier->id) ? 'Edit' : 'Create'}} Supplier</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($supplier->id) ? 'update-supplier':'store-supplier')}}" method="POST">

                @csrf

                @if(isset($supplier->id))
                    <input name="id" type="text" value="{{$supplier->id}}" readonly hidden>
                @endif

                <div class="form-group mb-4">
                    <label class="control-label">Name </label>
                    <input type="text" name="name" class="form-control" value="{{$supplier->name ??  old('name')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Country Of Origin </label>
                    <select class="custom-select mb-4" name="country_of_origin" value="{{$supplier->country_of_origin ?? ''}}">

                        <option selected disabled>Country Of Origin</option>
                        <option value="Germany"
                            {{ (isset($supplier->id) && $supplier->country_of_origin=="Germany" || old('country_of_origin') === 'Germany')? "selected" : "" }}
                            >Germany</option>
                        <option value="USA"
                            {{ (isset($supplier->id) && $supplier->country_of_origin=="USA" || old('country_of_origin') === 'USA')? "selected" : "" }}
                            >USA</option>
                        <option value="China"
                            {{ (isset($supplier->id) && $supplier->country_of_origin=="China" || old('country_of_origin') === 'China')? "selected" : "" }}
                            >China</option>
                    </select>

                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Tin Number </label>
                    <input type="text" name="tin_number" class="form-control" value="{{$supplier->tin_number ??  old('tin_number')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Phone </label>
                    <input type="text" name="phone" class="form-control" value="{{$supplier->phone ??  old('phone')}}">
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Email:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" name="email" class="form-control" value="{{$supplier->email ??  old('email')}}">
                    </div>
                </div>
                <div class="form-group mb-4" >
                    <label class="control-label">Status</label>
                    {{-- <input type="text" name="status" class="form-control" value="{{$supplier->status ?? ''}}">
                 --}}
                 {{-- <div class="custom-control custom-radio custom-control-inline" >
                    <input type="radio"  id="option1" name="status" value="inactive"  {{ ($supplier->status=="inactive")? "checked" : "" }} >inactive</label>
                    <input type="radio" id="option2" name="status" value="active" {{ ($supplier->status=="active")? "checked" : "" }} >active</label>
                </div> --}}
                <div class="custom-control custom-radio custom-control-inline" >
                    <input type="radio" value="active"
                    {{ (isset($supplier->id) && $supplier->status=="active" || old('status') === 'active')? "checked" : "" }}
                    id="active" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="active">Active</label>
                    </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="inactive"
                    {{ (isset($supplier->id) && $supplier->status=="inactive" || old('status') === 'inactive')? "checked" : "" }}
                    id="inactive" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="inactive">Inactive</label>
                </div>


                </div>

                <button type="submit" class="btn btn-primary mt-3">{{isset($supplier->id) ? 'Update' : 'Submit'}} </button>
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
