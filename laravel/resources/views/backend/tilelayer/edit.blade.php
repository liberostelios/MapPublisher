@extends('backend.admin')

@section('title', 'Edit Layer: '.$TileLayer->name)
@section('smalltitle', 'WMS Layer')

@section('content')
    {!! Form::open(['action' => ['Admin\TileLayerController@update', $TileLayer->id], 'method' => 'PUT']) !!}
      @include('backend.tilelayer.form', ['submitButtonText' => 'Update Layer'])
    {!! Form::close() !!}
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Other Options</h3>
    </div>
    <div class="box-body">
      {!! Form::open(['action' => ['Admin\TileLayerController@destroy', $TileLayer->id], 'method' => 'DELETE']) !!}
        <div class="form-group">
          {!! Form::submit('Delete Layer', ['class' => 'btn btn-danger']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
