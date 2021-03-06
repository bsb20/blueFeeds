<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrieves all instructors for a given course (gUID) and displays them in a list querymobile styled format. 
*/
include("initialize.php");
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM users WHERE `UUID`= '$UUID'";

$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
$html="";
$repeated=array();
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    if(!in_array($row["UUID"],$repeated)){
    array_push($repeated, $row["UUID"]);
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    $UUID=$row["UUID"];

$html.=           " <li class='dynamicSelection' data-dynamicContent='selectionInstructorsPhoto'>
                    <h1>$name</h1>
                    <img src='$photo' class='imgTile'alt='noPicture'/>
                    <p>$title, $spec</p>
                    <input type='text' id='no' style='display:none' value='$UUID'>
            </li>";
    }
    }
}
echo $html;
?>
