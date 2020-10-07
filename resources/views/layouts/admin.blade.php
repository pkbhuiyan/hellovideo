<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


      @toastr_css
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition skin-blue sidebar-mini" >
@can('isAdmin')
<div>
<div class="wrapper" >

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
          
       
        </ul>
      </div>
    </nav>
  </header>



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> -->
        
        <li><a class="nav-link" href="/dashboard" ><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li><a class="nav-link" href="/categories"><i class="fa fa-link"></i> <span>Category</span></a></li>
        

        <!-- treeview -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Video</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li><a class="nav-link" href="/videoupload"><i class="fa fa-link"></i> <span>Video Upload</span></a></li>
          <li><a class="nav-link" href="/videos"><i class="fa fa-link"></i> <span>Video Library</span></a></li>
          <li><a class="nav-link" href="/play_lists"><i class="fa fa-link"></i> <span>Playlist</span></a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->




    <!-- Main content -->
    <section class="content container-fluid"  >

    
      @yield('content')

    
    </section>
    <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->




  <!-- Main Footer -->
  <!-- <footer class="main-footer">

   
  </footer> -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
@endcan
<script src="{{asset('js/app.js')}}"></script>
<!-- Flot chart js -->
<script src="{{asset('plugin/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{asset('plugin/flot-chart/jquery.flot.crosshair.js')}}"></script>


<script src="{{asset('plugin/flot-chart/jquery.flot.init.js')}}"></script>
<script>

$('#submit').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit').attr('disabled',true);}
 }
});


</script>



@jquery
@toastr_js
@toastr_render



<style>
a{
text-decoration:none!important;
}
.main-header .sidebar-toggle{
padding:0!important;
}
.main-header .sidebar-toggle:hover{
  background:none!important;
}
.skin-blue .sidebar-menu > li> a.active  {
  border-left-color: #3c8dbc;
}
button:focus{
  outline: none!important;
}
.skin-blue .main-header .navbar{
  background-color: #fff;
}
.skin-blue .main-header .navbar .sidebar-toggle {
    color: #000;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover{
  color: #000;
}
.skin-blue .main-header .logo,.skin-blue .main-header .logo:hover{
  background-color: #000;
}
.img{
  object-fit: cover!important;
}
</body>
</html>