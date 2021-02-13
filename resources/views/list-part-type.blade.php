@extends('layouts.master')

@section('title','Part Type')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{{route('create-part-types')}}" class="btn btn-info">Add Part Type</a>
        <div class="table-responsive mb-4 mt-4">


            <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                    <tr>

                        <th>name</th>




                        <th class="no-content"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($part_types as $part_type)

                    <tr>


                        <td>{{$part_type->name}}</td>






                        <td>
                            <a href="{{route('edit-part-types',['id'=>$part_type->id])}}"> <i style="font-size: 1.5rem" class="far fa-edit"></i> </a>

                            <i style="font-size: 1.5rem" class="far fa-trash-alt"></i>
                        </td>

                    </tr>


                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>name</th>


                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
