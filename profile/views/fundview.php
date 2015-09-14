<?php
	
	foreach ($fundview_list as $fund) {
?>
<div class="container-fluid">
	<div class="row">
  <div class="col-sm-1 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $fund->get_image();?>" style="height:200px">
      <div class="caption">
        <h2><?php echo $fund->get_title();?></h2>
        <p>
	        <b>Type : </b><br/><?php echo $fund->get_fundraiser_type()?>
	        <b><br/>Description : </b><br/><?php echo $fund->get_description()?>
	        <b><br/>Amount : </b><?php echo $fund->get_amount()?>
	        <b><br/>End Date : </b><?php echo $fund->get_end_date()?>
	    </p>
	        <a href="<?php echo BASE_URL.'fundraiser/index.php?page=fund&m=campaign&id='.$fund->get_id();?>" class="btn btn-primary" role="button">Details</a>
       </div>
    </div>
  </div>
	<?php
	}
?>
</div>
