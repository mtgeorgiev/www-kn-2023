<?php

session_start();

spl_autoload_register(function($className) {

    $foldersWithClasses = ["./libs", "./libs/other"];

    foreach ($foldersWithClasses as $folder) {
        $potentialFileName = "$folder/$className.php";
        if (file_exists($potentialFileName)) {
            require_once $potentialFileName;
            break;
        }
    }

    require_once "./libs/$className.php";
});