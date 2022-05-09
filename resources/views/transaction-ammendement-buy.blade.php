@extends('layouts.master')

@section('title','Buy Parts')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 bg-success">
                    <h4>Buy Parts</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{route('transactional-ammendment-buy')}}" method="POST">

                @csrf
                <input type="text" name="id" value="{{$transcation->id}}" hidden readonly/>
        <div class="row">

                <div class="form-group mb-4 col-md-8 col-xs-12">
                    <label class="control-label">Supplier</label>
                    <select class="custom-select mb-4" name="supplier_id" value="{{$transcation->supplier_id}}">

                        <option selected disabled value="">--Select Supplier--</option>

                        @foreach($suppliers as $supplier)
                        <option {{$supplier->id == $transcation->supplier_id ? 'selected' : ''}} value="{{$supplier->id}}" >{{$supplier->name}}</option>
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
                        <option value="{{$vehicle->id}}" >{{$vehicle->model}}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group mb-4 col-md-4 col-xs-12" id="part_type_container"></div>
                <div class="form-group mb-4 col-md-4 col-xs-12" id="part_container"> </div>


        </div>

        <div class="row">

            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Qty</label>
                <input type="number" name="qty" id="qty" value="{{$transaction->qty}}" class="form-control" min="{{1}}"/>

            </div>
            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Price</label>
                <input type="text" name="price" id="price" class="form-control"/>
            </div>

            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Date</label>
                <input type="date" name="date" id="date" class="form-control"/>
            </div>

         </div>

    <center>
        <button class="btn btn-success" id="processTransaction" disabled type="submit">Ammend Transcation</button>
    </center>

            </form>

        </div>
    </div>

@endsection
