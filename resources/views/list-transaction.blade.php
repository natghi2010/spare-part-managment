@extends('layouts.master')

@section('title','Transactions')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        {{-- <a href="{{route('create-customer')}}" class="btn btn-info">Add Customer</a> --}}
        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>

            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Transaction Ref.</th>
                        <th>Product</th>
                        <th>Customer</th>
                        {{-- <th>Supplier</th> --}}
                        <th>Qty</th>
                        <th>#</th>
                        <th hidden>Date</th>
                        <th hidden>User</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)

                    <tr class="text-success" title="{{$transaction->human_date}}">

                        <td>{{$transaction->transaction_id}}</td>
                        <td>{{$transaction->product->name ?? 'N/A'}}</td>
                        <td>{{$transaction->customer->name ?? 'N/A'}}</td>
                        <td> {{$transaction->qty}} {{$transaction->product->unit->unit}}</td>
                        <td hidden> {{$transaction->date}}
                             {{$transaction->human_date}}
                             {{$transaction->duration}}
                         </td>
                        <td hidden> {{$transaction->user->name}} </td>

                        <td>
                            {{-- <a href="{{route('view-customer',['id'=>$customer->id])}}"> <i style="font-size: 1.5rem" class="far fa-eye"></i> </a> --}}
                             {{-- <a href="{{route('edit-transaction',['transaction_id'=>$transaction->id])}}">
                                <i style="font-size: 1.5rem" class="far fa-edit"></i> </a> --}}

                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Transaction Ref.</th>
                        <th>Product</th>
                        <th>Customer</th>
                        {{-- <th>Supplier</th> --}}

                        <th>Qty</th>
                        <th hidden>Date</th>
                        <th hidden>User</th>
                        <th>#</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
