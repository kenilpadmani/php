<?php
namespace App\Controllers;
use \Core\View;
class login extends \Core\Controller {
    public function indexAction() {
        View::renderTemplate('login.html');
        if(isset($_POST['login'])) {
            header('Location:/vehicleregistration/public/registration');
        }
        if(isset($_POST['register'])) {
            header('Location:/vehicleregistration/public/registration');
        }
    }
}

?>