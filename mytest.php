<?php
declare(strict_types=1);

require_once "bootstrap.php";

$sql   = "SELECT * FROM `users`";

$conn = (new Db())->getConnection();

$selectStatement = $conn->prepare($sql);

$users = [];

$selectStatement->execute([]);
foreach ($selectStatement->fetchAll() as $row) {
    $users[] = User::fromAssoc($row);
}

var_dump($users);