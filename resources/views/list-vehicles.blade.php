@extends('layouts.master')

@section('title','Vehicles')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-vehicles')}}" class="btn btn-info">Add Vehicles</a>
        <div class="table-responsive mb-4 mt-4">
            <p class="text-success">{{session('mssg')}}</p>


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>

                        <th>model</th>
                        <th>year</th>



                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehciles as $vehicle)

                    <tr>


                        <td>{{$vehicle->model}}</td>
                        <td>{{$vehicle->year}}</td>





                        <td>
                            <a href="{{route('edit-vehicles',['id'=>$vehicle->id])}}">
                                <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>


                            <a href="#" style="font-size: 1.5rem" class="far fa-trash-alt deletevehicleBtn" title="{{$vehicle->model}}" id="{{$vehicle->id}}"></></a>


                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>model</th>
                        <th>year</th>

                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
