@extends('backend.admin')

@section('title', 'Maps')
@section('smalltitle', 'Manage MapServer')

@section ('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Configured Maps</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="tilelayertable" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Image Type</th>
          <th>Layers</th>
          <th>Projection</th>
          <th>Units</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($maps as $map)
          <tr>
            <td><a href='{{ asset('admin/tilelayer')}}/{{ $map->name }}/edit'>{{ $map->name }}</a></td>
            <td>{{ $map->outputformat->name }}</td>
            <td>{{ $map->numlayers }}</td>
            <td>{{ $map->getProjection() }}</td>
            <td>{!! $map->units !!}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ asset('admin/tilelayer/create') }}">
        <button class="btn btn-primary">
          New Layer
        </button>
      </a>
    </div>
  </div><!-- /.box -->
@stop
