<?php
// Project Name: Food For Thought Blog
// Version: 1.4
// Module: Milestone 5 v1.4
// Programmer Name: Tim James
// Date: March 31, 2019
// Synopsis: This is the members only or logged in state for the blog that will be about Food
// in the local area. CSS will be used for styling, HTML for layout, and PHP
// for database management.

    session_start();
    
    require_once 'functions.php';

?>
<html>
<head>

	<title>Write a Story</title>
</head>

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
      width: 20%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 0px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      width: 40%;
      font-family: Arial, Helvetica, sans-serif;
      background-color: #4CAF50;
      color: white;
      padding: 14px 140px;
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
    
      a.button2 {
      width: 100%;
      font-family: Arial, Helvetica, sans-serif;
      background-color: #262626;
      color: white;
      padding: 14px 140px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    a.button2:hover {
      background-color: #737373;
    }
    
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .fa {
      font-size: 50px;
      cursor: pointer;
      user-select: none;
    }
    
    .fa:hover {
      color: #4CAF50;
    }
</style>

<body background="bg2.jpg">
	
	<div>
		<h1 class="sansserif center small">FOOD FOR THOUGHT BLOG</h1>
		<p class="sansserif center small">Read the <b>Food For Thought</b> community content!<p>

    	<?php 
        	// Check the session variable for user info
        	if (isset($_SESSION['valid_user'])) {
        	    
        	    echo '<p>Welcome '.$_SESSION['valid_user'].'</p>';
        	}
        	else {
        	    
        	    echo '<p>You are not logged in. Please log in.</p>';
                echo '<p>You cannot access this content unless you are logged in.</p>';
        	}
    	?>
	
		<a class="button" href="homePage.php">Back to Home Page</a><br><br>
	</div>
	
	<?php 
	
	    $conn = dbConnect();
	    
    	$select = "SELECT AUTHOR_NAME, BLOG_TITLE, BLOG_TEXT FROM blogpost";
    	$captured = $conn->query($select);
    	
    	if ($captured->num_rows > 0) {
    	    
    	    // Print data from rows
    	    while($row = $captured->fetch_assoc()) {
    	        echo "<br><div><h2>" . $row["BLOG_TITLE"]. "</h2><em>Author: " . $row["AUTHOR_NAME"]. "</em><br<br><p> " . $row["BLOG_TEXT"]. "</p>
                        <form>
                            <p align='right'><i onclick='myFunction(this)' class='fa fa-thumbs-up'></i>
                            <label for='name'>Like</label>
                            <input type='text' name='like' id='number' value='0'/></p>
                        </form>
                        <hr>
                        <form method='post'>
                            Name:<br><input type='text' name='name'><br><br>
                            Comment:<br><textarea name='comment' cols='70' rows='10' placeholder='Have something to say?'></textarea><br><br>
                            <input type='submit' formaction='commentHandler.php' name='post' value='Leave Comment'>
                        </form>
                        <a class='button2' href='comments.php'>Read Comments</a></p><br><br></div>";
    	    }
    	} else {
    	    
    	    echo "0 results";
    	}
    	
    	$conn->close();	
    	
	?>
	<script>
    	function myFunction(x) {

    	    var value = parseInt(document.getElementById('number').value, 10);
    	    value = isNaN(value) ? 0 : value;
    	    ++value;
    	    document.getElementById('number').value = value;
    	}
    	</script>;
	
</body>
</html>