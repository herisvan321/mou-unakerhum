<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HUMAS</title>

    @include('include.links')
</head>

<body class="hold-transition layout-top-nav">
    <!-- Site wrapper -->
    <div class="wrapper">

@include('include.navbar')
        <div style="width: 100%;  background-color:#20487f; ">
            <div class="container">
                {{-- <img src="https://dummyimage.com/1240x350/dfdfdf/fff" style="width: 100%; height:350px;" /> --}}
               @include('include.slideshow')
            </div>
        </div>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <br>
           
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @include('include.wiget')
                    @yield('home')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer" >
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 HUMAS, Herisvan Hendra.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    @include("include.scripts")
</body>

</html>
