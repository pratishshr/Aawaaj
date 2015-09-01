<?php require_once('../../config/config.php');?>
<?php

class PostRequirement{

	public function __construct(){
		include_once(ROOT_PATH.'app/view/postrequirement.php');
	}

}

$postrequirement = new PostRequirement();