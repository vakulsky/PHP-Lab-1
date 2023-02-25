<?php

require_once('vendor/autoload.php');

use App\User;
use App\Comment;

// Create some User objects
$user1 = new User(1, 'John', 'john@example.com', 'password');
$user2 = new User(2, 'Alice', 'alice@example.com', 'password');
$user3 = new User(3, 'Bob', 'bob@example.com', 'password');

// Try to create a User with invalid data (should throw an exception)
try {
    $invalidUser = new User(4, '', 'invalidemail', 'short');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . "\n";
}

// Put the comments in an array
$comments = [
    new Comment($user1, 'This is the first comment'),
    new Comment($user2, 'This is the second comment'),
    new Comment($user3, 'This is the third comment')
];

// Set the datetime to filter by
$datetime = new DateTime('2023-02-01');

// Filter the comments based on their user creation time
$newerComments = array_filter($comments, function (Comment $comment) use ($datetime) {
    return $comment->getUser()->getCreatedAt() > $datetime;
});

// Print the filtered comments
foreach ($newerComments as $comment) {
    echo 'User ' . $comment->getUser()->getName() . ' (created at ' . $comment->getUser()->getCreatedAt()
            ->format('Y-m-d H:i:s') . ') posted a comment: ' . $comment->getMessage() . "\n";
}
