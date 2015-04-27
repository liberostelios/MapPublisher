@extends('backend.admin')

@section('title', 'New Layer')
@section('smalltitle', 'WMS Layer')

@section('content')
  {!! Form::open(['action' => ['Admin\TileLayerController@store'], 'method' => 'POST']) !!}
    @include('backend.tilelayer.form', ['submitButtonText' => 'Add Layer'])
  {!! Form::close() !!}
@stop
