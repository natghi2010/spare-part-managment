@extends('layouts.master')

@section('title',isset($part_type->id) ? 'Edit Part Type' : 'Create Part Type')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($part_type->id) ? 'Edit' : 'Create'}} Part Type</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($part_type->id) ? 'update-part-types':'store-part-types')}}" method="POST">

                @csrf

                @if(isset($part_type->id))
                    <input name="id" type="text" value="{{$part_type->id}}" readonly hidden>
                @endif



                <div class="form-group mb-4">
                    <label class="control-label">Name </label>
                    <input type="text" name="name" class="form-control" value="{{$part_type->name ??  old('name')}}">
                </div>




                <button type="submit" class="btn btn-primary mt-3">{{isset($part_type->id) ? 'Update' : 'Submit'}} </button>
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
