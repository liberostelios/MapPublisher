<div class="box">
  <div class="box-header">
    <h3 class="box-title">Map File Information</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', $map->name, ['class' => 'form-control']) !!}
    </div>

    {{ ms_GetVersion() }}
  </div>
  <div class="box-footer">
    <div class="form-group">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
</div>
