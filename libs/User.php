<?php

class User {
    
    private $id;

    private $email;

    public function __construct(int $id, string $email) {
        $this->id = $id;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }

    public static function generateRandomId(): int {
        return 1;
    }

}
