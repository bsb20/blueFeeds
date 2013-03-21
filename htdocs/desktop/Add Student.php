<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>Add Student</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">
					<?php 
						echo $_SESSION['profile'];					
					?>					
				</div>
        </div>
        <div class="AddStudentPage">
			<div style="float: left;">
				<h2>Student Information</h2>
				<form action="studentCreate.php" method="post" style="float: left;">
					<div class="input-control text">
						<label for="first">First Name: </label>
						<input type="text" name="first" placeholder="John"/>
					</div>		
					<div class="input-control text">
						<label for="last">Last Name: </label>
						<input type="text" name="last" placeholder="Smith"/>
					</div>					
					<div class="input-control text">
						<label for="email">Email: </label>
						<input type="text" name="email" placeholder="(i.e. 3/1/13)"/>
					</div>
					<div class="input-control text">
						<label for="title">Title: </label>					
						<input type="text" name="title" placeholder="(i.e. Nurse)"/>
					</div>		
					<div class="input-control text">
						<label for="study">Area of Study: </label>					
						<input type="text" name="study" placeholder="(i.e. Undecided)"/>
					</div>	
					<div style="padding-top: 3%" class="input">		
						<label for="submit"></label>
						<input type="submit" class="big" value="Add Student">	
					</div> 						
				</form>
			
			</div>	
			<div style="float: left; padding-left: 3%;" class="input-control textarea">
				<h2>Photo</h2>							
				<form data-ajax="false" enctype="multipart/form-data" method="post" action="photo.php">
					<div class="input-control file">	
						Choose a photo:
						<input type="file" name="photo" id="photo" accept="image/*;capture=camera" style="display:none">
						<input id="submitPhoto" class="big" type="submit" value="Upload Photo">
					</div>
				</form>										
			</div>
        </div>
        <div class="MenuPage">
			<ul id="MenuOptions" style="padding-top: 5%">
            	<li><a href="./Landing Page.php"><button class="big" id="MenuButtons">Home<i class="icon-home icon-small"></i></button></a></li>			
            	<li><a href="./Appointments.php"><button class="big" id="MenuButtons">Appointments<i class="icon-clipboard-2 icon-small"></i></button></a></li>
                <li><a href="./StudentSelection.php"><button class="big" id="MenuButtons">Students<i class="icon-user-2 icon-small"></i></button></a></li>
                <li><a href="./RSS Feeds.php"><button class="big" id="MenuButtons">RSS Feeds<i class="icon-feed icon-small"></i></button></a></li>
                <li><a href="./Add Appointment.php"><button class="big" id="MenuButtons">Schedule Appointment<i class="icon-clipboard icon-small"></i></button></a></li>
                <li><a href="./Add Student.php"><button class="big" id="MenuButtons">Add New Students<i class="icon-plus-2 icon-small"></i></button></a></li>               
            </ul>                   
        </div>
    </div>​
</body>
</html>

