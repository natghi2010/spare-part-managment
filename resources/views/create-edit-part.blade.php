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
                    <label class="control-label">part_no </label>
                    <input type="text" name="part_no" class="form-control" value="{{$part->part_no ?? ''}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">name </label>
                    <input type="text" name="name" class="form-control" value="{{$part->name ?? ''}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">vehicle </label>
                    <select class="custom-select mb-4" name="vehicle_id" value="{{$part->vehicle_id ?? ''}}">

                        <option selected>vehicle</option>
                            @foreach($vehicles as $vehicle)
                              <option value="{{$vehicle->id}}"
                                @if (isset($part->id))
                                {{ ($part->vehicle->model == $vehicle->model)? "selected" : "" }}
                                @endif
                                >{{$vehicle->model}}</option>
                            @endforeach

                    </select>

                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Part Type </label>
                    <select class="custom-select mb-4" name="part_type_id" value="{{$part->part_type_id ?? ''}}">


                        <option selected>Part Type</option>
                        @foreach($part_types as $part_types)
                        <option value="{{$part_types->id}}"
                            @if (isset($part->id))
                            {{ ($part->part_type->name == $part_types->name )? "selected" : "" }}
                            @endif
                            >{{$part_types->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Quantity</label>
                    <input type="text" name="qty" class="form-control" value="{{$part->qty ?? ''}}" @if(isset($part->id)) readonly @endif>
                </div>





                <button type="submit" class="btn btn-primary mt-3">{{isset($part->id) ? 'Update' : 'Submit'}} </button>
            </form>

        </div>
    </div>

@endsection