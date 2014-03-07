<?php

/*
This php script allows the user (UUID) retrieves all main profile information (name, specialty, photo) 
for a given student (SUID).
*/

include("initialize.php");
$table="`test`.`students`";
$SUID=$_SESSION["SUID"];
$_SESSION['tempSUID']=$SUID;
$sql = "SELECT * FROM ".$table." WHERE `SUID`='".$SUID."';";
$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
if($row=mysqli_fetch_array($result)){
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    }
$result=           " <li class='dynamicProfile' data-dynamicContent='profile' style='display:none;'>
                    <h1>$name</h1>
                    <img src='$photo' class='imgTile'alt='Turk'/>
                    <p>$title, $spec</p>
                </a>
            </li>";
echo $result;
?>
