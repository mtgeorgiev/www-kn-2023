<?php

class SessionRequestHandler {

    public function checkLoginStatus(): bool {
        return isset($_SESSION['email']);
    }

    public function login(string $email, string $password): bool {
        // validate user input

        $conn = (new Db())->getConnection();

        $selectStatement = $conn->prepare('SELECT * FROM `users` WHERE email = ?');
        $selectStatement->execute([$email]);

        $user = $selectStatement->fetch();
        if (!$user) {
            return false; // user does not exist
        }

        $loginSuccessful = password_verify($password, $user['password']);

        if ($loginSuccessful) {
            $_SESSION['email'] = $email;
        }

        return $loginSuccessful;
    }

    public function logout() {
        session_destroy();
    }
}
