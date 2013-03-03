<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

$routes = array(
	0 => array(
		"pattern"	  => "/^get/",
		"application" => "default",
		"controller"  => "default",
		"method"	  => "get",
		"params"	  => array(segment(1))
	),
	1 => array(
		"pattern"	  => "/^getCities/",
		"application" => "default",
		"controller"  => "api",
		"method"	  => "getCities",
		"params"	  => array(segment(1))
	)
);
