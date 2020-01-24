<?php

$browser = get_browser(null, true);
$browser = strtolower($browser['browser']);
echo $browser;

if($browser != 'Default browser') {
    echo "You use crome";
}

?>