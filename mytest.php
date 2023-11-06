<?php
// declare(strict_types=1);

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


$user = new User(1, "myemail@abv.bg");
echo $user->getId();

echo User::generateRandomId();
