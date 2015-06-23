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
          {!! Form::label('projection', 'Projection:') !!}
          {!! Form::text('projection', null, ['class' => 'form-control']) !!}
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
          {!! Form::text('metadata[wms_format]', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_onlineresource]', 'Online Resource URL:') !!}
          {!! Form::text('metadata[wms_onlineresource]', $map->web->metadata->get('wms_onlineresource'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('metadata[wms_srs]', 'SRS:') !!}
          {!! Form::text('metadata[wms_srs]', null, ['class' => 'form-control']) !!}
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
        {!! Form::label('layer['.$i.'][connectiontype]', 'Connection Type:') !!}
        {!! Form::select('layer['.$i.'][connectiontype]', [MS_SHAPEFILE =>  'Shapefile', MS_POSTGIS => 'PostGIS'], $map->getlayer($i)->connectiontype, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_SHAPEFILE }}">
        {!! Form::label('layer['.$i.'][data]', 'Data Source:') !!}
        {!! Form::text('layer['.$i.'][data]', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }}">
        {!! Form::label('layer['.$i.'][connectionhost]', 'Server Address:') !!}
        {!! Form::text('layer['.$i.'][connectionhost]', $connections[$i]['host'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }}">
        {!! Form::label('layer['.$i.'][connectionport]', 'Server Port:') !!}
        {!! Form::text('layer['.$i.'][connectionport]', $connections[$i]['port'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }} ct7">
        {!! Form::label('layer['.$i.'][connectiondb]', 'Database:') !!}
        {!! Form::text('layer['.$i.'][connectiondb]', $connections[$i]['dbname'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }} ct7">
        {!! Form::label('layer['.$i.'][connectionuser]', 'User:') !!}
        {!! Form::text('layer['.$i.'][connectionuser]', $connections[$i]['user'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }} ct7">
        {!! Form::label('layer['.$i.'][connectionpass]', 'Password:') !!}
        {!! Form::text('layer['.$i.'][connectionpass]', $connections[$i]['password'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }} ct7">
        {!! Form::label('layer['.$i.'][connectiontable]', 'Table Name:') !!}
        {!! Form::text('layer['.$i.'][connectiontable]', $connections[$i]['table'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group ct{{ MS_POSTGIS }} ct7">
        {!! Form::label('layer['.$i.'][connectionfield]', 'Geometry Field Name:') !!}
        {!! Form::text('layer['.$i.'][connectionfield]', $connections[$i]['field'], ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][type]', 'Type:') !!}
        {!! Form::select('layer['.$i.'][type]', ['Point', 'Line', 'Polygon', 'Null'], $map->getlayer($i)->type, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][projection]', 'Projection:') !!}
        {!! Form::text('layer['.$i.'][projection]', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][color]', 'Color:') !!}
        <div class="input-group color{{ $i }}">
          <span class="input-group-addon"><i></i></span>
          {!! Form::text('layer['.$i.'][color]', colorObjToString($map->getLayer($i)->getClass(0)->getStyle(0)->color), ['class' => 'form-control']) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][outlinecolor]', 'Outline Color:') !!}
        <div class="input-group outlinecolor{{ $i }}">
          <span class="input-group-addon"><i></i></span>
          {!! Form::text('layer['.$i.'][outlinecolor]', colorObjToString($map->getLayer($i)->getClass(0)->getStyle(0)->outlinecolor), ['class' => 'form-control']) !!}
        </div
      </div>

      <div class="form-group">
        {!! Form::label('layer['.$i.'][backgroundcolor]', 'Background Color:') !!}
        <div class="input-group backgroundcolor{{ $i }}">
          <span class="input-group-addon"><i></i></span>
          {!! Form::text('layer['.$i.'][backgroundcolor]', colorObjToString($map->getLayer($i)->getClass(0)->getStyle(0)->backgroundcolor), ['class' => 'form-control']) !!}
        </div>
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
  <!-- Add reference for Color Picker -->
  <link href="{{ asset('plugins/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('plugins/colorpicker/js/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>

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
      @for($i = 0; $i < $map->numlayers; $i++)
        $("#layer\\[{{ $i }}\\]\\[data\\]").magicSuggest({
          data: '{{ asset("admin/datasources") }}',
          @if ($connections[$i]['data'] !== null && $connections[$i]['data'] !== '')
            value: ['{{ $connections[$i]['data'] }}'],
          @endif
          maxSelection: 1
        });

        $("#layer\\[{{ $i }}\\]\\[projection\\]").magicSuggest({
          allowFreeEntries: false,
          data: '{{ asset("projection") }}',
          method: 'get',
          valueField: 'params',
          displayField: 'description',
          value: ['{{ $map->getlayer($i)->getProjection() }}'],
          maxSelection: 1
        });

        for (i = 0; i < 8; i++) {
          $("#MapLayer{{ $i }} > div > .ct" + i).hide();
        }
        $("#MapLayer{{ $i }} > div > .ct" + $("#layer\\[{{ $i }}\\]\\[connectiontype\\]").val()).show();

        $("#layer\\[{{ $i }}\\]\\[connectiontype\\]").change(function () {
          for (i = 0; i < 8; i++) {
            $("#MapLayer{{ $i }} > div > .ct" + i).hide();
          }
          $("#MapLayer{{ $i }} > div > .ct" + $("#layer\\[{{ $i }}\\]\\[connectiontype\\]").val()).show();
        });

        $(".color{{ $i }}").colorpicker({ });
        $(".outlinecolor{{ $i }}").colorpicker({ });
        $(".backgroundcolor{{ $i }}").colorpicker({ });
      @endfor
    });

    $(function() {
      $("#metadata\\[wms_format\\]").magicSuggest({
        data: '{{ asset("admin/outputformats") }}',
        valueField: 'mimetype',
        displayField: 'name',
        value: ['{{ $map->web->metadata->get('wms_format') }}']
      });

      $("#metadata\\[wms_srs\\]").magicSuggest({
        allowFreeEntries: false,
        data: '{{ asset("projection") }}',
        method: 'get',
        valueField: 'name',
        displayField: 'description',
        value: ['{{ $map->web->metadata->get('wms_srs') }}']
      });

      $("#projection").magicSuggest({
        allowFreeEntries: false,
        data: '{{ asset("projection") }}',
        method: 'get',
        valueField: 'params',
        displayField: 'description',
        value: ['{{ $map->getProjection() }}'],
        maxSelection: 1
      });
    });
  </script>

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

      $("#layer\\[" + counter + "\\]\\[data\\]").magicSuggest({
        data: '{{ asset("admin/datasources") }}',
        value: [],
        maxSelection: 1
      });
      counter++;
    }

    function removeInput(divName){
      document.getElementById(divName).remove();
      counter--;
    }
  </script>
@stop
