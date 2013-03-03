<?php
/**
 * Access from index.php:
 */


class Default_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates     = $this->core("Templates");
		$this->Default_Model = $this->model("Default_Model");
		
		$this->Templates->theme();
	}
	
	public function index() {
		$vars["cities"] = $this->Default_Model->getCities();
		$vars["view"] 	= $this->view("home", TRUE);
			
		$this->render("content", $vars);
	}
	
	public function cities() {
		$vars["cities"] = $this->Default_Model->getCities();
		echo json_encode($vars);
	}
	
	public function categories() {
		$vars["categories"] = $this->Default_Model->getCategories();
		echo json_encode($vars);
	}
}
