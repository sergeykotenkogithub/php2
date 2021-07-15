<?php


namespace app\engine;

use app\interfaces\IRenderer;

final class Render implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        ob_start(); // старт буфера
        extract($params); // создаются локальные переменные
        $templatePath = VIEWS_DIR . $template . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
            return ob_get_clean();
        } else {
            throw new \Exception("Шаблона нет такого", 404);
//            die('Шаблона нет такого');
        }
    }
}