<?php 

//LoaderHelper::view('admin/header');
//LoaderHelper::view('admin/'.$view_page);
//LoaderHelper::view('admin/footer');
include_once(ROOT_PATH."admin/views/admin/header.php");
include_once(ROOT_PATH."admin/views/admin/".$view_page.".php");
include_once(ROOT_PATH."admin/views/admin/footer.php");