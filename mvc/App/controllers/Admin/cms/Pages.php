<?php

namespace App\Controllers\Admin\cms;
use App\Models\Post;
use \Core\View;

class Pages extends \Core\Controller {
    public function indexAction() {
        $Post = post::getAll('cmspages');
        
        if(isset($_POST['addCmsPage'])) {
            header('Location:/mvc/public/Admin/cms/Pages/add');
        }
        View::renderTemplate('cmsPage.html',['posts' => $Post]);
    }

    public function addAction() {
        View::renderTemplate("addcms.html");
        if(isset($_POST['submit']))
            {
                $data = Pages::prepareData();
                $data['createdat'] = date("d-m-Y:h-i-s");
                $result = Post::insertdata("cmspages", $data);
                header("Location:/mvc/public/Admin/cms/Pages");
            }
            else{
                echo "no submit";
        }
    }
    public function edit() {
        $id = $_GET['id'];
        $Post = Post::getValueForDatabase($id, 'cmspages', 'cmsid');
        View::renderTemplate("cmspageEdit.html", ['post' => $Post[0]]);
        if(isset($_POST['update'])) {
            if(Pages::validation() != 0) {
                $data = [];
                $data = Pages::prepareData();
                $data['updateat'] = date('d-m-Y:h:i:s');
                $result = Post::updateData($id, 'cmspages', $data, 'cmsid');
                header("Location:/mvc/public/Admin/cms/Pages");
            } else {
                echo "invalidate format";
            }
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $result = Post::deleteData($id, 'cmspages', 'cmsid');
        header("Location:/mvc/public/Admin/cms/Pages");       
    }

    public function validation()  {
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'pagetitle':
                case 'urlkey':    
                    return preg_match('/^[a-zA-Z]+$/', $value) ? true : false;
                break;
                case 'content':
                    return preg_match('/^[a-zA-Z ]$+/', $value) ? true : false;
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
                case 'pagetitle':
                    $data[$key] = $value;
                break;
                case 'urlkey':
                    $data[$key] = $value;
                break;
                case 'status':
                    $data[$key] = $value;
                break;
                case 'content':
                    $data[$key] = $value;
                break;
            }
        }
        if(Pages::validation() == 0) {
            echo "Invalid Format";
        }
        else {
            return $data;
        }
    }
}

?>