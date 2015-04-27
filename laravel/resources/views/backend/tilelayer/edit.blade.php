@extends('backend.admin')

@section('title', 'Edit Layer: '.$TileLayer->name)
@section('smalltitle', 'WMS Layer')

@section('content')
  {!! Form::open(['action' => ['Admin\TileLayerController@update', $TileLayer->id], 'method' => 'PUT']) !!}
    @include('backend.tilelayer.form', ['submitButtonText' => 'Update Layer'])
  {!! Form::close() !!}
  {!! Form::open(['action' => ['Admin\TileLayerController@destroy', $TileLayer->id], 'method' => 'DELETE']) !!}
    <div class="form-group">
      {!! Form::submit('Delete Layer', ['class' => 'btn btn-danger form-control']) !!}
    </div>
  {!! Form::close() !!}
@stop
