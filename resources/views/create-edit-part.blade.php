@extends('layouts.master')

@section('title',isset($part->id) ? 'Edit Part' : 'Create Part')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($part->id) ? 'Edit' : 'Create'}} Parts</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($part->id) ? 'update-parts':'store-parts')}}" method="POST">

                @csrf

                @if(isset($part->id))
                    <input name="id" type="text" value="{{$part->id}}" readonly hidden>
                @endif



                <div class="form-group mb-4">
                    <label class="control-label">Part Number </label>
                    <input type="text" name="part_no" class="form-control" value="{{$part->part_no ??  old('part_no')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Name </label>
                    <input type="text" name="name" class="form-control" value="{{$part->name ??  old('name')}}">
                </div>
                <div class="row">
                <div class="form-group  mb-4 col-md-6 col-xs-12 ">
                    <label class="control-label">Vehicle </label>
                    <select class="custom-select mb-4" name="vehicle" value="{{$part->vehicle_id ?? ''}}">

                        <option selected disabled value="">vehicle</option>
                            @foreach($vehicles as $vehicle)
                              <option value="{{$vehicle->id}}"
                                @if (isset($part->id))
                                {{ ($part->vehicle->model == $vehicle->model || old('vehicle->model') === $vehicle->model )? "selected" : "" }}
                                @endif
                                >{{$vehicle->model}}</option>
                            @endforeach

                    </select>

                    {{-- <option value="Employee"
                            {{(isset($user->id) && $user->type === 'Employee' || old('type') === 'Employee') ? 'Selected' : ''}}
                            >Employee</option> --}}

                </div>

                <div class="form-group mb-4 col-md-6 col-xs-12 ">
                    <label class="control-label  ">Part Type </label>
                    <select class="custom-select mb-4" name="part_type" value="{{$part->part_type_id ?? ''}}">


                        <option selected disabled value="">Part Type</option>
                        @foreach($part_types as $part_types)
                        <option value="{{$part_types->id}}"
                            @if (isset($part->id))
                            {{ ($part->part_type->name == $part_types->name )? "selected" : "" }}
                            @endif
                            >{{$part_types->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="row">
                <div class="form-group mb-4 col-md-6 col-xs-12">
                    <label class="control-label">Quantity</label>
                    <input type="number" name="qty" class="form-control" value="{{$part->qty ?? ''}}" @if(isset($part->id)) readonly @endif>
                </div>
            </div>

                <button type="submit" class="btn btn-primary mt-3">{{isset($part->id) ? 'Update' : 'Submit'}} </button>
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
