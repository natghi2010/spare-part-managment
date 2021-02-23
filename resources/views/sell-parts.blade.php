@extends('layouts.master')

@section('title','Sell Parts')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 bg-danger">
                    <h4>Sell Parts</h4>
                  
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{route('sell-parts-process')}}" method="POST">

                @csrf
        <div class="row">

                <div class="form-group mb-4 col-md-8 col-xs-12">
                    <label class="control-label">Customer</label>
                    <select class="custom-select mb-4" name="customer_id" >

                        <option selected disabled value="">--Select Customer--</option>

                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}" >{{$customer->name}}</option>
                        @endforeach

                    </select>

                </div>

        </div>

        <div class="row">

                <div class="form-group mb-4 col-md-4 col-xs-12">
                    <label class="control-label">Vehicle</label>
                    <select class="custom-select mb-4" name="vehicle_id" id="vehicle_id" >

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
                <input type="number" name="qty" id="qty" class="form-control" min="{{1}}"/>

            </div>
            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Price</label>
                <input type="text" name="price" id="price" value="" class="form-control" />
            </div>

            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Date</label>
                <input type="date" name="date" id="date" class="form-control"/>
            </div>


    </div>

    <center>
        <p class="text-danger">{{session('mssg')}}</p>
        <button class="btn btn-danger" id="processTransaction" disabled type="submit">Process Sell Transcation</button>
    </center>

            </form>

        </div>
    </div>

@endsection
