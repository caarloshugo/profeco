<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

$routes = array(
	0 => array(
		"pattern"	  => "/^products/",
		"application" => "default",
		"controller"  => "default",
		"method"	  => "products",
		"params"	  => array(segment(1))
	),
	1 => array(
		"pattern"	  => "/^brands/",
		"application" => "default",
		"controller"  => "default",
		"method"	  => "brands",
		"params"	  => array(segment(1))
	),
	2 => array(
		"pattern"	  => "/^prices/",
		"application" => "default",
		"controller"  => "default",
		"method"	  => "prices",
		"params"	  => array(segment(1), segment(2), segment(3))
	)
);
