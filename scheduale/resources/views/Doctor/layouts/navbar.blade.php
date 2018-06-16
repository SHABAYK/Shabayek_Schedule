<body class="hold-transition skin-blue sidebar-mini">


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

            @include('Doctor.layouts.menu')

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


                        <li><a href="{{url('Students List')}}"><i class="fa fa-circle-o"></i>Preview Students List </a></li>

                <li class="treeview">
                <li class=""><a href="{{url('Grade')}}"><i class="fa fa-circle-o"></i>Grades</a></li>

                <li class="treeview">
              
                    <li class=""><a href="{{url('Edit_info')}}"><i class="fa fa-circle-o"></i>Edit Profile</a></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Register</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class=""><a href="{{url('courses')}}"><i class="fa fa-circle-o"></i>Register Courses</a></li>
                        <li class=""><a href="{{url('show request')}} "><i class="fa fa-circle-o"></i>Preview Requests </a></li>

                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
