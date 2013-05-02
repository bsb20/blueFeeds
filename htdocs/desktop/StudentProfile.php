<?php
	/* 
	Student profile page 
	This page contains links to the comments and appointments pages
	Student information is displayed in tiles and users can create new comments or appointments from this page
	*/
	session_start();
	date_default_timezone_set("America/New_York");
	$table1="`test`.`students`";
	$table2="`test`.`appointments`";
	$table3="`test`.`comments`";	
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	
	$GUID=$_SESSION['GUID'];	
	/* Gets student information */
	$SUID=$_GET["SUID"];
	$_SESSION["SUID"]=$SUID;
	$sql1 = "SELECT * FROM ".$table1." WHERE `SUID`='$SUID';";
	$result1=$db->query($sql1);
	if($row=mysqli_fetch_array($result1)){
		$_SESSION["student"]=$row["user"];
		$_SESSION["title"]=$row["title"];
		$_SESSION["spec"]=$row["specialty"];
		$_SESSION["email"]=$row["email"];		
	}
	
	/* Populates recent appointments tile */
	$UUID=$_SESSION["UUID"];
	$recentAppt="";
	$sql2 = "SELECT * FROM ".$table2." WHERE `SUID`='$SUID' AND `UUID`='$UUID' ORDER BY `start` DESC;";
	$result2=$db->query($sql2);
	for($i=0; $i<mysqli_num_rows($result2); $i++){
		if($row=mysqli_fetch_array($result2)){
			$past=strtotime($row['start'])>time() || $row['isWeekly'] ? "a" : "d";
			$pastMessage= strtotime($row['start'])>time() || $row['isWeekly'] ? "":"Past Meeting Time";
			$duration=$row['duration'];
			$start=strtotime($row['start']);
			$formattedStart=date("g:i A",$start);
			$end=date("g:i", strtotime($row['end']));
			$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);
			$title=$row['title'];
			$loc=$row['location'];
			$AUID=$row["AUID"];
			$recentAppt=" $weekly
				</br>
				At $formattedStart";
			$_SESSION["recentAppt"]=$recentAppt;	
			break;
		}
	}
	
	/* Populates recent comment tile */
	$sql3 = "SELECT * FROM $table3 WHERE `SUID`='$SUID' AND `GUID`='$GUID' AND (`UUID`='$UUID' OR `instructors`='1') ORDER BY 'date' DESC";
	$result3=$db->query($sql3);
	$recentComment="";
	for($i=0; $i<mysqli_num_rows($result3); $i++){
		if($row=mysqli_fetch_array($result3)){
		$title=$row["title"];
		$text=$row["text"];
		$CUID=$row["CUID"];
		$date=$row["date"];
		$time=strtotime($date);
		$formattedDate=date("m/d/y",$time);
		$recentComment="						<p style='font-size: 15px'>
								$text
							</p>
							<p>
								$formattedDate
								$GUID
							</p>";
		$_SESSION["recentCmmnt"]=$recentComment;	
		break;
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
	<div>
		<h1 style="display: inline-block">
			Student Profile Page
		</h1>	
			<?php
				echo "GUID1 " . $_SESSION['GUID'] . "GUID2 " . $GUID . " SUID1 " . $_SESSION['SUID'] . " SUID2 " . $SUID;
			?>		
		<div style="display: inline-block; padding: 1.5%; float: right; height: 65px; width: 50%; overflow-y: scroll; overflow-x: hidden;">
			<?php
				echo $_SESSION['buttons'];
			?>
		</div>
	</div></header>
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
					<a href="./StudentComments.php?filter=thisweek">				
					<div class="tile-content">
					<h2>Recent Comment:</h2>
						<?php
							echo $_SESSION['recentCmmnt'];							
						?>
					</div>				
				</div>
				<div class="tile double bg-color-orange">
					<a href="./Appointments.php?filter=thisweek">								
					<div class="tile-content">
					<h2>Upcoming Appointments:</h2>
					<p style="font-size: 15px">
						<?php
							echo $_SESSION['recentAppt'];							
						?>
					</p>
					</div>				
				</div>	
				<a href="./StudentComments.php"><button class="big">New Comment <i class="icon-pencil icon-small"></i></button></a>
				<a href="./Add Appointment.php"><button class="big">New Appointment <i class="icon-clipboard-2 icon-small"></i></button></a>
				<a href=""><button class="big">Delete Profile <i class="icon-remove icon-small"></i></button></a>						
			</div>
        </div>
		<?php
			include 'menu.php';
		?>
    </div>​
    </div>​
</body>
</html>

