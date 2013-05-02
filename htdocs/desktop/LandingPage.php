<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`students`";
$table2="`test`.`appointments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$GUID=$_SESSION["GUID"];
$UUID=$_SESSION["UUID"];
$final="";
$sql = "SELECT * FROM $table,$table2 WHERE $table.`SUID`=$table2.`SUID` AND $table2.`UUID`='$UUID' ORDER BY `start`;";
$result=$db->query($sql);
$recentAppt = "";
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
			$end=date("g:i", strtotime($row['end']));
			$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);
			$title=$row['title'];
			$loc=$row['location'];
			$AUID=$row["AUID"];
			$today=getDate();
			$testday = $today['mday'];
			$day=intval(date("j",$start));
			$month=intval(date("n",$start));
			$year=intval(date("Y",$start));
			$beginweek = $today['mday'] - $today['mday']%7;
			$endweek = $today['mday']+7 - ($today['mday']+7)%7;			
			if($beginweek <= $day and $day <= $endweek and $today['mon']==$month and $today['year']==$year)
			{
				$recentAppt.="								<li id='CurrentAppointments'>$name at $formattedStart</li>";								
			}
	}
}
$_SESSION['appointments'] = $recentAppt;

$table="`test`.`users`";
$sql = "SELECT * FROM ".$table." WHERE `UUID`='$UUID';";
$result=$db->query($sql);
$name;
$email;
$title;
$spec;
if($row=mysqli_fetch_array($result)){
		$name=$row["user"];
		$email=$row["email"];
		$title=$row["title"];
		$spec=$row["speciality"];
		$photo=$row["photo"];
		if($photo=="")
		{
			$photo="http://bluefeeds.cs.duke.edu/home/htdocs/uploads/nophoto.gif";
		}
	}
$_SESSION['profile'] = " <div class='tile-content'>
				<img src=$photo class='place-left' id='ProfilePic'/>
				<h3>$name</h3>
				<h3>$title</h5>
				<h4>
					$spec
				</h4>					
			</div>;";
			
$table="`test`.`comments`";
$sql = "SELECT * FROM ".$table."WHERE `UUID`='$UUID' ORDER BY date DESC";
$result=$db->query($sql);
$recentcomment2="";
$formattedDate;
for($i=0; $i<mysqli_num_rows($result); $i++){
	if($row=mysqli_fetch_array($result)){
		$title=$row["title"];
		$text=$row["text"];
		$CUID=$row["CUID"];
		$SUID=$row["SUID"];		
		$date=$row["date"];
		$time=strtotime($date);
		$formattedDate=date("m/d/y",$time);
	}
	$recentComment1="<h2>Most Recent Comment:</h2>
					<br>
					<div>
						<h3>Description: </h3>					
						<br>
						<p id='RecentCommentText'>
							$text
						</p>
					</div>";
	break;
}
$_SESSION["recentComment1"]=$recentComment1;	

$table="`test`.`students`";
$sql = "SELECT * FROM ".$table." WHERE `SUID`='$SUID';";
$result=$db->query($sql);
$recentcomment1="";
if($row=mysqli_fetch_array($result)){
	$student=$row["user"];
	$recentComment2="
					<div id='RecentCommentDiv'>
						<h3>To: </h3>
						<br>
						<p id='RecentCommentText'>
							$student
						</p>
					</div>
					<div id='RecentCommentDiv'>					
						<h3>On: </h3>
						<br>						
						<p id='RecentCommentText'>
							$formattedDate
						</p>	
					</div>";
}
$_SESSION["recentComment2"]=$recentComment2;

$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";
$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$filepath);
$rss = "";
foreach($xml->channel->item as $item)
{
	$title = $item->title;
	$link = $item->link;
	$date = $item->date;
	$desc = $item->description;
	
	$rss.="						<li>
						<a>$title</a>
						<div>
							<h3>$title</h3>
							$desc
							<p>
								$date
							</p>
							<a href=$link><button class='bg-color-blueLight'> Link </button></a>
							<a href='#'><button class='bg-color-green'> Edit </button></a>
							<a href='#'><button class='bg-color-red'> Delete </button></a>							
						</div>
					</li>";
}
$_SESSION['rss'] = $rss;

$table="`test`.`groups`";
$table1="`test`.`courses`";
$sql="SELECT * FROM $table1, ".$table." WHERE $table.`UUID`='".$UUID."' AND $table1.`GUID`=$table.`GUID`;";
$result=$db->query($sql);

$buttons = "";
$buttons.="<a href='./HelpPage.php'><button id='courseButton'><i class='icon-help'></i>Help</button></a>";
for($i=0; $i<mysqli_num_rows($result); $i++){
	if($row=mysqli_fetch_array($result)){
		$info=$row["info"];
		$title=$row['title'];
		$BUTTONGUID=$row['GUID'];
		$link = "./setGUID.php?course=" . $BUTTONGUID;
		$buttons.="<a href=$link><button id='courseButton'><i class='icon-bookmark'></i>$title</button></a>";
	}
}
$_SESSION['buttons'] = $buttons;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
	<script type="text/javascript" src="./javascript/dialog.js"></script>
	<?php
		if($_SESSION['alert'])
		{
			include 'displayAlert.php';
		}
	?>
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>

</head>
<header>
	<div>
		<h1 style="display: inline-block">
			BlueFeeds Lobby
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
        <div class="BluefeedsNewsLandingPage">
			<h2><font color="white">Bluefeeds News</font></h2>
        	<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
				<ul class="accordion dark span10" data-role="accordion">
					<?php
						echo $_SESSION['rss'];
					?>                    
                </ul>
				</div>
        </div>
		<?php
			include 'menu.php';
		?>
        <div class="NextAppointmentPage">         
			<div class="tile double bg-color-orange" style="height:100%; width: 100%; float: left;">
				<div class="tile-content">
					<h2>This week's appointments:</h2>
					<br>
					<p>
						<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
							<ul>
								<?php
									if($_SESSION['appointments']=="")
									{
										echo "<h3>You have no appointments this week.</h3>";
									}
									else
									{
										echo $_SESSION['appointments'];
									}
								?>							
							</ul>							
						</div>
					</p>
				</div>				
			</div>
        </div>
        <div class="MostRecentCommentPage">
			<div class="tile double bg-color-green" style="height:100%; width: 100%; float: left;">
				<div class="tile-content">
					<?php
						$comment1 = $_SESSION['recentComment1'];
						$comment2 = $_SESSION['recentComment2'];
						if($comment1 == '' && $comment2 == '')
						{
							echo "					<h2>Recent Comments:<h2>
					<br>
					<h2>No recent comments to display.</h2>";
						}
						else
						{
							echo $_SESSION['recentComment1'];
							echo $_SESSION['recentComment2'];							
						}
					
					?>					
				</div>				
			</div>			
        </div>
    </div>​
</body>
</html>

