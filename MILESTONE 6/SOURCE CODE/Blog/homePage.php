<?php
// Project Name: Food For Thought Blog
// Version: 1.4
// Module: Milestone 5 v1.4
// Programmer Name: Tim James
// Date: March 31, 2019
// Synopsis: This is the landing or home page for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.

    require_once 'functions.php';

    session_start();

    if (isset($_POST['userid']) && isset($_POST['password'])) {
        
        // User tried to login already
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        
        $db_conn = dbConnect();
        
        $query = "SELECT ID FROM users WHERE USERNAME='$userid' AND PASSWORD='$password'";
        $result = $db_conn->query($query);
        
        if ($result->num_rows) {
            
            // User id valid
            $_SESSION['valid_user'] = $userid;
        }
        $db_conn->close();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style type="text/css">
        fieldset {
            width: 50%;
            border: 2px solid #000000;
        }
        
        legend {
            font-weight: bold;
            font-size: 123%;
        }
        
        label {
            width: 125px;
            float: left;
            text-align: left;
            font-weight: bold;
        }
        
        input {
            border: 1px solid #000;
            padding: 3px;
        }
        
        button {
            margin-top: 12px;
        }
        
        </style>
        
        <style type="text/css">
        
        a {
        text-decoration: none
        }
    </style>
    
    <style>
        <!-- Setting alternate styles for fonts-->
        p.serif {
          font-family: "Times New Roman", Times, serif;
        }
        
        p.sansserif {
          font-family: Arial, Helvetica, sans-serif;
        }
        
        p.normal {
          font-weight: normal;
        }
        
        p.thick {
          font-weight: bold;
        }
        
        p.center {
          text-align: center;
        }
        
        p.small {
          line-height: 0.8;
        }
        
        p.big {
          line-height: 1.8;
        }
        
        h1.center {
          text-align: center;
        }
        
        h1.serif {
          font-family: "Times New Roman", Times, serif;
        }
        
        h1.sansserif {
          font-family: Arial, Helvetica, sans-serif;
        }
        
        h1.small {
          line-height: 0.8;
        }
        
        h1.big {
          line-height: 1.8;
        }
        
        <!-- Setting style for input types and div-->
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        button[type=submit] {
          width: 50%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        button[type=submit]:hover {
          background-color: #45a049;
        }
        
        button[type=button] {
          width: 50%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        button[type=button]:hover {
          background-color: #45a049;
        }
        
        a.button {
          width: 100%;
          font-family: Arial, Helvetica, sans-serif;
          background-color: #4CAF50;
          color: white;
          padding: 14px 140px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        a.button:hover {
          background-color: #45a049;
        }
        
        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
    
    </style>
</head>
<body background="bg2.jpg">
	
	<div>
		<p align="right"><a href="adminLogin.php">Admin Login</a></p>
    	<h1 class="sansserif center small">LOGIN TO YOUR FOOD FOR THOUGHT ACCOUNT</h1>
    	<p class="sansserif center small">Welcome back to the <b>Food For Thought</b> community!<p>
    
    	<fieldset>
        	<legend>Dont have an account?</legend><br><br>
        	<a class="button" href="register.html">Register Now</a><br><br>
    	</fieldset><br><br>
    	</div>
    	
    	<br><br><br>
	
	<div>
    	<?php 
        	if (isset($_SESSION['valid_user'])) {
        	    
        	    echo '<p>Logged in as:<strong> '.$_SESSION['valid_user'].'</strong> <br /></p>';
        	    echo '<br><a class="button" href="logout.php">Log out</a><br><br>';
        	    echo '<br><a class="button" href="members_only.php">Write a Blog Post</a><br><br>';
        	    echo '<br><a class="button" href="readPosts.php">Read Blog Posts</a><br><br><br>';
        	}
        	else {
        	    
        	    if (isset($userid)) {
        	        
        	        // Login failed
        	        echo '<p>Login failed.</p>';
        	    }
        	    else {
        	        
        	        // Not logged in yet or logged out recently
        	        echo '<p>Please log in.</p>';
        	    }
        	    
        	    // Login form
        	    echo '<form action="homePage.php" method="post">';
        	    echo '<fieldset>';
        	    echo '<legend>Login to existing account:</legend>';
        	    echo '<p><label for="userid">UserID:</label>';
        	    echo '<input type="text" name="userid" id="userid" size="30"/></p>';
        	    echo '<p><label for="password">Password:</label>';
        	    echo '<input type="password" name="password" id="password" size="30"/></p>';
        	    echo '<button type="submit" name="login">Login</button>';
        	    echo '</fieldset>';
        	    echo '</form>';
        	}
    	
    	?>
	
	</div>

</body>
</html>