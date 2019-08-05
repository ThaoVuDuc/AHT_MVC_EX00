<?php 
namespace AHT\Models;

use AHT\Models\TaskResourceModel;

class TaskRepository {
	public $taskResource;
	public function __construct() {
		$this->taskResource = new TaskResourceModel;
	}
	public function add($model) {
		
		$this->taskResource->add($model);
	}

	public function edit($model) {
		$this->taskResource->edit($model);
	}

	public function delete($id) {
		$this->taskResource->delete($id);
	}

	public function get($id) {
		return $this->taskResource->get($id);
	}

	public function getAll() {
		return $this->taskResource->getAll();
	}
}
?>