<?php

/**
* Project model class containing the set and get methods
*/
class Project 
{
		private $project_id;
		private $start_date;
		private $end_date;
		private $title;
		private $objectives;
		private $shortdes;
		private $location;
		private $budget;
		private $volunteer;
		private $banner_image;
		private $project_proposal;
		private $videourl;
		private $detail;
		private $status;
		private $uid;

	function __construct()
	{
		
	}
		 public function getProject_id()
		 {
		 	return $this->project_id;
		 }

		 public function setProject_id($project_id)
		 {
		 	$this->project_id=$project_id;
		 }

		 public function getStart_date()
		 {
		     return $this->start_date;
		 }
		 
		 public function setStart_date($start_date)
		 {
		     $this->start_date = $start_date;
		     
		 }
		 public function getEnd_date()
		 {
		     return $this->end_date;
		 }
		 
		 public function setEnd_date($end_date)
		 {
		     $this->end_date = $end_date;
		     
		 }
		 public function getTitle()
		 {
		     return $this->title;
		 }
		 
		 public function setTitle($title)
		 {
		     $this->title = $title;
		     
		 }
		 public function getObjectives()
		 {
		     return $this->objectives;
		 }
		 
		 public function setObjectives($objectives)
		 {
		     $this->objectives = $objectives;
		     
		 }
		 public function getShortdes()
		 {
		     return $this->shortdes;
		 }
		 
		 public function setShortdes($shortdes)
		 {
		     $this->shortdes = $shortdes;
		     
		 }
		 public function getLocation()
		 {
		     return $this->location;
		 }
		 
		 public function setLocation($location)
		 {
		     $this->location = $location;
		    
		 }
		 public function getBudget()
		 {
		     return $this->budget;
		 }
		 
		 public function setBudget($budget)
		 {
		     $this->budget = $budget;
		     
		 }
		 public function getVolunteer()
		 {
		     return $this->volunteer;
		 }
		 
		 public function setVolunteer($volunteer)
		 {
		     $this->volunteer = $volunteer;
		     
		 }
		 public function getBanner_image()
		 {
		     return $this->banner_image;
		 }
		 
		 public function setBanner_image($banner_image)
		 {
		     $this->banner_image = $banner_image;
		     
		 }
		 public function getProject_proposal()
		 {
		     return $this->project_proposal;
		 }
		 
		 public function setProject_proposal($project_proposal)
		 {
		     $this->project_proposal = $project_proposal;
		     
		 }
		 public function getVideourl()
		 {
		     return $this->videourl;
		 }
		 
		 public function setVideourl($videourl)
		 {
		     $this->videourl = $videourl;
		     
		 }
		 public function getDetail()
		 {
		     return $this->detail;
		 }
		 
		 public function setDetail($detail)
		 {
		     $this->detail = $detail;
		     
		 }
		 public function getStatus()
		 {
		     return $this->status;
		 }
		 
		 public function setStatus($status)
		 {
		     $this->status = $status;
		     
		 }
		 public function getUid()
		 {
		     return $this->uid;
		 }
		 
		 public function setUid($uid)
		 {
		     $this->uid = $uid;
		    
		 }
}


?>