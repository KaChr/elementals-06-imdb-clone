@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        @include('backpack::inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          <!-- Movies -->
          <li><a href="{{  backpack_url('movie') }}"><i class="fa fa-film"></i> <span>Movies</span></a></li>

          <!-- Series -->
          <li><a href="{{  backpack_url('tvshow') }}"><i class="fa fa-television"></i> <span>Tv shows</span></a></li>

          <!-- Genres -->
          <li><a href="{{  backpack_url('genre') }}"><i class="fa fa-map-signs"></i> <span>Genres</span></a></li>
          
          <!-- Users -->
          <li><a href="{{  backpack_url('user') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>

          <!-- Reviews -->
          <li><a href="{{  backpack_url('review') }}"><i class="fa fa-pencil"></i> <span>Reviews</span></a></li>

          <!-- Items -->
          <li><a href="{{  backpack_url('item') }}"><i class="fa fa-tag"></i> <span>Items</span></a></li>

          <!-- File manager -->
          <li><a href="{{  backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>


          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
