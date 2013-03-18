<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Api_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		
		$this->helpers();
	
		$this->table = "profeco";
	}
	
	public function getCities() {
		$data = $this->Db->query("select id_city as id, name from cities");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
	
	public function getCategories() {
		$data = $this->Db->query("select id, name from categories where status=true");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
	
	public function getSubCategories($id_city, $id_category) {
		$query = "select distinct(id_subcategory), name from profeco join subcategories on profeco.id_subcategory=subcategories.id where id_city=".$id_city." and profeco.id_category=".$id_category." order by id_subcategory desc";
		$data  = $this->Db->query($query);
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
	
	public function getBrands($id_city, $id_subcategory) {
		$query = "select id, name from brands where id IN (select id_brand from profeco where id_city=".$id_city." and id_subcategory=".$id_subcategory.") order by name desc";
		$data  = $this->Db->query($query);
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
	
	public function getProducts($id_city, $id_category, $id_subcategory, $id_brand, $offset = 0) {
		if($brand==0){
			$query   =  "from profeco where id_city=".$id_city." and id_category=".$id_category." and ";
			$query  .= "id_subcategory=".$id_subcategory;
		} else {
			$query   =  "from profeco where id_city=".$id_city." and id_category=".$id_category." and ";
			$query  .= "id_subcategory=".$id_subcategory." and id_brand=".$id_brand;
		}
		
		if($offset==0) {
			$results = $this->Db->query("select product,id, price,establishment ". $query . " order by price asc limit 20");
		} else {
			$results = $this->Db->query("select product,id, price,establishment ". $query . " order by price asc limit 20 offset " . $offset);
		} 
		
		$count   	   = $this->getCountProducts("select count(*) " . $query);
		$data 		   = $this->getProductArray($results);
		$data["count"] = $count;
		
		if((count($results) + $offset) < $count) {
			$data["more"] = TRUE;
		} else {
			$data["more"] = FALSE;
		}
		
		return $data;
	}
	
	public function getCountProducts($query) {
		$data = $this->Db->query($query);
		
		return $data[0]["count"];
	}
	
	public function query($text) {
		$data = $this->Db->query("select distinct(id), name from brands where id IN (select id_brand from profeco where id_city=".$id_city." and id_subcategory=".$id_subcategory.") order by name desc");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
	
	function getProductArray($products) {
		foreach($products as $key => $product) {
			$data[$key]["product"] = $this->getArray($product["product"], 0);
			$data[$key]["brand"] = $this->getArray($product["product"], 1);
			$data[$key]["presentation"] = $this->getArray($product["product"], 2);
			$data[$key]["price"] = $product["price"];
			$data[$key]["establishment"] = $product["establishment"];
			$data[$key]["id"] = $product["id"];
		}
		
		return $data;
	}
	
	function getArray($text, $pos = NULL) {
		$text = ltrim($text, "{");
		$text = rtrim($text, "}");
		$data = explode(",", $text);

		if($pos !== NULL) {
			$text = ltrim($data[$pos], '"');
			$text = rtrim($text, '"');
			
			return utf8_decode($text);
		} else {
			return utf8_decode($data);
		}
	}
}
