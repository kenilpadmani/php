<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Post;
class registration extends \Core\Controller {
    public function indexAction() {
        View::renderTemplate('register.html');
        if(isset($_POST['submit'])) {
            $data = registration::prepareDataForUser();
            $usertable = Post::insertData('users', $data);
            echo $_SESSION['sessionuserid'] = $usertable;
            $addressData = registration::prepareDataForUserAddress();
            $addressData['userid'] = $_SESSION['sessionuserid'];
            $userAddressTable = Post::insertData('useraddress', $addressData);
            header('Location:/vehicleregistration/public/service/Registration');
        }
    }

    public function prepareDataForUser() {
        $data = [];
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'firstname':
                    $data[$key] = $value;
                break;
                case 'lastname':
                    $data[$key] = $value;
                break;
                case 'email':
                    $data[$key] = $value;
                break;
                case 'password':
                    $data[$key] = $value;
                break;
                case 'phonenumber':
                    $data[$key] = $value;
                break;
                

            }
        }
        return $data;
    }

    public function prepareDataForUserAddress() {
        $data = [];
        foreach($_POST as $key => $value) {
            switch($key) {
                case 'street':
                    $data[$key] = $value;
                break;
                case 'city':
                    $data[$key] = $value;
                break;
                case 'state':
                    $data[$key] = $value;
                break;
                case 'country':
                    $data[$key] = $value;
                break;
                case 'zipcode':
                    $data[$key] = $value;
                break;
            }
        }
        return $data;
    }
}

?>