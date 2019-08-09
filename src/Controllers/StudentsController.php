<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\Task;
use AHT\Models\TaskRepository;
class tasksController extends Controller
{
    function index()
    {
        //require(ROOT . 'Models/Task.php');

        $tasks = new TaskRepository;
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $taskRpt= new TaskRepository;
            $task = new Task;
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $task->setCreatedAt(date("Y-m-d H-i-s"));
            $task->setUpdatedAt(date("Y-m-d H-i-s"));
            $taskRpt->add($task);
            header("Location: ". WEBROOT . "tasks/index");
        }

        $this->render("create");
    }


    function edit($id)
    {
        //require(ROOT . 'Models/Task.php');
        $taskRpt = new TaskRepository;
        $d['task'] = $taskRpt->get($id);
        if (isset($_POST["title"]))
        {
            $task = new Task;
            $task->setID($id);
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $task->setCreatedAt($d['task']['created_at']);
            $task->setUpdatedAt(date('Y-m-d H-i-s'));
            $taskRpt->edit($task);
            header("Location: ". WEBROOT . "tasks/index");
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        //require(ROOT . 'Models/Task.php');

        $task = new TaskRepository;
        $task->delete($id);
        header("Location: " . WEBROOT . "tasks/index");
        
    }
}

?>