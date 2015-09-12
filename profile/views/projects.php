<?php
	
	foreach ($project_list as $project) {
	
	$req_list = $this->projectrepository->get_requirements($project->getProject_id(),$project);
	$project->setRequirement($req_list);
	
	$org_list = $this->projectrepository->get_organization($project->getProject_id(),$project);	
	$project->setOrganization($org_list);
?>
	<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3><?php echo $project->getTitle();?></h3>
        <p><?php var_dump($project);?></p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

	<?php
	}
?>