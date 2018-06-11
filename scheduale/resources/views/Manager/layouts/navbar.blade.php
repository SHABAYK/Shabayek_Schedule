<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>FC</b>IH</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>FC</b>IH</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            @include('Manager.layouts.menu')

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p> {{auth()->user()->username}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Colleague Information</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('settings')}}"><i class="fa fa-circle-o"></i>Update Information</a></li>
                    </ul>
                 </li>

@can('isManager')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Tables Access</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i>Home</a></li>
                        <li><a href="{{url('registration_time')}}"><i class="fa fa-circle-o"></i>Registration Time</a></li>
                        <li><a href="{{url('semester')}}"><i class="fa fa-circle-o"></i>Semester</a></li>
                        <li><a href="{{url('work_day')}}"><i class="fa fa-circle-o"></i>Work Day</a></li>
                        <li><a href="{{url('course')}}"><i class="fa fa-circle-o"></i>Open Course</a></li>
                    </ul>
                </li>
@endcan
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
