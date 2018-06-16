@include('academic.layouts.header')
@include('academic.layouts.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{Auth::user()->username }}
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('academic.layouts.message')
        @yield('content')

    </section>
    <!-- /.content -->
</div>

@include('academic.layouts.footer')