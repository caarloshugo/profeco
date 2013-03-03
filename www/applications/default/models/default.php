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
		$data = $this->Db->query("select distinct id_state, state from profeco2 order by id_state asc");
		
		foreach($data as $key=> $value) {
			$data[$key]["state"] = utf8_decode($value["state"]);
		}
		
		return $data;
	}
	
	public function getCategories() {
		$data = $this->Db->query("select id, name from catalog");
		
		foreach($data as $key=> $value) {
			$data[$key]["name"] = utf8_decode($value["name"]);
		}
		
		return $data;
	}
}
