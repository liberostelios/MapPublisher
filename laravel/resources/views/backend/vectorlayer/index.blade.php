@extends('backend.admin')

@section('title', 'POI Layers')
@section('smalltitle', 'Manage GeoJSON Layers')

@section ('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Vector Layers</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="tilelayertable" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Group</th>
          <th>Connection String</th>
          <th>Table Name</th>
          <th>Geometry Field</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($VectorLayers as $VectorLayer)
          <tr>
            <td><a href="{{ action('Admin\VectorLayerController@edit', $VectorLayer->id) }}">{{ $VectorLayer->name }}</a></td>
            <td>{{ $VectorLayer->group }}</td>
            <td>{{ $VectorLayer->connection_string }}</td>
            <td>{{ $VectorLayer->table_name }}</td>
            <td>{!! $VectorLayer->geometry_field_name !!}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ action('Admin\VectorLayerController@create') }}">
        <button class="btn btn-primary">
          New Layer
        </button>
      </a>
    </div>
  </div><!-- /.box -->
@stop

@section ('pagescript')
  @parent
  <!-- DATA TABES SCRIPT -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $(function () {
      $('#tilelayertable').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
      });
    });
  </script>
@stop
