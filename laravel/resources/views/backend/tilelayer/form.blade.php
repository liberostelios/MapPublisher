<div class="box">
  <div class="box-header">
    <h3 class="box-title">WMS Layer Information</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', $TileLayer->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('url', 'URL:') !!}
      {!! Form::text('url', $TileLayer->url, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('layer', 'Layer Name:') !!}
      {!! Form::text('layer', $TileLayer->layer, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('format', 'Image Format:') !!}
      {!! Form::text('format', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('attribution', 'Attribution:') !!}
      {!! Form::textarea('attribution', $TileLayer->attribution, ['class' => 'form-control']) !!}
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
      $("#format").magicSuggest({
        data: '{{ asset("admin/outputformats") }}',
        valueField: 'mimetype',
        displayField: 'name',
        value: ['{{ $TileLayer->format }}'],
        allowFreeEntries: false,
        maxSelection: 1
      });
    });
  </script>
@stop
