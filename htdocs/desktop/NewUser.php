<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
	<script type="text/javascript" src="./javascript/blueFeedsScript.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<header><h1>BlueFeeds Registration</h1></header>
<body id="logincenter">
	<div>
        <div id="UserCreate"> 
			<div style="display: inline-block;">
				<form action="usrCreate.php" method="post">
					<div class="input-control text">
						<label for="usr">Username: </label>
						<input type="text" name="usr" class="with-helper" placeholder="John Smith" maxlength="40"/>
					</div>		
					<div class="input-control password">
						<label for="pass">Password: </label>
						<input type="password" name="pass" class="with-helper" placeholder="Password" maxlength="40"/>
					</div>	
					<div class="input-control password">
						<label for="passc">Confirm Password: </label>
						<input type="password" name="passc" class="with-helper" placeholder="Password" maxlength="40"/>
					</div>						
					<div class="input-control text">
						<label for="email">Email: </label>
						<input type="text" name="usr" class="with-helper" placeholder="jsmith@hotmail.com" maxlength="40"/>
					</div>			
					<div class="input-control text">
						<label for="title">Title: </label>
						<input type="text" name="usr" class="with-helper" placeholder="Doctor" maxlength="40"/>
					</div>	
					<div class="input-control text">
						<label for="specialty">Specialty: </label>
						<input type="text" name="usr" class="with-helper" placeholder="Radiology" maxlength="40"/>
					</div>			
					<div>
						<label for="file">Photo:</label>
						<input type="file" name="file" id="file">				
					<div>
					</br>
					<div id="signinbutton">		
						<label for="submit"></label>
						<input type="submit" value="Register" class="big">
					</div> 					
				</form>				
			</div>				
        </div>
        <a href='./NewUser.php'><button style="bottom: 1.5%; left: 1.5%;" class='big'>New User</button></a>       											
    </div>
</body>
</html>
