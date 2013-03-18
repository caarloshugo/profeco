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
		"params"	  => array(segment(1), segment(2))
	),
	3 => array(
		"pattern"	  => "/^brands/",
		"application" => "api",
		"controller"  => "api",
		"method"	  => "brands",
		"params"	  => array(segment(1), segment(2))
	),
	4 => array(
		"pattern"	  => "/^query/",
		"application" => "api",
		"controller"  => "api",
		"method"	  => "query",
		"params"	  => array(segment(1))
	),
	5 => array(
		"pattern"	  => "/^products/",
		"application" => "api",
		"controller"  => "api",
		"method"	  => "products",
		"params"	  => array(segment(1),segment(2), segment(3),segment(4), segment(5))
	)
);
