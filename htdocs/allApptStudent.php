<?php
/*Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
Retrieves all appointments for a particular student
*/
include("initialize.php");
$table="`test`.`students`";
$table2="`test`.`appointments`";
$SUID=$_SESSION["SUID"];
$final="";
/*
join appointments table to students table, select for appointments with the current SUID
*/
$sql = "SELECT * FROM $table,$table2 WHERE $table.`SUID`=$table2.`SUID` AND $table2.`SUID`='$SUID' ORDER BY `start`;";
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
        $final.=" <li data-theme='$past' data-dynamicContent='allAppt'><a href='#reminder'>
                    <h1>$name</h1>
                    <h2>$title</h2>
                    <p><strong>$loc</strong></p>
                    <p>$weekly $formattedStart-$end</p>
                    <p class='ui-li-aside'><strong>$pastMessage</strong></p>
                </a>
                <input type='text' id='no' style='display:none' value='$AUID'>
                <input type='text' id='student' style='display:none' value='$SUID'>
            </li>";
    }
}
echo $final;
?>
