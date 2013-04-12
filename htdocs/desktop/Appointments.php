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
	
	$numAppt = 0;
	$apptToday = 0;
	/* Time Filtering */
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
				$formattedStart=date("g:i A",$start);
				$end=date("g:i A", strtotime($row['end']));
				$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);
				$title=$row['title'];
				$loc=$row['location'];
				$AUID=$row["AUID"];
				
				$today=getDate();
				$testday = $today['mday'];
				$day=intval(date("j",$start));
				$month=intval(date("n",$start));
				$year=intval(date("Y",$start));	

				if(empty($_GET))
				{
					$timeframe="thisweek";
				}
				else
				{
					$timeframe=$_GET["filter"];
				}
				
				if($today['mday']==$day and $today['mon']==$month and $today['year']==$year)
				{
					$apptToday++;
				}
				
				switch ($timeframe)
				{
					case "today":
						if($today['mday']==$day and $today['mon']==$month and $today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";		
							$numAppt++;
						}		
						break;
						
					case "thisweek":
						$beginweek = $today['mday'] - $today['mday']%7;
						$endweek = $today['mday']+7 - ($today['mday']+7)%7;						
						if($beginweek <= $day and $day <= $endweek and $today['mon']==$month and $today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";				
							$numAppt++;
						}				
						break;

					case "month":
						if($today['mon']==$month and $today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";	
							$numAppt++;
						}				
						break;
						
					case "all":
						if($today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";				
							$numAppt++;
						}				
						break;						
				}
		}
	}
	switch($timeframe)
	{
		case "today":
			$_SESSION['message'] = "Here are your appointments for today:";	
			break;
		case "thisweek":
			$_SESSION['message'] = "Here are your appointments for this week:";
			break;
		case "month":
			$_SESSION['message'] = "Here are your appointments for this month:";
			break;
		case "all":
			$_SESSION['message'] = "Here is your history of appointments:";
			break;
	}
	$_SESSION['apptToday'] = $apptToday;
	$_SESSION['numAppt'] = $numAppt;
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
			<a href="./Appointments.php?filter=today">																									
				<button class="shortcut" style="width: 15%; height: 28.5%;">
					<span class="icon">
						<i class="icon-clock"></i>
					</span>
					<span class="label" style="text-align: center;"> Today
					</span>
				</button>	
			</a>
			<a href="./Appointments.php?filter=thisweek">																												
				<button class="shortcut" style="width: 15%; height: 28.5%;">
					<span class="icon">
						<i class="icon-clock"></i>
					</span>
					<span class="label" style="text-align: center;"> This Week
					</span>
				</button>
			</a>
			<a href="./Appointments.php?filter=month">																															
				<button class="shortcut" style="width: 15%; height: 28.5%;">
					<span class="icon">
						<i class="icon-clock"></i>
					</span>
					<span class="label" style="text-align: center;"> This Month
					</span>
				</button>
			</a>
			<a href="./Appointments.php?filter=all">																															
				<button class="shortcut" style="width: 15%; height: 28.5%;">
					<span class="icon">
						<i class="icon-clock"></i>
					</span>
					<span class="label" style="text-align: center;"> All
					</span>
				</button>
			</a>			
			<div class="tile double bg-color-green">
				<div class="tile-content">
					<h2>
					<script type="text/javascript">
						<!-- 
							writeDate()
						-->
					</script>
					</h2>
					<h2>It is now  
					<script type="text/javascript">
						<!--
							writeTime();
						//-->
					</script>
					</h2>
					<h4>
						<?php
							echo "You have " . $_SESSION['apptToday'] . " appointments today.";
						?>
					</h4>
				</div>				
            </div>
			<div style="width:100%;height:68%;line-height:3em;padding:5px;overflow-x: hidden;">
				<head>
					<b>
						<?php
							echo $_SESSION['message'];
						?>
					</b>
				</head>
					<table class="striped">
						<?php
							if(!$_SESSION['numAppt']==0)
							{
								echo $_SESSION['appointments'];								
							}
							else
							{
								echo "					<p>
						You have no current appointments in this timeframe.
					</p>";
							}
						?>						
					</table>	
			</div>
        </div>		
		<?php
			include 'menu.php';
		?>
    </div>​
</body>
</html>

