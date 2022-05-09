@extends('layouts.master')

@section('title','Buy Parts')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 bg-success">
                    <h4>Buy Parts</h4>

                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <p class="text-success">{{session('mssg')}}</p>
            <form class="form-vertical" action="{{route(isset($transaction->id) ? 'update-parts-process':'buy-parts-process')}}" method="POST">

                @csrf
        <div class="row">


            @if(isset($transaction->id))
            <input name="id" type="text" value="{{$transaction->id}}" readonly hidden>
        @endif

                <div class="form-group mb-4 col-md-8 col-xs-12">
                    <label class="control-label">Supplier</label>
                    <select class="custom-select mb-4" name="supplier" >

                        <option selected disabled value="">--Select Supplier--</option>

                        @foreach($suppliers as $supplier)
                        <option {{isset($transaction->supplier_id) && $transaction->supplier_id == $supplier->id ? 'selected' : ''}} value="{{$supplier->id}}" >{{$supplier->name}}</option>
                        @endforeach

                    </select>

                </div>

        </div>

        <div class="row">

                <div class="form-group mb-4 col-md-4 col-xs-12">
                    <label class="control-label">Vehicle</label>
                    <select class="custom-select mb-4" name="vehicle_id" id="vehicle_id" value="{{$vehicle->id ?? ''}}">

                        <option selected disabled value="">--Select Vehicle--</option>

                        @foreach($vehicles as $vehicle)
                        <option {{isset($transaction->vehicle_id) && $transaction->vehicle_id == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}" >{{$vehicle->model}}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group mb-4 col-md-4 col-xs-12" id="part_type_container">
          @if(isset($transaction->id))

                        <label class="control-label">Part Type</label>
                        <select  class="custom-select mb-4" id="part_type_id" name="part_type_id">

                        <option selected disabled value="">--Select Part Type--</option>

                        @foreach($part_types as $part_type)
                            <option {{$part_type->id == $transaction->part_type_Id ? 'selected' :''}} value="{{$part_type->id}}">{{$part_type->name}}</option>
                        @endforeach

                        </select>

                        @endif
                </div>



                <div class="form-group mb-4 col-md-4 col-xs-12" id="part_container">

                    @if(isset($transaction->id))
                        <label class="control-label">Part</label>
                        <select  class="custom-select mb-4" id="part_id" name="part_id">

                        <option selected disabled value="">--Select Part--</option>

                        @foreach($parts as $part)
                            <option  {{$part->id == $transaction->part_id ? 'selected' : ''}} value="{{$part->id}}">{{$part->name}}</option>
                        @endforeach

                        </select>
                    @endif

                </div>


        </div>

        <div class="row">

            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Qty</label>
                <input type="number" name="qty" id="qty" value="{{$transaction->qty ?? ''}}" class="form-control" min="{{1}}"/>

            </div>
            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Price</label>
                <input type="text" name="price" id="price" value="{{$transaction->price ?? ''}}" class="form-control"/>
            </div>

            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Date</label>
                <input type="date" name="date" id="date" value="{{$transaction->date ?? ''}}" class="form-control"/>
            </div>


    </div>

    <center>
        <button class="btn btn-success" id="processTransaction" {{isset($transaction->id) ? '' : 'disabled'}} type="submit">Process Buy Transcation</button>
    </center>

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
