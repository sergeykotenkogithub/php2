<?php


namespace app\controllers;

use app\interfaces\IRenderer;
use app\engine\App;

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

        if (method_exists($this, $method)) {
            $this->$method();
        }  else {
            throw new \Exception("action не существует", 404);
        }
    }

    public function render($template, $params = []) {

        $session = App::call()->session->getId();
        $countBasket = App::call()->basketRepository->countSum('quantity', 'session_id', $session);
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderTemplate($template, $params),
                'menu' => $this->renderTemplate('menu',
                [
                    'isAuth' => App::call()->userRepository->isAuth(),
                    'username' => App::call()->userRepository->getName(),
                    'isAdmin' => App::call()->userRepository->isAdmin(),
                    "noAuth" => App::call()->session->get('noAuth'),
                    "myOrders" => App::call()->session->get('id'),
                    'countBasket' => $countBasket
                ])
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    //................Рендер шаблона............................

    protected function renderTemplate($template, $params = []) {
        return $this->render->renderTemplate($template, $params);
    }

}