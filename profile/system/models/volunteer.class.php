<?php

Class Volunteer{



	private $userId;
	private $username;

	public function getUserId()
	{
	    return $this->userId;
	}
	
	public function setUserId($userId)
	{
	    $this->userId = $userId;
	}
	public function getUsername()
	{
	    return $this->username;
	}
	
	public function setUsername($username)
	{
	    $this->username = $username;
	}
}


?>