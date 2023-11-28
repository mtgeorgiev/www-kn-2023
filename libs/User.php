<?php
// declare(strict_types=1);

/**
 * Represents a user entity
 */
class User implements JsonSerializable{
    
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

    /**
     * Factory method for constructing a user object instance from an associative array
     */
    public static function fromAssoc(array $arrayData): User {
        return new User($arrayData['id'], $arrayData['email'], $arrayData['registered_on']);
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'registeredOn' => $this->registeredOn,
        ];
    }
}
