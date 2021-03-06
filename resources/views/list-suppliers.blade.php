@extends('layouts.master')

@section('title','Suppliers')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-supplier')}}" class="btn btn-info">Add Supplier</a>
        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>CountryOfOrigin</th>
                        <th>Tin Number</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)

                    <tr>

                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->country_of_origin}}</td>
                        <td>{{$supplier->tin_number}}</td>
                        <td>{{$supplier->phone}}</td>
                        <td>{{$supplier->email}}</td>
                        <td>{{$supplier->status}}</td>


                        <td>
                            <a href="{{route('edit-supplier',['id'=>$supplier->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>


                            <a href="#" style="font-size: 1.5rem" class="far fa-trash-alt deleteSupplierBtn"title="{{$supplier->name}}" id="{{$supplier->id}}"></a>
                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>CountryOfOrigin</th>
                        <th>Tin Number</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
