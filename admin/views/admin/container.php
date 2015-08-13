<?php 

//LoaderHelper::view('admin/header');
//LoaderHelper::view('admin/'.$view_page);
//LoaderHelper::view('admin/footer');
include_once(ROOT_PATH."/views/admin/header.php");
include_once(ROOT_PATH."/views/admin/".$view_page.".php");
include_once(ROOT_PATH."/views/admin/footer.php");