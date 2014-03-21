<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrieves all instructors for a given course (gUID) and displays them in a list querymobile styled format. 
*/
include("initialize.php");
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM students WHERE `SUID`= '$SUID'";

$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
$html="";
$repeated=array();
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    if(!in_array($row["SUID"],$repeated)){
    array_push($repeated, $row["SUID"]);
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    $SUID=$row["SUID"];

$html.=           " <li class='dynamicSelection' data-dynamicContent='selectionStudentsPhoto'>
                    <h1>$name</h1>
                    <img src='$photo' class='imgTile'alt='noPicture'/>
                    <p>$title, $spec</p>
                    <input type='text' id='no' style='display:none' value='$SUID'>
            </li>";
    }
    }
}
echo $html;
?>
