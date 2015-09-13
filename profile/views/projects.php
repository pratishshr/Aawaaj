<?php
	
	foreach ($project_list as $project) {
	
	$req_list = $this->projectrepository->get_requirements($project->getProject_id(),$project);
	$project->setRequirement($req_list);
	
	$org_list = $this->projectrepository->get_organization($project->getProject_id(),$project);	
	$project->setOrganization($org_list);
?>
<div class="container-fluid">
	<div class="row">
  <div class="col-sm-1 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $project->getBanner_image();?>" alt="..." style="height:200px">
      <div class="caption">
        <h3><?php echo $project->getTitle();?></h3>
        <p><?php //var_dump($project);?></p>
        <p><a href="<?php echo BASE_URL.'profile/index.php?id='.$_GET['id'].'&&page=projects&p_id='.$project->getProject_id();?>" class="btn btn-primary" role="button">Details</a>
       </div>
    </div>
  </div>
	<?php
	}
?>
</div>
