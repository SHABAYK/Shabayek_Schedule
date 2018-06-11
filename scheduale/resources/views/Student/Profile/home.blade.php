<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{auth()->user()->username}} Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('design/adminlte') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('design/adminlte') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('design/adminlte') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('design/adminlte') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('design/adminlte') }}/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{url('design/student') }}/course register/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="http://localhost/sceduale/public/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>FC</b>IH</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>FCIH</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- Tasks: style can be found in dropdown.less -->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{auth()->user()->username}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>
                                    Welcome {{auth()->user()->username}} <br>
                                    Hour   {{auth()->user()->user_id()->first()->credit_hours}}

                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
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
                    <p>{{auth()->user()->username}}</p>
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

                <li>
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Colleage Information</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <h2>{{session('success')}}</h2>
                </div>
            @endif


            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <h2>{{session('error')}}</h2>
                </div>
            @endif
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{url('design/adminlte') }}/dist/img/user2-160x160.jpg" alt="User profile picture">

                            <h3 class="profile-username text-center">{{auth()->user()->username}}</h3>

                            <p class="text-muted text-center">Student</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Department</b> <a class="pull-right">{{auth()->user()->user_id()->first()->dept_id()->first()->name}}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right">{{auth()->user()->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Entry Date</b> <a class="pull-right">{{auth()->user()->user_id()->first()->entry_date}}</a>
                                </li>
                            </ul>

                            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i>Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Helwan at Cairo - Egypt
                            </p>

                            <hr>

                            <strong><i class="fa fa-level-up margin-r-5"></i> Level & Hours</strong>

                            <p class="text-muted">
                                 Hours: {{auth()->user()->user_id()->first()->credit_hours}}
                            </p>
                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                            <p>
                                <span class="label label-danger">UI Design</span>
                                <span class="label label-success">Coding</span>
                                <span class="label label-info">Javascript</span>
                                <span class="label label-warning">PHP</span>
                                <span class="label label-primary">Laravel</span>
                            </p>

                            <hr>

                            {{--<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            {{--<li><a href="#timeline" data-toggle="tab">Show Courses</a></li>--}}
                            <li><a href="#Register" data-toggle="tab">Register Courses</a></li>
                            <li><a href="{{route('std.edit',auth()->user()->id)}} {{--#settings--}}" {{--data-toggle="tab"--}}>Settings</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-red">
                         My Courses
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Show course</a></h3>

                                            <div class="timeline-body">
                                                Put All courses He registered

                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                            <h3 class="timeline-header no-border"><a href="#">My Grades</a></h3>
                                            <div class="timeline-body">
                                                Put My Grades Here.
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->

                                    <!-- timeline item -->

                                </ul>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="active tab-pane" id="Register">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-red">
                         Open Register Form
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-address-book bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Register course</a></h3>

                                            <div class="timeline-body">
                                                <div class="col-md-12">
                                                    <div class="panel panel-primary filterable">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Courses<span style="color: white; font-weight: bold;"></span></h3>
                                                            <div class="pull-right">
                                                                <button type="button" class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                                                            </div>
                                                        </div>
                                                        <table class="span12">
                                                            <table>
                                                                <tr class="filters">
                                                                    <th style="width: 4.1%; width:50px;">
                                                                        <div class="checkbox radio-margin">
                                                                            <label>
                                                                                <input type="checkbox" value="">
                                                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                            </label>
                                                                        </div>
                                                                    </th>
                                                                    <th style="width: 48%">
                                                                        <input type="text" class="form-control" placeholder="Course Name" disabled>
                                                                    </th>
                                                                    <th style="width: 48%">
                                                                        <input type="text" class="form-control" placeholder="Course ID" disabled>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                            <div class="bg tablescroll">
                                                                <table class="table table-bordered table-striped">
                                                                    <tr>
                                                                        <td style="width: 4.1%; width:50px;">
                                                                            <div class="checkbox radio-margin">
                                                                                <label>
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                                </label>
                                                                            </div>
                                                                        </th>
                                                                        <td style="width: 49.8%">Data Structure</th>
                                                                        <td style="width: 48%">CS 214</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 4.1%; width:50px;">
                                                                            <div class="checkbox radio-margin">
                                                                                <label>
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td style="width: 48%">Logic Design</td>
                                                                        <td style="width: 48%">CS 221</td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td style="width: 4.1%; width:50px;">
                                                                            <div class="checkbox radio-margin">
                                                                                <label>
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td style="width: 48%">Project Management</td>
                                                                        <td style="width: 48%">IS 321</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="width: 4.1%; width:50px;">
                                                                            <div class="checkbox radio-margin">
                                                                                <label>
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td style="width: 48%">Programing Language -1</td>
                                                                        <td style="width: 48%">CS 300</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="width: 4.1%; width:50px;">
                                                                            <div class="checkbox radio-margin">
                                                                                <label>
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td style="width: 48%">Programing Language -2</td>
                                                                        <td style="width: 48%">CS 301</td>
                                                                    </tr>

                                                                </table>
                                                            </div>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-success btn-xs">Submit</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                {{--  <li>
                                      <i class="fa fa-angle-double-down bg-aqua-gradient"></i>

                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> 21:05</span>

                                          <h3 class="timeline-header"><a href="#">Drop Courses</a></h3>

                                          <div class="timeline-body">
                                              Choose All courses He will drop it from doctor osama when he open form for Registering.

                                          </div>
                                          <div class="timeline-footer">
                                             --}}{{-- <a class="btn btn-primary btn-xs">Read more</a>--}}{{--
                                              <a class="btn btn-danger btn-xs">Delete</a>
                                          </div>
                                      </div>
                                  </li>--}}
                                <!-- timeline item -->

                                    <!-- timeline item -->

                                </ul>
                            </div>
                            <!-- /.tab-pane -->


                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://fcih.com">Computer Scince at Helwan university</a>.</strong> All rights
        reserved.
    </footer>


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('design/adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('design/adminlte') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{url('design/adminlte') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('design/adminlte') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('design/adminlte') }}/dist/js/demo.js"></script>
<!-- Course Register -->
<script src="{{url('design/student') }}/course register/js/animation.js"></script>
</body>
</html>
