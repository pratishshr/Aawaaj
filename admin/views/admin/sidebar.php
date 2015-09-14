<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
  if($page =="user" || $page =="general" || $page =="org" || $page =="welf"){
    $active = true;
  }else{
    $active = false;
  }
}else{
  $active = false;
}
  
?>
<!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $image;?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $first_name.' '.$last_name;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
        
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo ($active)?('active'):'';?> treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo BASE_URL?>admin/user"><i class="fa fa-circle-o"></i> All User</a></li>
                <li><a href="<?php echo BASE_URL?>admin/general"><i class="fa fa-circle-o"></i> General User</a></li>
                <li><a href="<?php echo BASE_URL?>admin/org"><i class="fa fa-circle-o"></i> Organization</a></li>
                <li><a href="<?php echo BASE_URL?>admin/welf"><i class="fa fa-circle-o"></i> Welfare</a></li>
              </ul>
              <li>
              <a href="<?php echo BASE_URL?>admin/admin">
                <i class="fa fa-user"></i> <span>Admins</span>
              </a>
              </li>
              <li>
              <a href="<?php echo BASE_URL?>admin/fundraiser">
                <i class="fa fa-credit-card"></i> <span>Fundraisers</span>
              </a>
              </li>
            </li>

     
        </section>
        <!-- /.sidebar -->
      </aside>