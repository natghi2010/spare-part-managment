@extends('layouts.master')

@section('title','Buy Parts')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Buy Parts</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="#" method="POST">

                <div class="form-group mb-4">
                    <label class="control-label">Supplier</label>
                    <select class="custom-select mb-4" name="supplier_id" value="{{$part->part_type_id ?? ''}}">


                        <option selected disabled value="">Supplier</option>
                       
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}" >{{$supplier->name}}</option>
                        @endforeach
                  
                    </select>

                </div>
            </form>

        </div>
    </div>

@endsection
