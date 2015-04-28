@extends('backend.admin')

@section('title', 'New Layer')
@section('smalltitle', 'GeoJSON Layer')

@section('content')
  {!! Form::open(['action' => ['Admin\VectorLayerController@store'], 'method' => 'POST']) !!}
    @include('backend.vectorlayer.form', ['submitButtonText' => 'Add Layer'])
  {!! Form::close() !!}
@stop
