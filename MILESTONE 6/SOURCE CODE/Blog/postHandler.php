<?php
// Project Name: Food For Thought Blog
// Version: 1.3
// Module: Milestone 4 v1.3
// Programmer Name: Tim James
// Date: March 23, 2019
// Synopsis: This is the members only or logged in state for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.
    
    require_once 'functions.php';
    
    $name = $_POST["name"];
    $title = $_POST["title"];
    $blogStory = $_POST["blogStory"];

    // Database connection
    $conn = dbConnect();

    // When post is pressed by user
    $sql = "INSERT INTO blogpost (AUTHOR_NAME, BLOG_TITLE, BLOG_TEXT)
    VALUES ('$name', '$title', '$blogStory')";
    
    // Check that information is not NULL
    if ($name == NULL) {
        
        echo nl2br("- The Author's Name is a required field and cannot be blank\n\n");
    }
    
    if ($title == NULL) {
        
        echo nl2br("- The Title is a required field and cannot be blank\n\n");
    }
    
    if ($blogStory == NULL) {
        
        echo nl2br("- The Blog Story is a required field and cannot be blank\n\n");
    }
    
    // Check for error
    if (!($name == NULL || $title == NULL || $blogStory == NULL) && $conn->query($sql) === TRUE) {
        
        echo "New record created successfully";
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
       
        
    $conn->close();
?>