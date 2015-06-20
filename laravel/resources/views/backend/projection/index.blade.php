@extends('backend.admin')

@section('title', 'Projections')
@section('smalltitle', 'Manage Map Publishers Projections')

@section ('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Available Projections</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="projectiontable" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Params</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Projections as $Projection)
          <tr>
            <td><a href="{{ action('Admin\ProjectionController@edit', $Projection->id) }}">{{ $Projection->name }}</a></td>
            <td>{{ $Projection->description }}</td>
            <td>{{ $Projection->params }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ action('Admin\ProjectionController@create') }}">
        <button class="btn btn-primary">
          Add Projection
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
      $('#projectiontable').dataTable({
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
