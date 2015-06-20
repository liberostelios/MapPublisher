@extends('backend.admin')

@section('title', 'New Projection')
@section('smalltitle', 'Projections')

@section('content')
  {!! Form::open(['action' => ['Admin\ProjectionController@store'], 'method' => 'POST']) !!}
    @include('backend.projection.form', ['submitButtonText' => 'Add Layer'])
  {!! Form::close() !!}
@stop
