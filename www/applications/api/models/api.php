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
		$data = $this->Db->query("select distinct(id_subcategory), name from profeco join subcategories on profeco.id_subcategory=subcategories.id where id_city=".$id_city." and profeco.id_category=".$id_category." order by id_subcategory desc");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
	
	public function getBrands($id_city, $id_subcategory) {
		$data = $this->Db->query("select id, name from brands where id IN (select id_brand from profeco where id_city=".$id_city." and id_subcategory=".$id_subcategory.") order by name desc");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
}
