<?php

namespace App\Controllers;
use App\Models\Post;
use \Core\View;

class category extends \Core\Controller {
    public function viewAction() {
        
        $parentCategoryData = Post::getProductsData('categories');
        $categoryData = Post::categoryDataFormCategory('categories');
        View::renderTemplate('homepage.html',['posts' => $parentCategoryData,
                'categorydata' => $categoryData]);
        $post = Post::getAll('categories');
        if(isset($_GET['id'])) {
            $id = $_GET['id'];        
            View::renderTemplate('showcategory.html',['showcategoryData' => $post,'id' => $id]);
        }
    }
}

?>