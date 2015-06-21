@extends('backend.admin')

@section('title', 'File Manager')
@section('smalltitle', 'Manage Resources')

@section ('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Local Data</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div id="elfinder"></div>
  </div><!-- /.box-body -->
</div>
@stop

@section ('pagescript_top')

@stop

@section ('pagescript')
  @parent
  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('packages/barryvdh/elfinder/css/theme.css')}}">
  <script type="text/javascript" src="{{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>

  <script type="text/javascript" charset="utf-8">
    $().ready(function() {
        var elf = $('#elfinder').elfinder({
          customData: {
            _token: '{{ csrf_token() }}'
          },
            // lang: 'ru',             // language (OPTIONAL)
            url : '{{asset('elfinder/connector')}}'  // connector URL (REQUIRED)
        }).elfinder('instance');
    });
  </script>
@stop
