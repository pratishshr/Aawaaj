<?php 
 $jsonData = file_get_contents(ROOT_PATH."/admin/views/admin/notifications.json");
 $jsonData = json_decode($jsonData); 
 $noti = $jsonData->noti;
 
?>

<!DOCTYPE html>
<html>
  <head>
    
    <title>Admin's Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo BASE_URL?>admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo BASE_URL?>admin/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL?>admin/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo BASE_URL?>admin/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo BASE_URL;?>admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>dm</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $image;?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $username;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $image;?>" class="img-circle" alt="User Image" />
                    <p>
                     <?php echo $first_name.' '.$last_name;?> <br/>
                     <?php echo $email; ?>
                    </p>
                  </li>
               
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo BASE_URL.'admin/index.php?page=admin&m=logout';?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>

               <!-- NOTIFICATIONS -->
                 <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="clickNoti">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning" id="noti"></span>
                  </a>
                  <ul class="dropdown-menu">
                    
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                      
                        <li>
                          <a href="<?php echo BASE_URL.'/admin/user';?>">
                            <i class="fa fa-users text-aqua"></i> <span id="noti2"></span> new member has just joined.
                          </a>
                        </li>
                    
                        
                      </ul>
                    </li>
                    <li class="footer"><a href="<?php echo BASE_URL.'/admin/user';?>">View all</a></li>
                  </ul>
                </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <?php include_once(ROOT_PATH."admin/views/admin/sidebar.php");?>
     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      