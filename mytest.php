<?php
declare(strict_types=1);

require_once "bootstrap.php";

$user = new User(1, "myemail@abv.bg");
echo $user->getId();

echo User::generateRandomId();

$x = 5;
$y = "2k4";

var_dump($user);
