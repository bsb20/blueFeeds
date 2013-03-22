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
<!--     <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> -->    

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>Comment Page</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">
					<?php 
						echo $_SESSION['profile'];					
					?>	
				</div>
        </div>
        <div class="BluefeedsNewsPage">
            <h2>
				<?php 
					echo $_SESSION['student'] . "'s Comment Page";					
				?>				
			</h2>
				<div style="width:100%;height:85%;line-height:3em;padding:5px;overflow-x: hidden;">
					<a href="./StudentProfile.php">																									
						<button class="shortcut" id="TimeFilterButton">
							<a href="./StudentProfile.php">																									
							<span class="icon">
								<i class="icon-undo"></i>
							</span>
							<span class="label"> Back
							</span>
						</button>	
					</a>
					<button class="shortcut" id="TimeFilterButton">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> This Week
						</span>
						<span class="badge">11</span>
					</button>
					<button class="shortcut" id="TimeFilterButton">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> Next Week
						</span>
						<span class="badge">21</span>
					</button>
					<button class="shortcut" id="TimeFilterButton">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> This Month
						</span>
						<span class="badge">50</span>
					</button>	
					<button class="shortcut" id="TimeFilterButton">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> All Time
						</span>
						<span class="badge">100</span>						
					</button>					
					<ul class="accordion dark span10" data-role="accordion" data-dynamicQuery="commentRetrieveDesktop">
						<?php 
							echo $_SESSION['commentList'];					
						?>						
					</ul>
					<div id="NewCommentArea" class="input-control textarea">
						<h2>New Comment</h2>			
							<form action="commentSubmit.php" method="post">
								<div class="input-control text">
									<label for="title">Title: </label>
									<input type="text" name="title" placeholder="Morning meeting"/>
								</div>	
								<div class="input-control text">
									<label for="comment">Comment: </label>
									<textarea name="comment" placeholder="Description"/></textarea>
								</div>	
								<div class="input-control text">
									<label for="submit"></label>
									<input type="submit" class="big" name="submit" value="Add Comment" style="float: left;">	
								</div>
							</form>
					</div>							
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
</body>
</html>

