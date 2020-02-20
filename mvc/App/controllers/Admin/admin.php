<?php
namespace App\Controllers\Admin;
use \Core\View;
class admin extends \Core\Controller {
    public function loginAction() {
        View::renderTemplate('login.html');
        if(isset($_POST['login'])) {
            header('Location:/mvc/public/Admin/admin/dashboard');
        }
    }

    public function dashboardAction() {
        View::renderTemplate('dashboard.html');
    }
}


?>
