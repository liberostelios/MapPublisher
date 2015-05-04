<div class="row">
  <div class="col-md-6">

    {{-- Main information section --}}
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Map File Information</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          {!! Form::label('name', 'Name:') !!}
          {!! Form::text('name', $map->name, ['class' => 'form-control']) !!}
        </div>

        <div class="row">
          <div class="form-group col-xs-3">
            {!! Form::label('extminx', 'MinX:') !!}
            {!! Form::text('extminx', $map->extent->minx, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group col-xs-3">
            {!! Form::label('extminy', 'MinY:') !!}
            {!! Form::text('extminy', $map->extent->miny, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group col-xs-3">
            {!! Form::label('extmaxx', 'MaxX:') !!}
            {!! Form::text('extmaxx', $map->extent->maxx, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group col-xs-3">
            {!! Form::label('extmaxy', 'MaxY:') !!}
            {!! Form::text('extmaxy', $map->extent->maxy, ['class' => 'form-control']) !!}
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-6">
            {!! Form::label('width', 'Width:') !!}
            {!! Form::text('width', $map->width, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group col-xs-6">
            {!! Form::label('height', 'Height:') !!}
            {!! Form::text('height', $map->height, ['class' => 'form-control']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('status', 'Status:') !!}
          {!! Form::checkbox('status', 'ON', $map->status) !!}
        </div>

        <div class="form-group">
          {!! Form::label('units', 'Units:') !!}
          {!! Form::select('units', ['Inches', 'Feet', 'Miles', 'Meters', 'Kilometers', 'DD', 'Pixels', 'Nautical Miles'], $map->units, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">

    {{-- WMS Section --}}
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Web Mapping Service (WMS) Configuration</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          {!! Form::label('metadata[wms_title]', 'Title:') !!}
          {!! Form::text('metadata[wms_title]', $map->web->metadata->get('wms_title'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_format]', 'Image Format:') !!}
          {!! Form::text('metadata[wms_format]', $map->web->metadata->get('wms_format'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_onlineresource]', 'Online Resource URL:') !!}
          {!! Form::text('metadata[wms_onlineresource]', $map->web->metadata->get('wms_onlineresource'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_srs]', 'SRS:') !!}
          {!! Form::text('metadata[wms_srs]', $map->web->metadata->get('wms_srs'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_enable_request]', 'Enable Request:') !!}
          {!! Form::text('metadata[wms_enable_request]', $map->web->metadata->get('wms_enable_request'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_feature_info_mime_type]', 'Feature Info Mime Type:') !!}
          {!! Form::text('metadata[wms_feature_info_mime_type]', $map->web->metadata->get('wms_feature_info_mime_type'), ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Layers Section --}}
@for($i = 0; $i < $map->numlayers; $i++)
  <div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title">Layer: {{ $map->getlayer($i)->name }}</h3>
    </div>
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('layer['.$i.'][name]', 'Name:') !!}
        {!! Form::text('layer['.$i.'][name]', $map->getlayer($i)->name, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][data]', 'Data:') !!}
        {!! Form::text('layer['.$i.'][data]', $map->getlayer($i)->data, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][type]', 'Type:') !!}
        {!! Form::select('layer['.$i.'][type]', ['Point', 'Line', 'Polygon', 'Null'], $map->getlayer($i)->type, ['class' => 'form-control']) !!}
      </div>
    </div>
    <div class="box-footer">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
  </div>
@endfor
