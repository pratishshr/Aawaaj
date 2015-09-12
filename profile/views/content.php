<?php
if(isset($_GET['id'])){
    $page = 'profile';
    if(isset($_GET['page'])){
        
        if($_GET['page'] == 'projects' || $_GET['page'] == 'requirements' || $_GET['page'] == 'fundraisers'){
            $page = $_GET['page'];
            if(isset($_GET['m']) && $_GET['m'] == 'add'){
            	$page.='_add';
            }
            
        }
    }
    if(!isset($_GET['page']) && isset($_GET['m']) && $_GET['m'] == "edit"){
        $page.='_edit';
    }

    include_once(ROOT_PATH.'profile/views/'.$page.'.php');

}
?>