<?php
// Project Name: Food For Thought Blog
// Version: 1.3
// Module: Milestone 4 v1.3
// Programmer Name: Tim James
// Date: March 23, 2019
// Synopsis: This is the logout handler for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.


    session_start();

    // testing if they wer logged in
    $old_user = $_SESSION['valid_user'];
    unset($_SESSION['valid_user']);
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>

	<title>Log Out</title>
</head>

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
    
    button[type=button] {
      width: 100%;
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
    
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
</style>

<body background="bg2.jpg">
	
	<div>
    	<h1 class="sansserif center small">YOU HAVE LOGGED OUT OF YOUR FOOD FOR THOUGHT ACCOUNT</h1>
    	<p class="sansserif center small">Come back to the <b>Food For Thought</b> community soon!<p>

    	<?php 
        	if (!empty($old_user)) {
        	    
        	    echo '<p>Log out succesful!</p>';
        	}
        	else {
        	    
        	    // User was never logged in but came to this page
        	    echo '<p>You were never logged in. Please login.</p>';
        	}
    	?>
	
		<p><a href="homePage.php">Back to Home Page</a>
	</div>
</body>
</html>