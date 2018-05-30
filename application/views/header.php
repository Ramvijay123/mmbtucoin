<?php 
$userdata=get_object_vars($userdata[0]);
?>
<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>MMBTU Coin</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url() ?>assests/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assests/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assests/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assests/css/admin_style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

  <!-- Google Font -->

  <link rel="stylesheet"

        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->

    <a href="<?php echo base_url();?>Dasboard" class="logo">

      <span class="logo-mini">MMBTU</span>

      <span class="logo-lg">MMBTU Coin</span>

    </a>



    <!-- Header Navbar -->

    <nav class="navbar navbar-static-top" role="navigation">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <!-- Notifications Menu -->

          <li class="dropdown notifications-menu">

            <!-- Menu toggle button -->

         

            <ul class="dropdown-menu">

             

              <li>

                <!-- Inner Menu: contains the notifications -->

          

              </li>

             

            </ul>

          </li>

          <!-- User Account Menu -->

          <li class="dropdown">

            <!-- Menu Toggle Button -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php 
               if($userdata['profile']){?>
                <img src="<?php echo base_url();?>/upload/profile/<?php echo $userdata['profile'];?>" style="width: 27px;border-radius: 50px;"/>
              <?php  }else{?>
                <i class="fa fa-user-circle-o"></i> 
               <?php }
               ?>
              

              <span class="hidden-xs"><?php echo $userdata['name'];?></span>

            </a>

            <ul class="dropdown-menu">

                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li><a href="http://mmbtucoin.com/mmbtucoin/Account"><i class="fa fa-user"></i> My Account</a></a></li>

                <li><a href="#"><i class="fa fa-envelope"></i> Support</a></a></li>

                <li><a href="http://mmbtucoin.com/mmbtucoin/login/logout"><i class="fa fa-power-off"></i> Log out</a></a></li>

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

          </li>

        </ul>

      </div>

    </nav>

  </header>