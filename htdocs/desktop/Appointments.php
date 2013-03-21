<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`students`";
$table2="`test`.`appointments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$final="";
$sql = "SELECT * FROM $table,$table2 WHERE $table.`SUID`=$table2.`SUID` AND $table2.`UUID`='$UUID' ORDER BY `start`;";
$result=$db->query($sql);
$table = "						<thead>
							<tr>
								<th>Name</th>
								<th class='right'>Title</th>
								<th class='right'>Location</th>
								<th class='right'>Time and Date</th>
							</tr>
						</thead>
						<tbody>";
for($i=0; $i<mysqli_num_rows($result); $i++){
    if($row=mysqli_fetch_array($result)){
            $name=$row["user"];
            $photo=$row["photo"];
            $title=$row["title"];
            $spec=$row["speciality"];
			$past=strtotime($row['start'])>time() || $row['isWeekly'] ? "a" : "d";
			$pastMessage= strtotime($row['start'])>time() || $row['isWeekly'] ? "":"Past Meeting Time";
			$duration=$row['duration'];
			$start=strtotime($row['start']);
			$formattedStart=date("g:i",$start);
			$end=date("g:i", strtotime($row['end']));
			$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);
			$title=$row['title'];
			$loc=$row['location'];
			$AUID=$row["AUID"];
			$table.="							<tr>
									<td>$name</td>
									<td class='right'>$title</td>
									<td class='right'>$loc</td>
									<td class='right'>$weekly $formattedStart-$end</td>
								</tr>";
	}
}
$_SESSION['appointments'] = $table;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	<script type="text/javascript" src="./javascript/Time.js"></script>	

<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>Appointments</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">	
					<?php
						echo $_SESSION['profile'];
					?>	
				</div>
        </div>
        <div class="AppointmentsPage">
			<button class="shortcut" style="width: 15%; height: 28.5%;">
				<span class="icon">
					<i class="icon-clock"></i>
				</span>
				<span class="label" style="text-align: center;"> This Week
				</span>
				<span class="badge">11</span>
			</button>
			<button class="shortcut" style="width: 15%; height: 28.5%;">
				<span class="icon">
					<i class="icon-clock"></i>
				</span>
				<span class="label" style="text-align: center;"> Next Week
				</span>
				<span class="badge">21</span>
			</button>
			<button class="shortcut" style="width: 15%; height: 28.5%;">
				<span class="icon">
					<i class="icon-clock"></i>
				</span>
				<span class="label" style="text-align: center;"> This Month
				</span>
				<span class="badge">50</span>
			</button>
			<div class="tile double bg-color-green">
				<div class="tile-content">
					<h2>
					<script type="text/javascript">
					<!-- 
					writeDate()
					-->
					</script>
					
					<h5>It is now  
					<script type="text/javascript">
					<!--
					writeTime();
					//-->
					</script>
					</h5>
					<p>
						Reminder: Pick up milk on the way home.
					</p>
				</div>				
            </div>
			<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;">
				<head><b>Here are your appointments today:</b></head>
					<table class="striped">
						<?php
							echo $_SESSION['appointments'];
						?>						
					</table>	
			</div>
        </div>		
        <div class="MenuPage">
			<ul id="MenuOptions" style="padding-top: 5%">
            	<li><a href="./LandingPage.php"><button class="big" id="MenuButtons">Home<i class="icon-home icon-small"></i></button></a></li>			
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
