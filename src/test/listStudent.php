<?php 
//list_products.php
require_once "bootstrap.php";

$studentRepository = $entityManager->getRepository('Student');
$students = $studentRepository->findAll();

foreach ($students as $student) {
	echo sprintf("-%s\n", $student->getName());
}