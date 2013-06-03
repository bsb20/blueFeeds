<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrieves appointments for a given user (UUID) in the order in which events are listed. These independent
appointment events are then outputted in an list <html jquery mobile> format.
*/
include("initialize.php");
$table="`test`.`students`";
$table2="`test`.`appointments`";
$UID=$_SESSION["UUID"];
$ID="UUID";
if(isset($_SESSION["isStudent"])){
 $UID=$_SESSION["SUID"];
 $ID="SUID";
}
$final="";
$sql = "SELECT * FROM $table,$table2 WHERE $table.`SUID`=$table2.`SUID` AND $table2.`$ID`='$UID' ORDER BY `start`;";
$result=$db->query($sql);
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
        $SUID=$row["SUID"];
        $final.=" <li data-theme='$past' class='appt' data-dynamicContent='allAppt'><a href='#reminder'>
                    <h1>$name</h1>
                    <p><strong>$title</strong></p>
                    <p>$loc: $weekly $formattedStart-$end</p>
                    <p class='ui-li-aside'><strong>$pastMessage</strong></p>
                </a>
                <div style='display:none; padding:1%;' class='dismiss'>
                <button class='remove' data-theme='b'>Remove</button>
                </div>
                <input type='text' id='no' style='display:none' value='$AUID'>
                <input type='text' id='student' style='display:none' value='$SUID'>
            </li>";
    }
}
echo $final;
?>
