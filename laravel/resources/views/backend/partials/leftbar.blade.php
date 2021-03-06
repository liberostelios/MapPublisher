<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ asset('admin') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-map-marker"></i>
          <span>Web Map Layers</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('Admin\TileLayerController@index') }}"><i class="fa fa-circle-o"></i> Tile Layers</a></li>
          <li><a href="{{ action('Admin\VectorLayerController@index') }}"><i class="fa fa-circle-o"></i> Vector Layers</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-image"></i>
          <span>MapServer Configuration</span>
          <i class="fa fa-angle-left pull-right"></i>
          <ul  class="treeview-menu">
            <li><a href="{{ action('Admin\WmsMapController@index') }}"><i class="fa fa-circle-o"></i> Map Files</a></li>
          </ul>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
