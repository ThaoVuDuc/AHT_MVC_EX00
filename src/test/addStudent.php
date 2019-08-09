<?php
require_once "./bootstrap.php";

$student = new Student();
$student->setName("vu duc thao");
$student->setAge(22);

$entityManager->persist($student);
$entityManager->flush();