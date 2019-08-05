<?php 
namespace AHT\Core;

use AHT\Core\ResourceModelInterface;
use AHT\Config\Database;
use AHT\Core\Model;

class ResourceModel implements ResourceModelInterface {
	protected $table;
	protected $id;
	protected $model;

	public function _init($table, $id, $model) {
		$this->table = $table;
		$this->id = $id;
		$this->model = new Model;
	}

	public function add($model) {
		$propertiesArr = $this->model->getProperties($model);
		$col = "";
		foreach ($propertiesArr as $key => $value) {
			$col = $col . $key . ",";
		}
		$col = rtrim($col, ",");
		$vals = "";
		foreach ($propertiesArr as $property) { 
			
			$vals = $vals ."'". $property ."'".",";
		}
		$vals = rtrim($vals, ",");
		$sql = "INSERT INTO $this->table ($col) VALUES ($vals)";
		$req = Database::getBdd()->prepare($sql);
		return $req->execute();
	}

	public function edit($model) {
		$propertiesArr = $this->model->getProperties($model);
		$id = $propertiesArr['id'];
		$vals = "";
		foreach ($propertiesArr as $key => $property) {
			$vals = $vals . $key;
			$vals = $vals . "='" . $property . "',";
			
		}
		$vals = rtrim($vals, ",");
		$sql = "UPDATE $this->table SET $vals WHERE id  = $id";
		$req = Database::getBdd()->prepare($sql);
		return $req->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM $this->table WHERE id = $id";
		$req = Database::getBdd()->prepare($sql);
		return $req->execute();
	}

	public function get($id) {
		$sql = "SELECT * FROM $this->table WHERE id = $id";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
		return $req->fetch();
	}

	public function getAll(){
		$sql = "SELECT * FROM $this->table";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
		return $req->fetchAll();
	}
}


?>