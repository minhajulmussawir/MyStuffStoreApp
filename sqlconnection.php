<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname ="mydb";
	
	//connection 
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//verify connection
	if ($conn ->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
	}

	
	//create database
/*	$sql = "CREATE DATABASE mydb";
	if($conn->query($sql)==TRUE)
	{
		echo "Database created successfully";
	}
	else {
		echo "Erroe creation". $conn->error;
	}
*/

/*	//table creation 
	$sql = "CREATE TABLE MyGuest(
	id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP)";
    if($conn->query($sql)==TRUE)
	{
		echo "TABLE created successfully";
	}
	else {
		echo "Erroe creation". $conn->error;
	}	
	$conn->close();
*/	

/*
//for count of table rows
				   $sql= "SELECT * from PracticeTable";
					if($result = mysqli_query($conn,$sql))
					{
					$numrows = mysqli_num_rows($result);
					echo $numrows;
					mysqli_free_result($result);
					}
*/
	$sql  = "INSERT INTO MyGuest(firstname, lastname, email)
			VALUES ('Minhaj','Mussawir','mm@m.com')";
	if(mysqli_query($conn,$sql))
	{
		echo "record added";
	}
	else
	{
		echo "error".$sql. "<br>". mysql_error($conn);
	}
	mysqli_close($conn);
	?>
	</body>
</html>
