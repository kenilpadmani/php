<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Post;

class Products extends \Core\Controller {
    public function indexAction() {
        $Post = Post::getAll('products');
        if(isset($_POST['addProduct'])) {
            header('Location:/mvc/public/Admin/Products/add');
        }
        View::renderTemplate('product.html', ['posts' => $Post]);
    }
    public function addAction() {
        $Post = Post::getCategoriesData('categories');
        View::renderTemplate("addproduct.html", ['post' => $Post]);
        if(isset($_POST['submit'])) {
            $data = [];
            $data = Products::prepareData();
            $data['image'] = Products::fileuploading('product/');
            $data['createat'] = date("d-m-Y:h-i-s");
            $result = Post::insertdata("products", $data);
            $categoryId = $_POST['category'];
            foreach($categoryId as $key => $value) {
                $data = [];
                $data['categoryid'] = $categoryId[$key];
                $data['productid'] = $result;
                $productResult = Post::insertdata('products_categories', $data);
            }
            header("Location:/mvc/public/Admin/Products");
        } else {
            echo "no submit";
        }
    }

    public function editAction() {
        $post = Post::getCategoriesData('categories');
        $id = $_GET['id'];
        $get = Post::getDataBaseFormJoin($id);
        $parentCategory = [];
        foreach($get as $key => $value) {
            array_push($parentCategory,$get[$key]['categoryid']);
        }
        $Post = Post::getValueForDatabase($id, 'products', 'productid');
        View::renderTemplate("productEdit.html", ['post' => $Post[0], 
                        'posts' => $post, 'get' => $parentCategory]);
        
        if(isset($_POST['update'])) {
            if(Products::validation() != 0) {
                $data = [];
                $data = Products::prepareData();
                $data['image'] = Products::fileuploading('product/');
                $data['updateat'] = date('d-m-Y:h-i-s');
                $result = Post::updateData($id, 'products', $data, 'productid');
                Post::deleteData($id, 'products_categories', 'productid');
                $categoryId = $_POST['category'];
                foreach($categoryId as $key => $value) {
                    $data = [];
                    $data['categoryid'] = $categoryId[$key];
                    $data['productid'] = $id;
                    //Post::deleteData($id, 'products_categories', 'productid');
                    $productResult = Post::insertdata('products_categories', $data);
                }
                header("Location:/mvc/public/Admin/Products");
            } else {
                echo "invalidate format";
            }
        }
    }

    public function deleteAction() {
        $id = $_GET['id'];
        $result = Post::deleteData($id, 'products', 'productid');
        header("Location:/mvc/public/Admin/Products");       
    }

    public function validation()  {
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'productName':
                case 'urlkey':    
                    return preg_match('/^[a-zA-Z]+$/', $value) ? true : false;
                break;
                case 'description':
                case 'shortdescription':
                    return preg_match('/^[a-zA-Z0-9 ]+$/', $value) ? true : false;
                break;
                default:
                    return true;
            break;
            }
            
        }
    }

    public function prepareData() {
        $data = [];
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'productName':
                    $data[$key] = $value;
                break;
                case 'sku':
                    $data[$key] = $value;
                break;
                case 'urlkey':
                    $data[$key] = $value;
                break;
                case 'status':
                    $data[$key] = $value;
                break;
                case 'description':
                    $data[$key] = $value;
                break;
                case 'shortdescription':
                    $data[$key] = $value;
                break;
                case 'price':
                    $data[$key] = $value;
                break;
                case 'stock':
                    $data[$key] = $value;
                break;
            }
        }
        if(Products::validation() == 0) {
            echo "Invalid Format";
        }
        else {
            return $data;
        }
    }

    public function fileuploading($folderName) {
        print_r($_FILES);
         $fileName = $_FILES['image']['name'];
         $fileExtension = substr($fileName, strpos($fileName, '.')+1);
         $fileExtensionLower = strtolower($fileExtension);
         $extensionArray = ['jpeg', 'jpg', 'png'];
         $tempName = $_FILES['image']['tmp_name'];
         if (isset($fileName)) {
             if (!empty($fileName)) {
                 if(in_array($fileExtensionLower, $extensionArray)) {
                     $location = "../".$folderName;
                     if (move_uploaded_file($tempName, $location.$fileName)) {
                         return $location.$fileName;
                         echo "upload successfully";
                     }
                 }
             } else {
                 echo "file extension allowed jpeg,jpg,png";
             }
         } else {
             echo "please the fill";
         }
     }
}

?>