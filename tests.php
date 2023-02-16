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

// Create some Comment objects
$comment1 = new Comment($user1, 'This is the first comment');
$comment2 = new Comment($user2, 'This is the second comment');
$comment3 = new Comment($user3, 'This is the third comment');

// Put the comments in an array
$comments = [$comment1, $comment2, $comment3];

// Set the datetime to filter by
$datetime = new DateTime('2023-02-01');

// Filter the comments based on their creation time
$newerComments = array_filter($comments, function ($comment) use ($datetime) {
    return $comment->getCreatedAt() > $datetime;
});

// Print the filtered comments
foreach ($newerComments as $comment) {
    echo 'User ' . $comment->getUser()->getName() . ' posted a comment on ' . $comment->getCreatedAt()->format('Y-m-d H:i:s') . ': ' . $comment->getMessage() . "\n";
}


