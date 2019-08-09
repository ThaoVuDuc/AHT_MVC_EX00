<?php
require_once "./bootstrap.php";

$id = $argv[1];
$student = $entityManager->find('Student', $id);
if($student != null)
{
	$entityManager->remove($student);
	$entityManager->flush();
}
else
{
	die("object 2 n'existe pas");
}