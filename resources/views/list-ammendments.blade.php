@extends('layouts.master')

@section('title','Ammendments')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4">


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>User</th>
                        <th>TimeStamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ammendments as $ammendment)

                    <tr>
                        <td>{{$ammendment->transaction_id}}</td>
                        <td>{{$ammendment->user->name}} ({{$ammendment->user->email}})</td>
                        <td>{{$ammendment->created_at}}</td>
                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Transaction ID</th>
                        <th>User</th>
                        <th>TimeStamp</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
