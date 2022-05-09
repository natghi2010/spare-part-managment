@extends('layouts.master')

@section('title','Recieve Products')

@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow container">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 bg-success">
                    <h4>Recieve Products</h4>

                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <p class="text-success">{{session('mssg')}}</p>
            <form class="form-vertical" action="{{route('transaction.store')}}" method="POST">

                @csrf
        <div class="row">

         @if(isset($transaction->id))
            <input name="id" type="text" value="{{$transaction->id}}" readonly hidden>
        @endif

                {{-- <div class="form-group mb-4 col-md-8 col-xs-12">
                    <label class="control-label">Supplier</label>
                    <select class="custom-select mb-4" name="supplier" >

                        <option selected disabled value="">--Select Supplier--</option>

                        @foreach($suppliers as $supplier)
                        <option {{isset($transaction->supplier_id) && $transaction->supplier_id == $supplier->id ? 'selected' : ''}} value="{{$supplier->id}}" >{{$supplier->name}}</option>
                        @endforeach

                    </select>

                </div> --}}

        </div>

        <div class="row">

                <div class="form-group mb-4 col-md-4 col-xs-12">
                    <label class="control-label">Product</label>
                    <select class="custom-select mb-4" name="product_id" id="product_id" value="{{$product->id ?? ''}}">

                        <option selected disabled value="">--Select Product--</option>

                        @foreach($products as $product)
                        <option value="{{$product->id}}" >{{$product->name}}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group mb-4 col-md-3 col-xs-12">
                    <label class="control-label">Qty</label>
                    <input type="number" name="qty" id="qty" value="{{$transaction->qty ?? ''}}" class="form-control" min="{{1}}"/>
                </div>



        </div>

        <div class="row">


            {{-- <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Price</label>
                <input type="text" name="price" id="price" value="{{$transaction->price ?? ''}}" class="form-control"/>
            </div>

            <div class="form-group mb-4 col-md-5 col-xs-12">
                <label class="control-label">Date</label>
                <input type="date" name="date" id="date" value="{{$transaction->date ?? ''}}" class="form-control"/>
            </div> --}}


    </div>

    <center>
        <button class="btn btn-success" id="processTransaction"  type="submit">Process Distribution</button>
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
