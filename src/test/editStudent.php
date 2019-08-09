<?php
//update_product.php <id> <new-name>
require_once "./bootstrap.php";

$id = $argv[1];
$newName = $argv[2];
$newAge = $argv[3];
$student = $entityManager->find('Student', $id);

if($student == null) {
	echo "Student $id does not exist \n";
	exit(1);
}

$student->setName($newName);
$student->setAge($newAge);

$entityManager->flush();