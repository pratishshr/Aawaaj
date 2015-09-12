<?php 
$username = $_SESSION['username'];

$admin = $this->adminrepository->get_by_username($username);
$username = $admin->get_username();
$first_name = $admin->get_first_name();
$last_name = $admin->get_last_name();
$email = $admin->get_email();
$image = $admin->get_image();

//LoaderHelper::view('admin/header');
//LoaderHelper::view('admin/'.$view_page);
//LoaderHelper::view('admin/footer');
include_once(ROOT_PATH."admin/views/admin/header.php");
include_once(ROOT_PATH."admin/views/admin/".$view_page.".php");
include_once(ROOT_PATH."admin/views/admin/footer.php");

?>