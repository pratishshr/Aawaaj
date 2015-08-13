<?php
class LoaderHelper{

	public static function view($page){
		if(file_exists(ROOT_PATH ."/views/".$page.".php")){
			include_once(ROOT_PATH ."/views/".$page.".php");
		}
		else{
			echo $page . " Not Found";
		}
	}
}