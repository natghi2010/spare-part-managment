@extends('layouts.master')

@section('title',isset($vehicle->id) ? 'Edit Vehicle' : 'Create Vehicle')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($vehicle->id) ? 'Edit' : 'Create'}} Vehicle</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($vehicle->id) ? 'update-vehicles':'store-vehicles')}}" method="POST">

                @csrf

                @if(isset($vehicle->id))
                    <input name="id" type="text" value="{{$vehicle->id}}" readonly hidden>
                @endif



                <div class="form-group mb-4">
                    <label class="control-label">model </label>
                    <input type="text" name="model" class="form-control" value="{{$vehicle->model ??  old('model')}}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">year </label>
                    <input type="text" name="year" class="form-control" value="{{$vehicle->year ??  old('year')}}">
                </div>



                <button type="submit" class="btn btn-primary mt-3">{{isset($vehicle->id) ? 'Update' : 'Submit'}} </button>
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
