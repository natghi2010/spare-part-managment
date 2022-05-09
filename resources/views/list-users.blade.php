@extends('layouts.master')

@section('title','Users')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-user')}}" class="btn btn-info">Add User</a>

        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>

                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                   
                    <tr>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>

                        <td>
                            <a href="{{route('edit-user',['id'=>$user->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>

                            <a href="#" style="font-size: 1.5rem" class="far fa-trash-alt deleteUserBtn" title="{{$user->name}}" id="{{$user->id}}"></i></a>
            
                        </td>

                    </tr>
                    </del>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>

                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
