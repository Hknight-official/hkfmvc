<?php 
include("./system/init.php");

    $widget = empty($get_['widget']) ? "main" : $get_['widget'];

    switch($widget){
        case "main":
            include("header.php");
            include("main.php");
            include("footer.php");
        break;    
    }