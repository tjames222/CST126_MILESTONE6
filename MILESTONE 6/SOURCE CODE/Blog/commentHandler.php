<?php
// Project Name: Food For Thought Blog
// Version: 1.4
// Module: Milestone 5 v1.4
// Programmer Name: Tim James
// Date: March 31, 2019
// Synopsis: This is the members only or logged in state for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.

require_once 'functions.php';

$name = $_POST["name"];
$comment = $_POST["comment"];

// Database connection
$conn = dbConnect();

// When post is pressed by user
$sql = "INSERT INTO comments (NAME, COMMENT)
    VALUES ('$name', '$comment')";

// Check that information is not NULL
if ($name == NULL) {
    
    echo nl2br("- The Name is a required field and cannot be blank\n\n");
}

if ($comment == NULL) {
    
    echo nl2br("- The comment is a required field and cannot be blank\n\n");
}

// Check for error
if (!($name == NULL || $comment == NULL) && $conn->query($sql) === TRUE) {
    
    echo "New record created successfully";
} else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>