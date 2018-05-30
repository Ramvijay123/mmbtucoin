<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php echo link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <?php echo link_tag('assets/dist/css/AdminLTE.min.css'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?php echo link_tag('assets/dist/css/skins/_all-skins.min.css'); ?>
  <!-- iCheck -->
  <?php echo link_tag('assets/plugins/iCheck/flat/blue.css'); ?>
  <!-- Morris chart -->
  <?php echo link_tag('assets/plugins/morris/morris.css'); ?>
  <!-- jvectormap -->
  <?php echo link_tag('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>
  <!-- Date Picker -->
  <?php echo link_tag('assets/plugins/datepicker/datepicker3.css'); ?>
  <!-- Daterange picker -->
  <?php echo link_tag('assets/plugins/daterangepicker/daterangepicker-bs3.css'); ?>
  <!-- bootstrap wysihtml5 - text editor -->
 <?php echo link_tag('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ; ?>
   <!-- New-Css -->
 <?php echo link_tag('assets/dist/css/new_style.css'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
    <script src="<?php echo  base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js') ?>"></script>
    
    
  <?php $RemovalStdClass=get_object_vars($details[0]);
 date_default_timezone_set('Africa/Nairobi');
 $date = date('Y-m-d H:i:s');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MMBTU</b>Coin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
          
            <ul class="dropdown-menu">
             
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
     
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>uploads/admin/<?php echo $RemovalStdClass['pic']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $RemovalStdClass['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>uploads/admin/<?php echo $RemovalStdClass['pic']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $RemovalStdClass['name']; ?>
                  <small>Current Time: <?php echo $date;?></small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>admin/Profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>admin/Support/Logout" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="<?php echo base_url(); ?>uploads/admin/<?php echo $RemovalStdClass['pic']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $RemovalStdClass['name']; ?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
          <a href="#">
            
          <li><a href="<?php echo base_url(); ?>admin/Usermanagement"><i class="fa fa-dashboard"></i> User Management</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Package"><i class="fa fa-dashboard"></i> Package</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Wallet"><i class="fa fa-dashboard"></i> Wallet</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Support"><i class="fa fa-dashboard"></i> Support</a></li>
		  <li><a href="<?php echo base_url(); ?>admin/About"><i class="fa fa-dashboard"></i>About Us</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Roadmap"><i class="fa fa-dashboard"></i>Road Map</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Ico_token"><i class="fa fa-dashboard"></i>ICO Token</a></li>
          <li><a href="<?php echo base_url(); ?>admin/team"><i class="fa fa-dashboard"></i>Team</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Advisors"><i class="fa fa-dashboard"></i>Advisor</a></li>
          <li><a href="<?php echo base_url(); ?>admin/faq"><i class="fa fa-dashboard"></i>Faq</a></li>
          <li><a href="<?php echo base_url(); ?>admin/Newsection"><i class="fa fa-dashboard"></i>News</a></li>
          </a>
         s
        </li>

    
		
        
        
        
        
        
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>