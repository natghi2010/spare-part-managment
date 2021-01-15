@extends('layouts.master')


@section('content')

<h2>Dashboard</h2>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Name </th>
        <th>Email </th>
        <th>Phone</th>
        <th>Tin Number</th>
    </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->tin_number}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$customers->links()}}
@endsection