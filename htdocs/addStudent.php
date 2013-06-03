<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script is by the main page of the blueFeeds application login page to add a user student profile to out database. 
Student profiles are created with a new student id and group id. 
*/
include("initialize.php");
$table="`test`.`students`";
$GUID=$_SESSION["GUID"];
$newString=$_POST["students"];
$newList=explode(",", $newString);
foreach($newList as $value){
    $sql="SELECT * FROM $table WHERE `id`='$value';";
    $result=$db->query($sql);
    if($row=mysqli_fetch_array($result)){
        $SUID=$row["SUID"];
        $table2="`test`.`gs`";
        $sql="INSERT INTO $table2 (`SUID`,`GUID`) VALUES ('$SUID','$GUID');";
        $db->real_query($sql);
    }
}
echo "true";
?>
