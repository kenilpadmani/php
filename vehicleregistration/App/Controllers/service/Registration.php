<?php
namespace App\Controllers\service;

use \Core\View;
use \App\Models\Post;
class Registration extends \Core\Controller {
    public function indexAction() {
        $getServiceData = Post::getAll('serviceregistration');
        View::renderTemplate('serviceregistration.html',['posts' => $getServiceData]);
    }

    public function addAction() {
        //print_r($slot = [9-10 , 10-11,11-12,12-1,1-2,2-3,3-4,4-5,5-6]);
        View::renderTemplate('addserviceregistration.html');
        if(isset($_POST['submit'])) {
            $serviceData = Registration::prepareDataForVehicleRegistration();
            $serviceData['createdat'] = date("d-m-Y:h-i-s");
            //$serviceData['userid'] = $_SESSION['sessionuserid'];
            $result = Post::insertData('serviceregistration', $serviceData);
            header('Location:/vehicleregistration/public/service/Registration');
            
        }
    }

    // public function checkAlredyExits() {
    //     $post = Post::getAll('serviceregistration');
    //     $flag = 0;
    //     while($post)
    //     {
    //         echo "asdf";
    //         if(($post['vehiclenumber'] == $_POST['vehiclenumber'] )
    //                     || ($post['licensenumber'] == $_POST['licensenumber'])) {
    //                         $flag = 1;
    //         }
    //     }
    //     return $flag;
    // }

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