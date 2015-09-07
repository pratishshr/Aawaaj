<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php");;?>
<?php

class PostRequirement{

	public function __construct(){
		include_once(ROOT_PATH.'app/view/postrequirement.php');
	}

}

$postrequirement = new PostRequirement();