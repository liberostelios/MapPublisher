@extends('backend.admin')

@section('title', 'Edit Map File: '.$map->name)
@section('smalltitle', 'Manage MapServer')

@section('content')
    {!! Form::open(['action' => ['Admin\WmsMapController@update', $file], 'method' => 'PUT']) !!}
      @include('backend.mapserver.map.form', ['submitButtonText' => 'Update Map File'])
    {!! Form::close() !!}
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Other Options</h3>
    </div>
    <div class="box-body">
      {!! Form::open(['action' => ['Admin\WmsMapController@destroy', $file], 'method' => 'DELETE']) !!}
        <div class="form-group">
          {!! Form::submit('Delete Map File', ['class' => 'btn btn-danger']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
