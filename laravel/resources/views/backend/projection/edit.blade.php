@extends('backend.admin')

@section('title', 'Edit Projection: '.$Projection->name)
@section('smalltitle', 'Projections')

@section('content')
    {!! Form::open(['action' => ['Admin\ProjectionController@update', $Projection->id], 'method' => 'PUT']) !!}
      @include('backend.projection.form', ['submitButtonText' => 'Update Projection'])
    {!! Form::close() !!}
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Other Options</h3>
    </div>
    <div class="box-body">
      {!! Form::open(['action' => ['Admin\ProjectionController@destroy', $Projection->id], 'method' => 'DELETE']) !!}
        <div class="form-group">
          {!! Form::submit('Delete Projection', ['class' => 'btn btn-danger']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
