<?php
session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$text=$_POST["comment"];
$title=$_POST["title"];
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$isReleased=0;
$CUID=uniqid("",FALSE);
$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `SUID`, `date`, `text`, `isReleased`, `CUID`, `title`) VALUES ('$user', '$student', '$date', '$text', '$isReleased', '$CUID','$title');");
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentComments.php');
?>