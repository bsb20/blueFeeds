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
			if($today['year']==date("Y",$start) and $today['mon']==date("n",$start) and $today['mday']==date("j",$start))){
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
	}
	$_SESSION['profile'] = " <div class='tile-content'>
					<img src='./images/Doctor-house.jpg' class='place-left' id='ProfilePic'/>
					<h2>$name</h2>
					<h5>$title</h5>
					<p>
						$spec
					</p>					
				</div>;"
?>