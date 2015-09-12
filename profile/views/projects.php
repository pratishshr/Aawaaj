<?php
	
	foreach ($project_list as $project) {
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