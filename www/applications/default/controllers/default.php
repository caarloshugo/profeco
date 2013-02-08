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
		$vars["categories"] = $this->Default_Model->getCategories();
		$vars["view"] = $this->view("home", TRUE);
			
		$this->render("content", $vars);
	}
	
	public function products($cat) {
		if($cat) {
			$response["products"] = $this->Default_Model->getProducts($cat);
			
			echo json_encode($response);
		}
	}
	
	public function brands($product) {
		if($product) {
			$product = str_replace("-", " ", urldecode($product));
			$response["brands"] = $this->Default_Model->getBrands($product);
			
			echo json_encode($response);
		}
	}
	
	public function prices($cat, $product, $brand) {
		if($cat and $product) {
			$product = str_replace("-", " ", urldecode($product));
			$brand   = str_replace("-", " ", urldecode($brand));
			
			$response["prices"] = $this->Default_Model->getPrices($cat, $product, $brand);
			
			echo json_encode($response);
		}
	}
}
