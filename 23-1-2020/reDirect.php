<?php ob_start(); ?>



<h1>This my page</h1>

<?php
$redirect = true;
$url  = 'httpHost.php';
if ($redirect == true) {
    header('Location:'.$url);
}

ob_end_flush();

?>