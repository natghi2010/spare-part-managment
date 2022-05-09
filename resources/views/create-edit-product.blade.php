@extends('layouts.master')

@section('title',isset($product->id) ? 'Edit product' : 'Create product')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{isset($product->id) ? 'Edit' : 'Create'}} products</h4>
                    <p class="text-success">{{session('mssg')}}</p>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form class="form-vertical" action="{{ route( isset($product->id) ? 'products.update':'products.store')}}" method="POST">

                @csrf
                @if(isset($product->id))
                    <input name="id" type="text" value="{{$product->id}}" readonly hidden>
                @endif

                <div class="form-group mb-4">
                    <label class="control-label">Name </label>
                    <input type="text" name="name" class="form-control" value="{{$product->name ??  old('name')}}">
                </div>
                <div class="row">

                <div class="form-group mb-4 col-md-6 col-xs-12 ">
                    <label class="control-label">Unit </label>
                    <select class="custom-select mb-4" name="product_unit_id" value="{{$product->product_type_id ?? ''}}">

                        <option selected disabled value="">Choose Product Unit</option>
                        @foreach($product_units as $product_unit)
                        <option value="{{$product_unit->id}}"
                            @if (isset($product->id))
                            {{ ($product->unit->unit == $product_unit->unit )? "selected" : "" }}
                            @endif
                            >{{$product_unit->unit}}</option>
                        @endforeach
                    </select>

                </div>
            </div>

                <button type="submit" class="btn btn-primary mt-3">{{isset($product->id) ? 'Update' : 'Submit'}} </button>
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
