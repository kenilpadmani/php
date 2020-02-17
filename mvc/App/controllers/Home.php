<?php

namespace App\controllers;
use \Core\View;
class Home extends \Core\Controller {

    protected function before()  {
        echo "(before)";
    }
    protected function after() {
        echo "(after)";
    }
    public function indexAction() {
        echo "Hello from the index action in Posts controller!";
        // View :: render('Home/index.php', [
        //     'name'  => 'Dave',
        //     'color' => ['red', 'green', 'blue']
        // ]);
        //Post :: getAll();
        View :: renderTemplate('Home/index.html', [
            'name'  => 'Dave',
            'color' => ['red', 'green', 'blue']
        ]);
    }
    
    
}

?>