<!DOCTYPE html>

<html>
    <head>
        <title>Home: Stuff Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="styleHome.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head>
    <body>
        
		<div class="container-fluid">
			    <div class="row">
                
				<div id="mainNav">
					<nav class="navbar navbar-inverse  navbar-fixed-top">
					  <div class="container-fluid">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<input type="button" class="button" value="="  background-color="black">
							</button>
							<a class="navbar-brand" href="#">Stuff Store</a>
						</div>
						
						<div class="collapse navbar-collapse" id="myNavbar">
								<ul id="dropdownItems" class="nav navbar-nav"> 
									  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile <span class="caret"></span></a>
											<ul class="dropdown-menu" class="submenu">									
											  <li><a href="#">Notes</a></li>
											  <li><a href="#">Books</a></li>
											  <li><a href="#">Gallery</a></li>

											</ul>
									  </li>
									  <li><a href="#">Notes</a></li>       
									  <li><a href="#">Books</a></li>
									  <li><a href="#">Gallery</a></li>
								</ul>
						  
							 <ul id="settings" class="nav navbar-nav navbar-right">
								<li class="dropdown">  
									<a class="dropdown-toggle" data-toggle="dropdown">Account Settings<span class="glyphicon glyphicon-cog"></span></a>
										<ul class="dropdown-menu" class="submenu">
											<li>
												<form id="setting_form" name='settings' onSubmit="return formValidation();">  
													<fieldset>
															<legend id="mylegend"><b>Settings<span class="glyphicon glyphicon-cog"></b></legend>
															<ul>
																<li><input id="SettingInput" type="date" class="inputs" /></li>   
																<li><input id="SettingInput" type="text"  class="inputs " name="userid" placeholder="User Name" /> </li>
																<li><input id="SettingInput" type="email" class="inputs" name="emailid" placeholder="Email" /> </li>
																<li><input id="SettingInput" type="password" class="inputs" name="passid" placeholder="Password" /> </li>
																<li><input id="SettingInput" type="text" class="inputs" name="country" placeholder="Country" />  </li>
																<li><input id="SettingInput" type="submit" class="inputs" name="Submit" value="Submit" /> </li>
															</ul>    
													</fieldset>
												</form> 
											</li>
										</ul>
								</li>
							</ul>
						
						</div>
					  </div>
					</nav>   
				</div>
          
            </div>
        </div>                    
           
    </body>
</html>
