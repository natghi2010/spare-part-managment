@extends('layouts.master')

@section('title','Activity Log')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4">

           
            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>User</th>
                        <th>TimeStamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activity_logs as $log)
           
                    <tr>
                        <td>{{$log->action}}</td>
                        <td>{{$log->user->name}} ({{$log->user->email}})</td>
                        <td>{{$log->created_at}}</td>
                    </tr>

        
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Action</th>
                        <th>User</th>
                        <th>TimeStamp</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
