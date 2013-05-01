<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script is by the main page of the blueFeeds application login page to add a user student profile to out database. 
Student profiles are created with a new student id and group id. 
*/

session_start();
$table="`test`.`students`";
$GUID=$_SESSION["GUID"];
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
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
