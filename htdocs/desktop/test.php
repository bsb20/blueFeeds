<?php
session_start();
date_default_timezone_set("America/New_York");
$table2="`test`.`appointments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_GET["UUID"];
$final="";
$sql2 = "SELECT * FROM ".$table2." WHERE `SUID`='$SUID' ORDER BY `start`;";
$result2=$db->query($sql2);
for($i=0; $i<mysqli_num_rows($result2); $i++){
    if($row=mysqli_fetch_array($result2)){
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
if($row=mysqli_fetch_array($result1) || $row['isWeekly']==1){
	$_SESSION["student"]=$row["user"];
	$_SESSION["title"]=$row["title"];
	$_SESSION["spec"]=$row["specialty"];
	$_SESSION["email"]=$row["email"];	

	$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);	
	$start=strtotime($row['start']);
	$formattedStart=date("g:i",$start);	
	
	$_SESSION["nextApptDate"]=$weekly;		
	$_SESSION["nextApptTime"]=$formattedStart;	
}
$_SESSION['appointments'] = $table;
?>