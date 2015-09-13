<?php

/**
* Project model class containing the set and get methods
*/
class Requirement
{
		private $requirementId;
		private $date;
		private $orgname;
		private $title;
		private $description;
		private $status;
		
		public function getRequirementId()
		{
		    return $this->requirementId;
		}
		
		public function setRequirementId($requirement_id)
		{
		    $this-> = $requirement_id;
		   
		}
		public function getTitle()
		{
		    return $this->title;
		}
		
		public function setTitle($title)
		{
		    $this->title = $title;
		    
		}
		public function getDescription()
		{
		    return $this->description;
		}
		
		public function setDescription($description)
		{
		    $this->description = $description;
		   
		}
		public function getDate()
		{
		    return $this->date;
		}
		
		public function setDate($date)
		{
		    $this->date = $date;
		 }
		 public function getStatus()
		{
		    return $this->status;
		}
		
		public function setStatus($status)
		{
		    $this->status = $status;
		    
		}
		public function getOrgname()
		{
		    return $this->orgname;
		}
		
		public function setOrgname($orgname)
		{
		    $this->orgname = $orgname;
		    
		}