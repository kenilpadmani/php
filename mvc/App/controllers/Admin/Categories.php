<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Post;
class Categories extends \Core\Controller {
    public function indexAction() {
        $Post = Post::getAll('categories');
        if(isset($_POST['addCategory'])) {
            header('Location:/mvc/public/Admin/Categories/add');
        }
        View::renderTemplate('category.html',['posts' => $Post]);
    }
    public function addAction() {
        $post = Post::getProductsData('categories');
        View::renderTemplate("addcategory.html", ['post' => $post]);
        if(isset($_POST['submit']))
            {
                $data = [];
                $data = Categories::prepareData();
                $data['parentcategoryid'] = $_POST['parentCategory'];
                $data['image'] = Categories::fileuploading('file/');
                $data['createdat'] = date("d-m-Y:h-i-s");
                echo $result = Post::insertdata("categories", $data);
                header("Location:/mvc/public/Admin/Categories");
            }
            else{
                echo "no submit";
        }
    }
    public function editAction() {
        $id = $_GET['id'];
        $post = Post::getProductsData('categories');
        $Post = Post::getValueForDatabase($id, 'categories', 'categoryid');
        View::renderTemplate("categoryEdit.html", ['post' => $Post[0], 'posts' => $post]);
        if(isset($_POST['update'])) {
            if(Categories::validation() != 0) {
                $data = [];
                $data = Categories::prepareData();
                $data['image'] = Categories::fileuploading('file/');
                $data['updatedat'] = date('d-m-Y:h:i:s');
                $result = Post::updateData($id, 'categories', $data, 'categoryid');
                header("Location:/mvc/public/Admin/Categories");
            } else {
                echo "invalidate format";
            }
        }
    }

    public function deleteAction() {
        $id = $_GET['id'];
        $result = Post::deleteData($id, 'categories', 'categoryid');
        header("Location:/mvc/public/Admin/Categories");       
    }

    public function validation()  {
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'categoryName':
                case 'urlkey':    
                    return preg_match('/^[a-zA-Z]+$/', $value) ? true : false;
                break;
                case 'description':
                    return preg_match('/^[a-zA-Z0-9 ]$+/', $value) ? true : false;
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
                case 'categoryName':
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
            }
        }
        if(Categories::validation() == 0) {
            echo "Invalid Format";
        }
        else {
            return $data;
        }
    }
    
    
    public function fileuploading($folderName) {
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