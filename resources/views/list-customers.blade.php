@extends('layouts.master')

@section('title','Customers')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-customer')}}" class="btn btn-info">Add Customer</a>
        <div class="table-responsive mb-4 mt-4">


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tin Number</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Contact-person</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)

                    <tr>

                        <td>{{$customer->name}}</td>
                        <td>{{$customer->tin_number}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->adress}}</td>
                        <td>{{$customer->contact_person}}</td>



                        <td>
                            <a href="{{route('edit-customer',['id'=>$customer->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>

                            <i style="font-size: 1.5rem" class="far fa-trash-alt"></i>
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
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
