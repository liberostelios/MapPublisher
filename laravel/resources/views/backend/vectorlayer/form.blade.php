<div class="box">
  <div class="box-header">
    <h3 class="box-title">GeoJSON Layer Information</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', $VectorLayer->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('group', 'Group:') !!}
      {!! Form::text('group', $VectorLayer->group, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('connection_string', 'Connection String:') !!}
      {!! Form::text('connection_string', $VectorLayer->connection_string, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('username', 'Username:') !!}
      {!! Form::text('username', $VectorLayer->username, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password', 'Password:') !!}
      {!! Form::text('password', $VectorLayer->password, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('table_name', 'Table Name:') !!}
      {!! Form::text('table_name', $VectorLayer->table_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('geometry_field_name', 'Geometry Field:') !!}
      {!! Form::text('geometry_field_name', $VectorLayer->geometry_field_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('title_field', 'Title Field:') !!}
      {!! Form::text('title_field', $VectorLayer->title_field, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('img_url', 'Icon:') !!}
      {!! Form::text('img_url', null, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="box-footer">
    <div class="form-group">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
</div>

@section('pagescript')
  <!-- Add reference for MagicSuggest -->
  <link href="{{ asset('assets/magicsuggest/magicsuggest-min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/magicsuggest/magicsuggest-min.js') }}"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Script for applying MagicSuggest to the input text control -->
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
      $("#img_url").magicSuggest({
        data: '{{ asset("admin/assets/icons") }}',
        value: ['{{ $VectorLayer->img_url }}'],
        maxSelection: 1
      });
    });
  </script>
@stop
