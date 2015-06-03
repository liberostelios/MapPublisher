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
        @foreach ($maps as $file => $map)
          <tr>
            <td><a href="{{ action('Admin\WmsMapController@edit', $file) }}">{{ $map->name }}</a></td>
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
      <a href="{{ action('Admin\WmsMapController@create') }}">
        <button class="btn btn-primary">
          New Map File
        </button>
      </a>
    </div>
  </div><!-- /.box -->
@stop

@section ('pagescript_top')
  <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
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
