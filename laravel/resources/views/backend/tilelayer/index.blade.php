@extends('backend.admin')

@section('title', 'WMS Tile Layers')
@section('smalltitle', 'Manage WMS Layers')

@section ('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Tile Layers</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="tilelayertable" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Url</th>
          <th>Layer Name</th>
          <th>Format</th>
          <th>Attribution</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($TileLayers as $TileLayer)
          <tr>
            <td><a href="{{ action('Admin\TileLayerController@edit', $TileLayer->id) }}">{{ $TileLayer->name }}</a></td>
            <td>{{ $TileLayer->url }}</td>
            <td>{{ $TileLayer->layer }}</td>
            <td>{{ $TileLayer->format }}</td>
            <td>{!! $TileLayer->attribution !!}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ action('Admin\TileLayerController@create') }}">
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
