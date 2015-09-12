<?php
	
	foreach ($project_list as $project) {
	
	$req_list = $this->projectrepository->get_requirements($project->getProject_id(),$project);
	$project->setRequirement($req_list);
	
	$org_list = $this->projectrepository->get_organization($project->getProject_id(),$project);	
	$project->getOrganization($org_list);
?>
	<table>
			<tr><td><?php echo $project->getProject_id();?></td></tr>
			<tr><td><?php echo $project->getStart_date();?></td></tr>
			<tr><td><?php echo $project->getEnd_date();?></td></tr>
			<tr><td><?php echo $project->getTitle();?></td></tr>
			<tr><td><?php echo $project->getObjectives();?></td></tr>
	</table>
	<?php
	}
?>