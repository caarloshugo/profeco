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
	
		$this->table = "profeco";
	}
	
	public function getCities() {
		$data = $this->Db->query("select distinct estado, nestado from profeco order by estado asc");
		
		foreach($data as $key=> $value) {
			$data[$key]["nestado"] = utf8_decode($value["nestado"]);
		}
		
		return $data;
	}
	
	public function getCategories() {
		$data = $this->Db->query("select * from catalogo");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
}
