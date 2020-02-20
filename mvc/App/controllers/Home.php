<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Post;
class home extends \Core\Controller {
    public function indexAction() {
        $parentCategoryData = Post::getProductsData('categories');
        $categoryData = Post::categoryDataFormCategory('categories');
        View::renderTemplate('homepage.html',['posts' => $parentCategoryData,
                'categorydata' => $categoryData]);
    }
}

?>