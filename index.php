<?php 
include("./system/init.php");

    $widget = empty($get_['widget']) ? "main" : $get_['widget'];

    switch($widget){
        case "main":
            include("./include/header.php");
            include("./include/main.php");
            include("./include/footer.php");
        break;    
    }