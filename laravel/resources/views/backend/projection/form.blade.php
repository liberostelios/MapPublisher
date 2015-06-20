<div class="box">
  <div class="box-header">
    <h3 class="box-title">Projection Information</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', $Projection->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('description', 'Description:') !!}
      {!! Form::text('description', $Projection->description, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('params', 'Params:') !!}
      {!! Form::text('params', $Projection->params, ['class' => 'form-control']) !!}
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
  </script>
@stop
