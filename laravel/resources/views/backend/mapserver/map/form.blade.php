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
<div id="MapLayers">
@for($i = 0; $i < $map->numlayers; $i++)
  <div class="box box-warning" id="MapLayer{{ $i }}">
    <div class="box-header">
      <h3 class="box-title">Layer: {{ $map->getlayer($i)->name }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="remove" onClick="removeInput('MapLayer{{ $i }}');"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('layer['.$i.'][name]', 'Name:') !!}
        {!! Form::text('layer['.$i.'][name]', $map->getlayer($i)->name, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][data]', 'Data Source:') !!}
        {!! Form::text('layer['.$i.'][data]', $map->getlayer($i)->data, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][type]', 'Type:') !!}
        {!! Form::select('layer['.$i.'][type]', ['Point', 'Line', 'Polygon', 'Null'], $map->getlayer($i)->type, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
@endfor
</div>

  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Map File Actions</h3>
    </div>
    <div class="box-footer">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
      <button type="button" class="btn btn-warning" onClick="addInput('MapLayers');">Add Layer</button>
    </div>
  </div>

@section('pagescript')
  <script type="text/javascript">
    var counter = {{ $map->numlayers }};
    function addInput(divName){
      var newdiv = document.createElement('div');
      newdiv.innerHTML = "<div class='box box-warning' id='MapLayer" + counter + "'>"+
        "<div class='box-header'>"+
          "<h3 class='box-title'>Layer: New Layer</h3>"+
          "<div class='box-tools pull-right'>"+
            "<button class='btn btn-box-tool' data-widget='remove' onClick='removeInput(\"MapLayer" + counter + "\");'><i class='fa fa-times'></i></button>"+
          "</div>"+
        "</div>"+
        "<div class='box-body'>"+
          "<div class='form-group'>"+
            "<label for='layer[" + counter + "][name]'>Name</label>"+
            "<input type='text' class='form-control' name='layer[" + counter + "][name]' id='layer[" + counter + "][name]' placeholder='Layer " + counter + "'>"+
          "</div>"+
          "<div class='form-group'>"+
            "<label for='layer[" + counter + "][data]'>Data Source</label>"+
            "<input type='text' class='form-control' name='layer[" + counter + "][data]' id='layer[" + counter + "][data]' placeholder='Data Source'>"+
          "</div>"+
          "<div class='form-group'>"+
            "<label for='layer[" + counter + "][type]'>Name</label>"+
            "<select class='form-control' id='layer[" + counter + "][type]' name='layer[" + counter + "][type]'><option value='0'>Point</option><option value='1'>Line</option><option value='2' selected='selected'>Polygon</option><option value='3'>Null</option></select>"+
          "</div>"+
        "</div>"+
      "</div>";
      document.getElementById(divName).appendChild(newdiv);
      counter++;
    }

    function removeInput(divName){
      document.getElementById(divName).remove();
      counter--;
    }
  </script>
@stop
