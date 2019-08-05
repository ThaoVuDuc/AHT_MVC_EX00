<?php 
namespace AHT\Core;

interface ResourceModelInterface {
	public function _init($table, $id, $model);
	public function add($model);
	public function edit($model);
	public function delete($model);
	public function get($id);
	public function getAll();
}
?>
