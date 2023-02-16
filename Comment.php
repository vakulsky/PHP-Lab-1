<?php

namespace App;

use DateTime;

class Comment {
    private User $user;
    private string $message;
    private DateTime $created_at;

    public function __construct(User $user, $message) {
        $this->user = $user;
        $this->message = $message;
        $this->created_at = new DateTime();
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}
