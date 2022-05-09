@extends('layouts.master')

@section('title','Products')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('products.create')}}" class="btn btn-info">Add Products</a>
        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>

                        <th>Product</th>
                        <th>Unit</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)

                    <tr>


                        <td>{{$product->name}}</td>
                        <td>{{$product->unit->unit}}</td>



                        <td>
                            <a href="{{route('products.edit',['product'=>$product->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>

                            <a href="#" style="font-size: 1.5rem" class="far fa-trash-alt deletePartBtn" title="{{$product->name}}" id="{{$product->id}}"></i></a>

                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Product</th>
                        <th>Unit</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
