<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    {{-- <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."> --}}
    <title>Hostel Accomodantion | System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}"> --}}
    <link rel="sylesheet" href="{{ mix('/css/app.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


  <body class="app sidebar-mini" class="hold-transition sidebar-mini layout-fixed">
    <!-- Navbar-->

    <header class="app-header"><a class="app-header__logo" href="index.html"> AMS</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        @can('UpdateInfo')
        <li class="app-search">
          <form action="/search"  method="POST" role="search">
            @csrf 
            <div class="input-group">

            </div>
           <input class="app-search__input" type="search" name="q" placeholder="Search Student">
           <button class="app-search__button" type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
       </form>
        </li>
        @endcan

        <!--Notification Menu-->
        {{-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>

            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> --}}

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{ route('students.index') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>

          </ul>
        </li>
      </ul>
    </header>


    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('img/visa.png') }}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::User()->name }}</p>
        </div>
      </div>

      <ul class="app-menu">

        <li><a class="app-menu__item" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item" href="{{ route('annoucements.index') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Annoucement</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Student</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

            @if(auth()->user()->hasRole('admin'))
            <li><a class="treeview-item" href="{{ route('students.index') }}"><i class="icon fa fa-circle-o"></i>Students</a></li>
            @endif

            @can('RequestHostel')
            <li><a class="treeview-item" href="{{ route('students.index') }}"><i class="icon fa fa-circle-o"></i>Student Profile</a></li>
            @endcan

            @can('RequestHostel')
            <li><a class="treeview-item" href="{{ route('requests.create') }}"><i class="icon fa fa-circle-o"></i>Request Hostel</a></li>
            @endcan

          </ul>
        </li>

        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Students Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('requests.index') }}"><i class="icon fa fa-circle-o"></i>Requests List</a></li>
            <li><a class="treeview-item" href="{{ route('acceptedRequest.accepted') }}"><i class="icon fa fa-circle-o"></i>Accepted Students</a></li>
            <li><a class="treeview-item" href="{{ route('rejectedRequest.rejected') }}"><i class="icon fa fa-circle-o"></i>Rejected Students</a></li>
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Students Allocations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('allocations.allocated') }}"><i class="icon fa fa-circle-o"></i>Allocated Stusents</a></li>

            @can('UpdateInfo')
            <li><a class="treeview-item" href="{{ route('allocations.index') }}"><i class="icon fa fa-circle-o"></i>Allocation List</a></li>
            @endcan

          </ul>
        </li>

        @can('UpdateInfo',' ManageStudent','ManageUsers')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        @endcan

          <ul class="treeview-menu">

            @can('UpdateInfo')
            <li><a class="treeview-item" href="{{ route('users.index') }}"><i class="icon fa fa-circle-o"></i>Manage Users</a></li>
            @endcan

            @can('ManageStudents')
            <li><a class="treeview-item" href="{{ route('students.index') }}"><i class="icon fa fa-circle-o"></i>Manage Student</a></li>
            @endcan

            @can('UpdateInfo')
            <li><a class="treeview-item" href="{{ route('roles.index') }}"><i class="icon fa fa-circle-o"></i>Manage Roles</a></li>
            <li><a class="treeview-item" href="{{ route('permissions.index') }}"><i class="icon fa fa-circle-o"></i>Manage permissions</a></li>
            @endcan

          </ul>
        </li>

        @can('UpdateInfo')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('hostels.index') }}"><i class="icon fa fa-circle-o"></i>Hostel</a></li>
            <li><a class="treeview-item" href="{{ route('users.index') }}"><i class="icon fa fa-circle-o"></i>Users</a></li>
            <li><a class="treeview-item" href="{{ route('blocks.index') }}"><i class="icon fa fa-circle-o"></i>Blocks</a></li>
            <li><a class="treeview-item" href="{{ route('rooms.index') }}"><i class="icon fa fa-circle-o"></i>Rooms</a></li>
            <li><a class="treeview-item" href="{{ route('beds.index') }}"><i class="icon fa fa-circle-o"></i>Beds</a></li>
            <li><a class="treeview-item" href="{{ route('yearSetting.index') }}"><i class="icon fa fa-circle-o"></i>Year</a></li>
          </ul>
        </li>
        @endcan

        <li><a class="app-menu__item" href="{{ route('beds.index') }}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Mattress</span></a></li>
        <li><a class="app-menu__item" href="{{ route('rooms.index') }}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Hostels</span></a></li>
      </ul>

    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <strong>ACCOMODATION MANAGEMENT SYSTEM</strong> </h1>
          <p>Management of students accomodation..</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
          
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
          
        </ul>
      </div>

      <div class="row">
          <div class="col-md-12">
              <div class="tile">
                  
         {{-- contents are here --}}
            <div class="tile-body">
              @include('erros.errors')
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
          </div>
          {{-- end of contents --}}

        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('plugins/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('plugins/pace.min.js') }}"></script>

        <!-- Data Tables -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>

    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script> --}}

  </body>
</html>