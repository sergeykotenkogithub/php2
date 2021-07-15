<?php


namespace app\engine;

use app\models\repositories\BasketRepository;
use app\models\repositories\FeedbackRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\RegistrationRepository;
use app\models\repositories\UserRepository;
use app\traits\TSingletone;

/**
 * Class App
 * @property Request $request
 * @property BasketRepository $basketRepository
 * @property FeedbackRepository $feedbackRepository
 * @property OrderRepository $orderRepository
 * @property ProductRepository $productRepository
 * @property RegistrationRepository $registrationRepository
 * @property UserRepository $userRepository
 * @property Session $session
 * @property Db $db
 * @property Cookie $cookie
 */


class App
{
    use TSingletone;

    public $config;
    private $components;

    private $action;
    private $controller;

    public function runController() {

        //................ЧПУ.............................

        // 1 - имя контролера(страницы к примеру Каталог), 2 - action, который у нас на 'a' был

        $this->controller = $this->request->getControllerName() ?: 'index'; // request приходит из гетера
        $this->action = $this->request->getActionName();

        //................................................

        $controllerClass = $this->config['controller_namespace'] . ucfirst($this->controller) . "Controller";

        //..................Роутер.........................

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render()); // - свой рендер
            // $controller = new $controllerClass(new TwigRender()) ; // - twig render
            $controller->runAction($this->action);
        } else {
            echo "404";
        }

        //..................................................
    }

    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    public function createComponents($name) {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if(class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params); // из массива в параметры
            } else {
                die('Нет такого класса');
            }

        }
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }
}