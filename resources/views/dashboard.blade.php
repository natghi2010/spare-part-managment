@extends('layouts.master')

@section('title','Dashboard')

@section('content')

<h1>{{auth()->user()->name}} {{auth()->user()->type}}</h1>


@endsection
