<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php");;?>
<?php

class PostProject{

	public function __construct(){
		include_once(ROOT_PATH.'app/view/postproject.php');
	}

}

$postproject = new PostProject();