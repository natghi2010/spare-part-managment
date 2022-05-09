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
                        <th hidden>Transaction Ref.</th>
                        <th>Customer</th>
                        <th>Supplier</th>
                        <th>Part</th>
                        <th>Vehicle</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th hidden>Date</th>
                        <th hidden>User</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)

                    <tr class="" title="{{$transaction->human_date}}">

                        <td hidden>{{$transaction->transaction_id}}</td>
                        <td>{{$transaction->customer->name ?? 'N/A'}}</td>
                        <td>{{$transaction->supplier->name ?? 'N/A'}}</td>
                        <td> {{$transaction->part_type->name}} - {{$transaction->part->name}}</td>
                        <td> {{$transaction->vehicle->model}} - {{$transaction->vehicle->year}}</td>
                        <td> {{$transaction->price}}</td>
                        <td> {{$transaction->qty}} </td>
                        <td hidden> {{$transaction->date}}
                             {{$transaction->human_date}}
                             {{$transaction->duration}}
                         </td>
                        <td hidden> {{$transaction->user->name}} </td>

                        <td>
                            {{-- <a href="{{route('view-customer',['id'=>$customer->id])}}"> <i style="font-size: 1.5rem" class="far fa-eye"></i> </a> --}}
                             <a href="{{route('edit-transaction',['transaction_id'=>$transaction->id])}}">
                                <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>

                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th hidden>Transaction Ref.</th>
                        <th>Customer</th>
                        <th>Supplier</th>
                        <th>Part</th>
                        <th>Vehicle</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th hidden>Date</th>
                        <th hidden>User</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
