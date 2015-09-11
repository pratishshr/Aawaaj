<?php
	echo "<table>";
	foreach ($project_list as $project) {
	?>
		<tr>
			<td><?php echo $project->get_project_id();?></td>
		</tr>
	<?php
	}
	echo "</table>";
?>