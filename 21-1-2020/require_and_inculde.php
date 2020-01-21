<?php

echo "Include example";
include 'header1.php';
include 'header1.php';
include 'header1.php';
include_once 'header1.php';

echo "Hello<br>";

?>

<?php

echo "<br>Require example";
require 'header1.php';
require 'header1.php';
require 'header1.php';
require_once 'header1.php';

echo "Hello";

?>