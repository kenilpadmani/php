<?php

session_start();

$data ="<td>".$_SESSION['storeName']."</td><td>".$_SESSION['storePassword']."</td>";
echo "<table border='1'><tr><th>name</th><th>password</th></tr><tr>$data</tr></table>";




?>