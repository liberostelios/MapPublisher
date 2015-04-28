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
      {!! Form::text('format', $TileLayer->format, ['class' => 'form-control']) !!}
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
