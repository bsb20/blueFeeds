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
<header>
	<div>
		<h1 style="display: inline-block">
			Add Student
		</h1>		
		<div style="display: inline-block; padding: 1.5%; float: right; height: 65px; width: 50%; overflow-y: scroll; overflow-x: hidden;">
			<?php
				echo $_SESSION['buttons'];
			?>
		</div>
	</div>
</header>
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
			<div style="float: left; width: 30%;">
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
			<div style="float: left; padding-left: 3%; width: 30%;" class="input-control textarea">
				<h2>Course Information Form</h2>
				<form action="courseCreate.php" method="post" style="float: left;">
					<div class="input-control text">
						<label for="title">Title: </label>
						<input type="text" name="title" placeholder="Course Name"/>
					</div>
					<div class="input-control text">
						<label for="info">Info: </label>
						<input type="text" name="info" placeholder="Description"/>
					</div>
					<div class="input-control text">
						<label for="students">Students: </label>
						<input type="text" name="students" placeholder="John Smith, Jane Doe"/>
					</div>					
					<div style="padding-top: 3%" class="input">
						<label for="submit"></label>
						<input type="submit" class="big" value="Add Course">	
					</div> 						
				</form>
				<h2>Create New Tag</h2>				
				<form action="tagCreate.php" method="post">
					<div class="input-control text">
						<label for="tag">Tag: </label>
						<input type="text" name="tag" placeholder="Tag Title"/>
					</div>
					<div style="padding-top: 3%" class="input">
						<label for="submit"></label>
						<input type="submit" class="big" value="Add Tag">	
					</div> 						
				</form>
			</div>
			<div style="float: left; padding-left: 3%; width: 30%" class="input-control textarea">
				<h2>Add Instructors to Current Course</h2>				
				<form action="addInstructor.php" method="post">
					<div class="input-control text">
						<label for="instructors">Enter the user names of instructors you want to add, separated by commas: </label>
						<input type="text" name="instructors" placeholder=""/>
					</div>
					<div style="padding-top: 3%" class="input">
						<label for="submit"></label>
						<input type="submit" class="big" value="Add Instructors">	
					</div> 						
				</form>
			</div>	
        </div>
		<?php
			include 'menu.php';
		?>
    </div>​
</body>
</html>

