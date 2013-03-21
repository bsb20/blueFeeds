<?php
	session_start();
	date_default_timezone_set("America/New_York");
	$table1="`test`.`students`";
	$table2="`test`.`appointments`";	
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$SUID=$_GET["SUID"];
	$sql1 = "SELECT * FROM ".$table1." WHERE `SUID`='$SUID';";
	$result1=$db->query($sql1);
	if($row=mysqli_fetch_array($result1)){
		$_SESSION["student"]=$row["user"];
		$_SESSION["title"]=$row["title"];
		$_SESSION["spec"]=$row["specialty"];
		$_SESSION["email"]=$row["email"];		
	}
	
	date_default_timezone_set("America/New_York");
	$sql2 = "SELECT * FROM ".$table2." WHERE `SUID`='$SUID' ORDER BY `start`;";
	$result2=$db->query($sql2);
	echo "here";
	for($i=0; $i<mysqli_num_rows($result2); $i++){
		if($row=mysqli_fetch_array($result2)){
			if(strtotime($row['start'])>time()){
				$apptDate= date("l",$start) : date("l, M j", $start);	
				$start=strtotime($row['start']);
				$formattedStart=date("g:i",$start);	
				
				$_SESSION["nextApptDate"]=$apptDate;		
				$_SESSION["nextApptTime"]=$formattedStart;	
			}
			else{
				$_SESSION["nextApptDate"]="No upcomig appointments";		
				$_SESSION["nextApptTime"]="No times scheduled";
			}
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
	<link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->
<title>Bluefeeds Student Profile</title>
</head>
<header>
	<h1>Student Profile Page</h1>
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
		
        <div class="StudentProfilePage">
			<h1>
				<?php 
					echo $_SESSION['student'] . "'s Profile";					
				?>					
			</h1>
			<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;">
				<div class="tile double bg-color-dark">
					<div class="tile-content">
					<h2>
						<?php
							echo $_SESSION['student'];
						?>
					</h2>
					<h4>
						<?php
							echo "Title: " . $_SESSION['title'];
						?>					
					</h4>
					<p>
						<?php
							echo "Area of Study: " . $_SESSION['spec'];
							echo "</br>";
							echo "Email: " . $_SESSION['email'];							
						?>
					</p>
					</div>				
				</div>	
				<div class="tile double bg-color-green">
					<div class="tile-content">
					<h2>Workdays:</h2>
					<p style="font-size: 15px">
						Monday, Tuesday, Wednesday, Thursday, Friday
					</p>
					</div>				
				</div>	
				<div class="tile double bg-color-pink">
					<div class="tile-content">
					<h2>Recent Comment:</h2>
					<p style="font-size: 15px">
						Foreman sucks.
					</p>
					<p>
						2/27/13
					</p>
					</div>				
				</div>
				<div class="tile double bg-color-orange">
					<div class="tile-content">
					<h2>Upcoming Appointments:</h2>
					<p style="font-size: 15px">
						<?php
							echo $_SESSION['nextApptDate'];
							echo "</br>";
							echo 'At: ' . $_SESSION['nextApptTime'];							
						?>
					</p>
					</div>				
				</div>	
				<a href="./StudentComments.html"><button class="big">New Comment <i class="icon-pencil icon-small"></i></button></a>
				<a href="./Add Appointment.php"><button class="big">New Appointment <i class="icon-clipboard-2 icon-small"></i></button></a>
				<a href=""><button class="big">Delete Profile <i class="icon-remove icon-small"></i></button></a>						
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
    </div>​
</body>
</html>

