@extends('backend.admin')

@section('title', 'Create Map File')
@section('smalltitle', 'Manage MapServer')

@section('content')
  {!! Form::open(['action' => ['Admin\WmsMapController@store', $file], 'method' => 'POST']) !!}
    @include('backend.mapserver.map.form', ['submitButtonText' => 'Create Map File'])
  {!! Form::close() !!}
@stop
