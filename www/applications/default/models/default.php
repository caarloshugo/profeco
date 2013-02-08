<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Default_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		
		$this->helpers();
	
		$this->table = "dataset";
	}
	
	public function getCategories() {
		$query = "SELECT  DISTINCT(trim(categoria)) as cat, id_categoria FROM dataset;";
		$data  = $this->Db->query($query);
		
		return $data;
	}
	
	public function getProducts($cat) {
		$query = "SELECT DISTINCT(trim(producto)) as producto FROM dataset where id_categoria=" . $cat. ";";
		$data  = $this->Db->query($query);
		
		return $data;
	}
	
	public function getBrands($product) {
		$query  = "SELECT DISTINCT(trim(marca)) as marca FROM dataset where producto like '%" . $product ."%';";
		$data  = $this->Db->query($query);
		
		return $data;
	}
	
	public function getPrices($cat, $product, $brand) {
		if($brand == 0) { 
			$query  = "SELECT trim(establecimiento) as establecimiento, trim(producto) as producto,";
			$query .= " trim(marca) as marca, trim(presentacion) as presentacion,";
			$query .= " trim(precio) as precio FROM dataset where id_categoria=" . $cat. " and producto like '%" . $product ."%';";
		} else {
			$query  = "SELECT trim(establecimiento) as establecimiento, trim(producto) as producto,";
			$query .= " trim(marca) as marca, trim(presentacion) as presentacion,";
			$query .= " trim(precio) as precio FROM dataset where id_categoria=" . $cat. " and";
			$query .= " producto like '%" . $product ."%' and marca like '%" . $brand ."%';";
		}
		
		$data  = $this->Db->query($query);
		
		____($data);
		return $data;
	}
}
