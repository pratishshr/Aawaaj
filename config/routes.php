<?php
	//ROUTES

	//ROUTE TO ADMIN CONTROLLING USERS TABLE CONTROLLER
	$routes['users'] = 'AdminUserController';
	$routes['general'] = 'GeneralUserController';
	$routes['org'] = 'OrganizationController';
	$routes['welf'] = 'WelfareController';

	//fundraiser routes
	$routes['fund'] = 'FundController';
	$routes['profile'] = 'ProfileController';
	$routes['projects'] = 'ProjectController';
	$routes['requirements'] = 'RequirementController';
?>