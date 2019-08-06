<?php
namespace AHT;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
        //gọi đến hàm với tên là $this->request->action cảu đối tượng $controller với tham số là $this->request->params
    }

    public function loadController()
    {
        $name = "AHT\\Controllers\\".ucfirst($this->request->controller) . "Controller";
        //$file = ROOT . 'Controllers/' . $name . '.php';
        //require($file);
        $controller = new $name();
        return $controller;
    }

}
?>