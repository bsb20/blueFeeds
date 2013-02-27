<?php
session_start();
$student=$_POST["SID"];
$table="`test`.`".$student."`";
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$comment=$_POST["comment"];
$CUID=uniqid("",false);
$user=$_SESSION["UUID"];
$sql = "INSERT INTO $table (`CUID`, `SID`, `UUID`, `tags`, `text`, `released`) VALUES ('$CUID','$student','$user','$comment',0);";
$result=$db->query($sql);
?>