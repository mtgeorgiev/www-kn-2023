<?php
// declare(strict_types=1);

class User {
    
    private $id;

    private $email;

    private $registeredOn;

    public function __construct(int $id, string $email, string $registeredOn) {
        $this->id = $id;
        $this->email = $email;
        $this->registeredOn = $registeredOn;
    }

    public function getId(): int {
        return $this->id;
    }

    public static function generateRandomId(): int {
        return 1;
    }

    public static function fromAssoc(array $arrayData): User {
        return new User($arrayData['id'], $arrayData['email'], $arrayData['registered_on']);
    }

}
