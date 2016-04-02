
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
          <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  

 
 .inputs {
    height: 30px;
    border: 3px solid #EBE6E2;
    border-radius: 5px;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
    width: 270px;
}

.inputs:focus {
    border-color: #BBB;
    outline: none;
}

  
  </style>
        
    <title>Stuff Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="styling.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
    <?php 
		$name = $email = $password = $country ="";
		$nameErr = $emailErr = $passErr = $countryErr =  "";
		$lid = $lpassword= "";
		$lidErr= $lpassErr = "";
		$loginCheck="";
		//Variables for database.
		$servername = "sql6.freemysqlhosting.net";
		$username = "sql6113044";
		$dbpassword = "W7VQ9IN8dB";
		$dbname ="sql6113044";
		$forSignUp = "Sign Up";
		$forLogIn = "LogIn";
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
			{
			if($forSignUp == $_POST["submit"])
			{
				if(empty($_POST["name"])){
					$nameErr = "Kindly Enter Name Properly";
				}
				else{				
					$name = test_input($_POST["name"]);
					 if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
					 {
					   $nameErr = "Only letters and white space allowed"; 
					 }
				}
				
				if(empty($_POST["email"])){
					$emailErr = "Kindly Enter email Properly";
				}
				else{				
					$email = test_input($_POST["email"]);
				 if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				 {
						$emailErr = "Invalid email format"; 
				 }
				}
				
				if(empty($_POST["password"])){
					$passErr = "password length should be 8-13 characters";
				}
				else{				
					$password = test_input($_POST["password"]);
				}
				
				if(empty($_POST["country"])){
					$countryErr = "Mention the Country";
				}
				else{				
					$country = test_input($_POST["country"]);
				}
				
				if(preg_match("/^[a-zA-Z ]*$/",$name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST["password"]) && !empty($_POST["country"]) )
				{
					$conn = new mysqli($servername, $username, $dbpassword, $dbname);
					if ($conn ->connect_error) 
					{
					die("Database connection failed: " . $conn->connect_error);
					}

					$sql  = "INSERT INTO PracticeTable(username,userpassword, useremail,usercountry)
							VALUES ('$name', '$password', '$email', '$country')";
					if(mysqli_query($conn,$sql))
					{
						echo "record added";
					}
					else
					{
						//echo "error".$sql. "<br>". mysql_error($conn);
					}
					mysqli_close($conn);
		
						
					}
			
			}
			
			if($forLogIn == $_POST["submit"])
			{
				if(empty($_POST["myid"])){
					$lid = "Kindly Enter email Properly";
				}
				else{				
					$lid = test_input($_POST["myid"]);
				 if (!filter_var($lid, FILTER_VALIDATE_EMAIL))
				 {
						$lidErr = "Invalid email format"; 
				 }
				}
				
				if(empty($_POST["myPassword"])){
					 $lpassErr = "password length should be 8-13 characters";
				}
				else{				
					$lpassword = test_input($_POST["myPassword"]);
				}
				$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
					if ($conn ->connect_error) 
					{
					die("Database connection failed: " . $conn->connect_error);
					}
					
				   $sql= "SELECT * from PracticeTable WHERE useremail='$lid'";
					if($result = mysqli_query($conn,$sql))
					{
					$numrows = mysqli_num_rows($result);
						if($numrows !=0)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								$dbusername = $row['useremail']; 
								$dbpassword = $row['userpassword'];
							}
							
							// verifiying pasword and email
							if($lid == $dbusername && $lpassword == $dbpassword)
							{
								echo"password correct";
								header('Location:home.php');
							}
							else	
							{
								echo "Incorect Password";
							}
						}
						else
						{
							die("User Doesn't Exist");
						}
					mysqli_free_result($result);
					}
			}
		}
		function test_input($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		?>

	
	
	
	
	
        <div class="container-fluid">
            <div class="row">
                <div id="header" class="col-sm-4">
                    <img id="logo-id" src="Images/logo.jpg"  style="width:100px; height:80px;">  
                </div>
                
                
                <div  id="header" class="col-sm-8">
                    <h1 id="header_font" style="padding-bottom: 24px;"><b>Stuff Store</b></h1>  
                </div>
            </div>
 
            <div class="row">
                
				<div id="mainNav">
					<nav class="navbar navbar-inverse">
					  <div class="container-fluid">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<input type="button" class="button" value="="  background-color="black">
							</button>
							<a class="navbar-brand" href="#">Stuff Store</a>
						</div>
						
						<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="nav navbar-nav"> 
									<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Home <span class="caret"></span></a>
											<ul class="dropdown-menu" class="submenu">									
											  <li><a href="#">Booking</a></li>
											  <li><a href="#">Services</a></li>
											  <li><a href="#">Gallery</a></li>
											  <li><a href="#">Booking</a></li>
											  <li><a href="#">Services</a></li>
											  <li><a href="#">Gallery</a></li>
											</ul>
									 </li>

										
									  
									  <li><a href="#">About</a>
									   
										</li>       
									  <li><a href="#">Contact Us</a></li>
								</ul>
									
								</ul>
							  
							  <ul class="nav navbar-nav navbar-right">
								<li>  
									<a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Log-in</a>		
								</li>
								</ul>
						
						</div>
					  </div>
					</nav>   
				</div>
          
            </div>
            
     
            
        <div  class="row"> 
			<div class="col-sm-4"></div>
			
			
            <div id="desc" class="col-sm-4">
                <p> 
                    With multiple options, Stuff Store empower you to have access, power to modify and get the most out of your requirements.
					Relax and experience what we have gathered for you.
					</p>
                    Do more with less burden cause we will remember all your stuff to keep you relax and make your mind more capable to do best. 
            </div>
            
			
			
            <div id="myForm" class="col-sm-4">
               <form name='registration' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">  

						<fieldset>
							<legend id="mylegend"><b>Get Registered</b></legend>
							<ul>
								<li><input id="x" type="date" class="inputs" /></li>   
								<li><input id="x" type="text"  class="inputs " name="name" value="<?php echo $name; ?>" placeholder="User Name" /> </li>
								<li><span  id="x" class="error"> <?php echo $nameErr; ?> </span></li>
								<li><input id="x" type="email" class="inputs" name="email" value="<?php echo $email; ?>" placeholder="Email" /> </li>
								<li><span id="x" class="error"> <?php echo $emailErr; ?> </span></li>
								<li><input id="x" type="password" class="inputs" name="password" value="<?php echo $password; ?>" placeholder="Password" /> </li>
								<li><span id="x" class="error"> <?php echo $passErr; ?> </span></li>
								<li><input id="x" type="text" class="inputs" name="country" value="<?php echo $country; ?>" placeholder="Country" />  </li>
								<li><input id="x" type="submit" class="inputs" name="submit"  value="Sign Up"/> </li>
							</ul>    
						</fieldset>
				</form>  
            </div>
	
                
        </div> 
     
        <div class="modal fade" id="myModal">
				<div class="modal-dialog">
				  <div class="modal-content">
				  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					  <h4 class="modal-title">Log-in</h4>
					</div>
					<div class="modal-body">
					  <div class="form-group">
							<label for="InputEmail1">Email address</label>
							<input class="form-control" id="exampleInputEmail" name="myid" placeholder="Enter email" value="<?php echo $lid; ?>" type="email">
							<span class="error"> <?php echo $lidErr ; ?> </span>
					  </div>
					  <div class="form-group">
						<label for="InputPassword1">Password</label>
							<input class="form-control" id="InputPassword" name="myPassword" placeholder="Password" type="password">
							<span class="error"> <?php echo $lpassErr;  ?> </span>
					 </div>
				   </div>
					<div class="modal-footer">
					  <a href="#" data-dismiss="modal" class="btn">Close</a>
					  <a href="#" ><input id="x" type="submit" class="inputs" name="submit"  value="LogIn" action="#"/></a>
					</div>
					</div>
				  </div>
		</div>    
         
            
            
     </div>   
    </body>
</html>









  

























