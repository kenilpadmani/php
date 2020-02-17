<?php

namespace Core;
class View {
    public static function render($view, $args = []) {
        print_r($args);
        extract($args, EXTR_SKIP);
        echo $file = "../App/Views/$view";
        if(is_readable($file)) {
            require $file;
        }
        else {
            throw new \Excption("$file is not found");
        }
    }

    public static function renderTemplate($template, $args = []) {
        
        static $twig = null;
        if($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
        }
        // echo "<pre>";
        // print_r($twig);
        // echo "</pre>";
        echo $twig->render($template, $args);
    }
}


?>