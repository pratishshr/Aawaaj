<div class="container black-color">
	<br/>
	
    <br/>
    <div class="thumbnail col-md-9">
	       	<h1><?=$requirement->getTitle()?></h1>
	    	<p><b>End Date : </b><u><?=$requirement->getDate()?></u></p>
	    	
	    	<?php
	    		if($requirement->getOrgname()!=''){
	    	?>
	    	<p><b>Organization : </b><?=$requirement->getOrgname()?></p>
	    	<?php
	    		}
	    	?>
	    	<p><b>Description : </b><br/><?=$requirement->getDescription()?></p>
<?php
	if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "organization" && $requirement->getOrgname() ==''){    	
?>

	<a href="<?php echo BASE_URL.'profile/index.php?id='.$_GET['id'].'&page=requirements&r_id='.$_GET['r_id'].'&accept=yes'?>" class="btn btn-success" onclick="return confirm('Accept Project?')">Accept</a>
	</div>
<?php
}
?>
	
</div>