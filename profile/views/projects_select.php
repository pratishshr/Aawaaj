<?php 
$req_list = $this->projectrepository->get_requirements($project->getProject_id(),$project);
$project->setRequirement($req_list);
	
$org_list = $this->projectrepository->get_organization($project->getProject_id(),$project);	
$project->setOrganization($org_list);
var_dump($project);
?>