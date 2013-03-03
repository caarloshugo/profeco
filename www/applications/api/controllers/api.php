<?php
/**
 * Access from index.php:
 */


class Api_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates     = $this->core("Templates");
		$this->Api_Model = $this->model("Api_Model");
		
		$this->Templates->theme();
	}
	
	public function cities() {
		$vars["cities"] = $this->Api_Model->getCities();
		echo json_encode($vars);
	}
	
	public function categories() {
		$vars["categories"] = $this->Api_Model->getCategories();
		echo json_encode($vars);
	}
	
	public function subcategories($id_category) {
		$vars["sub-categories"] = $this->Api_Model->getSubCategories($id_category);
		echo json_encode($vars);
	}
}
