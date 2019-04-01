<?php
// Project Name: Milestone 5
// Version: 1.4
// Module: Milestone 5 v1.4
// Programmer Name: Tim James
// Date: March 31, 2019
// Synopsis: Working through the activities step by step.

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
      width: 100%;
      font-family: Arial, Helvetica, sans-serif;
      background-color: #4CAF50;
      color: white;
      padding: 14px 60px;
      margin: 2px 0;
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

<style>
    table, th, td {
      align: left;
      border: 0px solid black;
      border-spacing: 15px;
    }
</style>

<body background="bg2.jpg">
	
	<div>
		<h1 class="sansserif center small">FOOD FOR THOUGHT BLOG</h1>
		<p class="sansserif center small">Read the <b>Food For Thought</b> community content!<p>

    	<?php 
        	// Check the session variable for user info
        	if (isset($_SESSION['admin_user'])) {
        	    
        	    echo '<p>Welcome '.$_SESSION['admin_user'].'</p>';
        	}
        	else {
        	    
        	    echo '<p>You are not logged in. Please log in.</p>';
                echo '<p>You cannot access this content unless you are logged in.</p>';
        	}
    	?>
	
		<a class="button" href="homePage.php">Back to Home Page</a><br><br>
	</div>
	
    <?php 
        // Create connection
        $conn = dbConnect();
        
        if (isset($_POST['update'])) {
            
            $updateQry = "UPDATE users SET ID='$_POST[id]', FIRST_NAME='$_POST[firstName]', LAST_NAME='$_POST[lastName]', 
                            EMAIL='$_POST[email]', DOB='$_POST[dob]', USERNAME='$_POST[user]', PASSWORD='$_POST[pass]' WHERE ID='$_POST[id]'";
            $conn->query($updateQry);
        }
        
        if (isset($_POST['delete'])) {
            
            $delQry = "DELETE FROM users WHERE ID='$_POST[id]'";
            $conn->query($delQry);
        }
    
        
        
        $select = "SELECT ID, FIRST_NAME, LAST_NAME, EMAIL, DOB, USERNAME, PASSWORD FROM users";
        $captured = $conn->query($select);
        
        if ($captured->num_rows > 0) {
            
            // Print data from rows
            while($row = $captured->fetch_assoc()) {
                echo "<br><div><table>
                        <form action='userAdmin.php' method='post'>
                        <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>DOB</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        </tr>
                        <tr>
                        <td><input type=text name=id value=" . $row["ID"]. "></td>
                        <td><input type=text name=firstName value=" . $row["FIRST_NAME"]. "></td>
                        <td><input type=text name=lastName value=" . $row["LAST_NAME"]. "></td>
                        <td><input type=text name=email value=" . $row["EMAIL"]. "></td>
                        <td><input type=text name=dob value=" . $row["DOB"]. "></td>
                        <td><input type=text name=user value=" . $row["USERNAME"]. "></td>
                        <td><input type=text name=pass value=" . $row["PASSWORD"]. "></td>
                        </tr>
                        <tr>
                        <td><input type=submit name=update value=Update align=left></td>
                        <td><input type=submit name=delete value=Delete></td>
                        </form>
                        </table>
                        </div>";
            }
        } else {
            
            echo "0 results";
        }
        
        $conn->close();
    ?>
    
</body>
</html>