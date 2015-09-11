<?php
	//ROUTES

	//ROUTE TO ADMIN CONTROLLING USERS TABLE CONTROLLER
	$routes['user'] = 'User';
	$routes['general'] = 'GeneralUser';
	$routes['org'] = 'Organization';
	$routes['welf'] = 'Welfare';
	$routes['admin'] = "Admin";
	$routes['home'] = "Home";

	//fundraiser routes
	$routes['fund'] = 'FundController';
	$routes['paypal'] = 'Paypal';

	//profile routes
	$routes['profile'] = 'ProfileController';
	$routes['projects'] = 'ProjectController';
	$routes['requirements'] = 'RequirementController';

	$routes['search'] = 'SearchController';
?>