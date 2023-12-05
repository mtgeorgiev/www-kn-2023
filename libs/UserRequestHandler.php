<?php

class UserRequestHandler {

    public function getUsers():array {

        $users = [];

        // authorization
        if (!isset($_SESSION['email'])) { // the user is not logged
            return $users;
        }

        $conn = (new Db())->getConnection();

        $selectStatement = $conn->prepare('SELECT id, email, registered_on FROM `users`');
        $selectStatement->execute([]);

        foreach ($selectStatement->fetchAll() as $row) {
            $users[] = User::fromAssoc($row);
        }

        return $users;
    }

    public function register(string $email, string $password): bool {

        // validate email and password

        $conn = (new Db())->getConnection();

        $selectStatement = $conn->prepare('SELECT id FROM `users` WHERE email = ?');
        $selectStatement->execute([$email]);

        if ($selectStatement->fetch()) {
            return false; // user already exists
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertStatement = $conn->prepare('INSERT INTO `users` (`email`, `password`) VALUES(:email, :password)');
        $insertStatement->execute([
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        return true;
    }
}
