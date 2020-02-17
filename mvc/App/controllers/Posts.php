<?php
namespace App\controllers;
use \Core\View;
use \App\Models\Post;
class Posts extends \Core\Controller {
    public function indexAction() {
        $posts = Post::getAll();
        // print_r($posts);
        View :: renderTemplate('Posts/index.html',['posts' => $posts]);
    }

    public function addNewAction() {
        echo "Hello from the addNew action in Posts controller!";
    }

    public function editAction() {
        echo "Hello from the index action in Posts controller!";
        echo "<p>Route Parameter:<pre>".
            htmlspecialchars(print_r($this->route_params, true)) . "</pre></p>";
    }
}

?>