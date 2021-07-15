<?php


namespace app\controllers;

use app\engine\TwigRender;
use app\interfaces\IRenderer;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $render;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }

    public function runAction($action) {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if(method_exists($this, $method)) {
            $this->$method();
        }
        else {
            throw new \Exception("action не существует", 404);
//            die("action не существует");
        }
    }

    public function render($template, $params = []) {

        $session = session_id();
        $countBasket = (new BasketRepository())->countSum('quantity', 'session_id', $session);
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', [
                    'isAuth' => (new UserRepository())->isAuth(),
                    'username' => (new UserRepository())->getName(),
                    'isAdmin' => (new UserRepository())->isAdmin(),
                    "noAuth" => $_SESSION['noAuth'],
                    "myOrders" => $_SESSION['id'],
                    'countBasket' => $countBasket
                ]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    protected function renderTemplate($template, $params = []) {
        return $this->render->renderTemplate($template, $params);
    }


}