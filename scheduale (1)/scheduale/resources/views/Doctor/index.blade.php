@include('Doctor.layouts.header')
@include('Doctor.layouts.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            {{Auth::user()->username }}
            <small>Doctor</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('Doctor.layouts.message')
        @yield('content')

    </section>
    <!-- /.content -->
</div>

@include('Doctor.layouts.footer')

