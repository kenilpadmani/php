<?php

namespace App\Controllers;
use \App\Models\Post;
use \Core\View;
class admin extends \Core\Controller {
    public function indexAction() {
        $getServiceData = Post::getAll('serviceregistration');
        View::renderTemplate('adminservice.html',['posts' => $getServiceData]);
    }

    public function editAction() {
        $id = $_GET['id'];
        print_r($dataForService = Post::getValueForDatabase($id, 'serviceregistration', 'serviceid'));
        View::renderTemplate('editservice.html',['post' => $dataForService]);
        if(isset($_POST['submit'])) {
            $data = admin::prepareDataForVehicleRegistration();
            $result = Post::updateData($id, 'serviceregistration', $data, 'serviceid');
            header('Location:/vehicleregistration/public/admin');
        }
        
    }

    public function deleteAction() {
        $id = $_GET['id'];
        $result = Post::deleteData($id, 'serviceregistration', 'serviceid');
        header('Location:/vehicleregistration/public/admin');
    }

    public function prepareDataForVehicleRegistration() {
        $data = [];
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'title':
                    $data[$key] = $value;
                break;
                case 'vehiclenumber':
                    $data[$key] = $value;
                break;
                case 'licensenumber':
                    $data[$key] = $value;
                break;
                case 'date':
                    $data[$key] = $value;
                break;
                case 'timeslot':
                    $data[$key] = $value;
                break;
                case 'vehicleissue':
                    $data[$key] = $value;
                break;
                case 'servicecenter':
                    $data[$key] = $value;
                break;
                case 'status':
                    $data[$key] = $value;
                break;
            }
        }
        return $data;
    }
}

?>