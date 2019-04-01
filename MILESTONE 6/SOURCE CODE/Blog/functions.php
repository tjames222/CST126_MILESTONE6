<?php
// Project Name: Food for Thought Blog
// Version: 1.3
// Module: Milestone 4 v1.3
// Programmer Name: Tim James
// Date: March 23, 2019
// Synopsis: This is the database connection function for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.

function dbConnect() {
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "blog";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

