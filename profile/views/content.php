<?php
if(isset($_GET['id'])){
    $page = 'profile';
    if(isset($_GET['page'])){
        
        if($_GET['page'] == 'projects' || $_GET['page'] == 'requirements'){
            $page = $_GET['page'];
            if(isset($_GET['m']) && $_GET['m'] == 'add'){
            	$page.='_add';
            }
            elseif($_GET['page'] == 'projects' && isset($_GET['p_id'])){
                $page.='_select';
            }
            elseif($_GET['page'] == 'requirements' && isset($_GET['r_id'])){
                $page.='_select';
            }
            
        }
        elseif($_GET['page'] == 'fundview'){
            $page = $_GET['page'];
        }
    }
    if(!isset($_GET['page']) && isset($_GET['m']) && $_GET['m'] == "edit"){
        $page.='_edit';
    }

    include_once(ROOT_PATH.'profile/views/'.$page.'.php');

}
?>