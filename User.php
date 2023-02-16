<?php

namespace App;

use InvalidArgumentException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validation;


class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private DateTime $created_at;

    public function __construct($id, $name, $email, $password) {
        $validator = Validation::createValidator();
        $violations = $validator->validate([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], new Assert\Collection(
            [
                'id' => new Assert\Type(['type' => 'numeric']),
                'name' => new Assert\Length(['min' => 3]),
                'email' => new Assert\Email(),
                'password' => new Assert\Length(['min' => 6]),
            ]
        ));
        if (count($violations) > 0) {
            throw new InvalidArgumentException((string) $violations);
        }

        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = new DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}

