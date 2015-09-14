<?php 
$req_list = $this->projectrepository->get_requirements($project->getProject_id(),$project);
$project->setRequirement($req_list);
	
$org_list = $this->projectrepository->get_organization($project->getProject_id(),$project);	
$project->setOrganization($org_list);
?>
<div class="container panel black-color">
	<br/>
	<figure>
        <img src="<?=$project->getBanner_image()?>" alt="" class="img-responsive img-thumbnail profile-picture">
    </figure>
    <br/>
    <div class="thumbnail">
	       	<h1><?=$project->getTitle()?></h1>
	    	<p><b>Date : </b><u><?=$project->getStart_date()?></u><?php if($project->getEnd_date()!=''){ echo ' <b>To</b> <u>'.$project->getEnd_date().'</u>';}?></p>
	    	<p><b>Objective : </b><br/><?=$project->getObjectives()?></p>
	    	<p><b>Description (short) : </b><br/><?=$project->getShortdes()?></p>
	    	<p><b>Location : </b><?=$project->getLocation()?></p>
	    	<p><b>Budget : </b><?=$project->getBudget()?></p>
	    	<?php
	    		if($project->getVolunteer()!=''){
	    	?>
	    	<p><b>Volunteers Required: </b><?=$project->getVolunteer()?></p>
	    		<?php if($project->getVolunteer()>=1 && $_SESSION['user_type']=='generalUser'){ ?>
	    		<p><a href="<?php echo BASE_URL.'profile/controllers/volunteer.php?id='.$project->getUid();?>" > Apply for volunteer </a></p>
	    		<?php } ?>
	    	<?php		
	    		}
	    	?>
	    	<p><b>Details : </b><br/><?=$project->getDetail()?></p>
	    	<p><a href="<?=$project->getProject_proposal()?>" target="_blank" class="dwnld-link">Download Proposal</a></p>
	</div>
	<?php 
        $video_url = $project->getVideourl();

        if(!empty($video_url)){

    ?>                 

        	<h2>Project Video</h2>
             
        	<div class="thumbnail embed-responsive embed-responsive-16by9">
			    <iframe class="embed-responsive-item" src="<?php echo $video_url;?>"></iframe>
			</div>	
    <?php 
        }
    ?>
</div>