@extends('backend.admin')

@section('title', 'Edit Layer: '.$VectorLayer->name)
@section('smalltitle', 'GeoJSON Layer')

@section('content')
  {!! Form::open(['action' => ['Admin\VectorLayerController@update', $VectorLayer->id], 'method' => 'PUT']) !!}
    @include('backend.vectorlayer.form', ['submitButtonText' => 'Update Layer'])
  {!! Form::close() !!}
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Other Options</h3>
    </div>
    <div class="box-body">
      {!! Form::open(['action' => ['Admin\VectorLayerController@destroy', $VectorLayer->id], 'method' => 'DELETE']) !!}
        <div class="form-group">
          {!! Form::submit('Delete Layer', ['class' => 'btn btn-danger form-control']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
