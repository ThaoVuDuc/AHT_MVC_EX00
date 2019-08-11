<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
//use AHT\Models\Task;
use AHT\Models\TaskRepository;
use Student;


class StudentsController extends Controller
{
    function index()
    {
        require_once "../../bootstrap.php";

        $studentRepository = $entityManager->getRepository('Student');
        $students = 
        $d['students'] = $studentRepository->findAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        require_once "../../bootstrap.php";

        if (isset($_POST["name"]))
        {
            $student = new Student;
            $student->setName($_POST["name"]);
            $student->setAge($_POST["age"]);

            $entityManager->persist($student);
            $entityManager->flush();
            //$task->setCreatedAt(date("Y-m-d H-i-s"));
            //$task->setUpdatedAt(date("Y-m-d H-i-s"));
            header("Location: ". WEBROOT . "students/index");
        }

        $this->render("create");
    }


    function edit($id)
    {
        require_once "../../bootstrap.php";

        $student = $entityManager->find('Student', $id);;
        $d["student"] = $student;
        if (isset($_POST["name"]))
        {
            $student->setName($_POST["name"]);
            $student->setAge($_POST["age"]);

            $entityManager->flush();
            header("Location: ". WEBROOT . "students/index");
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require_once "../../bootstrap.php";

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
        header("Location: " . WEBROOT . "students/index");
        
    }
}