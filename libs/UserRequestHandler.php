<?php

class UserRequestHandler {

    public function getUsers():array {

        $users = [];

        $conn = (new Db())->getConnection();

        $selectStatement = $conn->prepare('SELECT id, email, registered_on FROM `users`');
        $selectStatement->execute([]);

        foreach ($selectStatement->fetchAll() as $row) {
            $users[] = User::fromAssoc($row);
        }

        return $users;
    }
}
