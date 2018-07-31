<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Vanness Plus | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- search button --> 
        <link rel="stylesheet" href="src/jquery.treefilter.css">

        <link rel="icon" type="image/png" href="/images/vpc-logo.png">


    </head>
    <body class="skin-blue">
    <!-- Main Header -->
    @include('header')
    <!-- Left side column. contains the logo and sidebar -->
    <div class="wrapper">

        @include('sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Folder
                    <small>Your resume folder</small>
                
                </h1>
               
            </section>

            <!-- Main content -->
            <section class="content">
           
            @yield('content')

            <div class="container">

              <!-- search form (Optional) -->
    <ul class="dropdown">
    <form action="#" method="get" >
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search..."/>
        <span class="input-group-sm mb-3">
    <button type='submit' name='search' id='search-btn' class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
        </div>
    </form>
    </ul>
    <!-- /.search form -->
                <div class="row">
                <div class="col-lg-12"><br/>
                @if(Session::has('message'))
                <br><div class="alert alert-info">{{Session::get('message') }}</div>
                @endif
                </hr>
                <table class="table table-striped table-bordered">
                <thread>
                <tr>
                <td width="50" class="text-center">Manage</td>
                <td width="200" class="text-center">First Name</td>
                <td width="200" class="text-center">Last Name</td>
                <td width="120" class="text-center">E-mail</td>
                <td width="90" class="text-center">Position</td>
                <td width="90" class="text-center">Phone</td>
                
                </tr>
                </thread>

                <td class="text-center">
                <a class="btn btn-small btn-success" href="">View</a>
                <a class="btn btn-small btn-info" href="">Edit</a> &nbsp;
                </td>
                
              

                </table>
                </div>
                </div>
                </div>
                <hr/>           
                <!-- Your Page Content Here -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->


        <!-- Main Footer -->
        @include('footer')

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

    
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->

          <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>