<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

$routes = array(
	0 => array(
		"pattern"	  => "/^cities/",
		"application" => "api",
		"controller"  => "api",
		"method"	  => "cities",
		"params"	  => array(segment(1))
	),
	1 => array(
		"pattern"	  => "/^categories/",
		"application" => "api",
		"controller"  => "api",
		"method"	  => "categories",
		"params"	  => array(segment(1))
	),
	2 => array(
		"pattern"	  => "/^sub-categories/",
		"application" => "api",
		"controller"  => "api",
		"method"	  => "subcategories",
		"params"	  => array(segment(1))
	)
);
