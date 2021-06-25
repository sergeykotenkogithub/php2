<?php


namespace app\engine;

use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = []) {

       $loader = new \Twig\Loader\FilesystemLoader('../twigviews/');
       $twig = new \Twig\Environment($loader);
       $templatePath = $template . ".twig";

        return $twig->render($templatePath, $params);
    }
}