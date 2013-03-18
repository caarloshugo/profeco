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
	
	public function subcategories($id_city, $id_category) {
		$vars["sub-categories"] = $this->Api_Model->getSubCategories($id_city, $id_category);
		echo json_encode($vars);
	}
	
	public function brands($id_city, $id_subcategory) {
		$vars["brands"] = $this->Api_Model->getBrands($id_city, $id_subcategory);
		echo json_encode($vars);
	}
	
	public function products($id_city, $id_category, $id_subcategory, $id_brand, $offset = 0) {
		if($offset==0) {
			$offset=0;
		}
		
		$vars["products"] = $this->Api_Model->getProducts($id_city, $id_category, $id_subcategory, $id_brand, $offset);
		echo json_encode($vars);
	}
	
	public function query($text) {
		$vars["products"] = $this->Api_Model->query($id_city, $id_subcategory);
		echo json_encode($vars);
	}
}
