<?php
  if(empty($requirement_list)){
?>
  <div class="container alert alert-danger text-center" role="alert">
    <h1>No Requirements created by this user</h1>
  </div>
<?php
}
  $requirementrepository = new RequirementRepository();
	foreach ($requirement_list as $requirement) {
	 
	
?>
<div class="container-fluid">
	<div class="row">
  <div class="col-sm-1 col-md-4">
    <div class="thumbnail">
      <div class="caption">
      <h2><?php echo $requirement->getTitle();?></h2>
        <p>
          <b>Welfare : </b><br/><?php echo $requirementrepository->get_req_name($requirement->getWelfId())?>
          
          <b><br/>Description : </b><br/><?php echo $requirement->getDescription()?>
      </p>
          <a href="<?php echo BASE_URL.'profile/index.php?id='.$_GET['id'].'&page=requirements&r_id='.$requirement->getRequirementId();?>" class="btn btn-primary" role="button">Details</a>
       </div>
    </div>
  </div>
	<?php
	}
?>
</div>