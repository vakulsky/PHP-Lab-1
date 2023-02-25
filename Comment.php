<?php

namespace App;

use DateTime;

class Comment
{
    private DateTime $created_at;

    public function __construct(
        private User $user,
        private string $message
    ) {
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
