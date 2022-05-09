@extends('layouts.master')

@section('title','Parts')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-parts')}}" class="btn btn-info">Add Parts</a>
        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>

                        <th>Part Number</th>
                        <th>Name</th>
                        <th>Vehicle</th>
                        <th>PartType</th>
                        <th>Quantity</th>


                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Parts as $part)

                    <tr>
 

                        <td>{{$part->part_no}}</td>
                        <td>{{$part->name}}</td>
                        <td>{{$part->vehicle->model}}</td>
                        <td>{{$part->part_type->name}}</td>
                        <td>{{$part->qty}}</td>




                        <td>
                            <a href="{{route('edit-parts',['id'=>$part->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>


                            <a href="#" style="font-size: 1.5rem" class="far fa-trash-alt deletePartBtn" title="{{$part->name}}" id="{{$part->id}}"></i></a>

                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Part Number</th>
                        <th>Name</th>
                        <th>Vehicle</th>
                        <th>PartType</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
