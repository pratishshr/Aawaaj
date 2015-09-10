<?php
	//ROUTES

	//ROUTE TO ADMIN CONTROLLING USERS TABLE CONTROLLER
	$routes['users'] = 'AdminUserController';
	$routes['general'] = 'GeneralUserController';
	$routes['org'] = 'OrganizationController';
	$routes['welf'] = 'WelfareController';
	$routes['admins'] = "Admins";

	//fundraiser routes
	$routes['fund'] = 'FundController';
	$routes['paypal'] = 'Paypal';

	//profile routes
	$routes['profile'] = 'ProfileController';
	$routes['projects'] = 'ProjectController';
	$routes['requirements'] = 'RequirementController';

	$routes['search'] = 'SearchController';
?>