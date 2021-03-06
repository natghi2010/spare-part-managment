@extends('layouts.master')

@section('title','Transactions')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-customer')}}" class="btn btn-info">Add Customer</a> 
        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Transaction Ref.</th>
                        <th>Customer</th>
                        <th>Supplier</th>
                        <th>Part</th>
                        <th>Vehicle</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>User</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)

                    <tr>

                        <td>TRT219212</td>
                        <td>John Smith</td>
                        <td> - </td>
                        <td> Engine - Gasket</td>
                        <td> Vitz 2004</td>
                        <td> Price</td>
                        <td> Qty </td>
                        <td> Demo </td>
                     
                        <td>
                            {{-- <a href="{{route('view-customer',['id'=>$customer->id])}}"> <i style="font-size: 1.5rem" class="far fa-eye"></i> </a> --}}
                            <a href="{{route('edit-customer',['id'=>$transaction->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>

                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                    <th>Name</th>
                        <th>Tin Number</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Contact-person</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
