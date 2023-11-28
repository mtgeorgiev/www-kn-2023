<?php
declare(strict_types=1);

require_once "bootstrap.php";

$sql   = "SELECT * FROM `users`";

$conn = (new Db())->getConnection();

// $selectStatement = $conn->prepare($sql);

// $users = [];

// $selectStatement->execute([]);
// foreach ($selectStatement->fetchAll() as $row) {
//     $users[] = User::fromAssoc($row);
// }

// var_dump($users);


// $insertStatement = $conn->prepare('INSERT INTO `users` (`email`, `password`) VALUES(:email, :password)');

// $insertStatement->execute([
//     'email' => 'fmi@fmi.uni-sofia.bg',
//     'password' => '0000'
// ]);

// echo $conn->lastInsertId();
