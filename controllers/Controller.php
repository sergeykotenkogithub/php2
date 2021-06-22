<?php


namespace app\controllers;


abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action) {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if(method_exists($this, $method)) {
            $this->$method();
        }
        else {
            die("action не существует");
        }
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    protected function renderTemplate($template, $params = []) {
        ob_start(); // старт буфера
        extract($params); // создаются локальные переменные
        $templatePath = VIEWS_DIR . $template . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
            return ob_get_clean();
        } else {
            die('Шаблона нет такого');
        }
    }
}