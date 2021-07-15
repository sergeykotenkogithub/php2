<?php

//.................Обёртка над GET и POST запросами...................................

namespace app\engine;


final class Request
{
   protected $requestString;
   protected $controllerName;
   protected $actionName;

   protected $params = []; //GET | POST
   protected $method;

   public function __construct()
   {
    $this->parseRequest();
   }

   protected function parseRequest() {
       $this->requestString = $_SERVER['REQUEST_URI'];
       $this->method = $_SERVER['REQUEST_METHOD'];

       $url = explode('/', $this->requestString);

       $this->controllerName = $url[1];
       $this->actionName = $url[2];

       $this->params = $_REQUEST;

       $data = json_decode(file_get_contents('php://input'));

       if (!is_null($data)) {
           foreach ($data as $key => $value) {
               $this->params[$key] = $value;
           }
       }
   }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getMethod()
    {
        return $this->method;
    }

}