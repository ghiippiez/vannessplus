 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name }}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- search form (Optional) -->
    <li class="dropdown">
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
    </span>
        </div>
    </form>
    </li>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="upload"><span>Upload</span></a></li>
        <li><a href="create"><span>Create</span></a></li>
        <li>
            <a href="calendar"><span>Calendar & events</span></a></li>
            <li><a href="Folder"><span>Folder</span></a></li>
    </ul><!-- /.sidebar-menu -->
    <!-- Sidebar Menu -->
  
</section>
<!-- /.sidebar -->
</aside>
