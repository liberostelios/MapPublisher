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
            <td>{{ $map->numoutputformats }}</td>
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
