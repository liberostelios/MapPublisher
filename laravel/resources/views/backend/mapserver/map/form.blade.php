<div class="box">
  <div class="box-header">
    <h3 class="box-title">Map File Information</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', $map->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-inline">
      <div class="form-group">
        {!! Form::label('extminx', 'MinX:') !!}
        {!! Form::text('extminx', $map->extent->minx, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('extminy', 'MinY:') !!}
        {!! Form::text('extminy', $map->extent->miny, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('extmaxx', 'MaxX:') !!}
        {!! Form::text('extmaxx', $map->extent->maxx, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('extmaxy', 'MaxY:') !!}
        {!! Form::text('extmaxy', $map->extent->maxy, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="box-footer">
    <div class="form-group">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
</div>
