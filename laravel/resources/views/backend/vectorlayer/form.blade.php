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
  </div>
  <div class="box-footer">
    <div class="form-group">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
</div>
