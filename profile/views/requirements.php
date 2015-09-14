<?php
  
 if(empty($fundview_list)){
?>
  <div class="container alert alert-danger text-center" role="alert">
    <h1>No Requirements created by this user</h1>
  </div>
<?php
}
	foreach ($requirement_list as $requirement) {
	
	
?>
<div class="container-fluid">
	<div class="row">
  <div class="col-sm-1 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $project->getBanner_image();?>" style="height:200px">
      <div class="caption">
      <?php
      	

      ?>
        <h2><?php echo $requirement->getTitle();?></h2>
        <p>
        	<b>Title : </b><br/><?php echo $requirement->getTitle()?>
	        <b><br/>End Date : </b><?php echo $requirement->getDate()?>
	    </p>
	        <a href="<?php echo BASE_URL.'profile/index.php?id='.$_GET['id'].'&page=requirements&p_id='.$requirement->getRequirementId();?>" class="btn btn-primary" role="button">Details</a>
       </div>
    </div>
  </div>
	<?php
	}
?>
</div>