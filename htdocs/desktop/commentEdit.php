<?php
/* This may need to be expanded so that other field aside from just the text can be edited */
session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$title=$_POST["title"];
$text=$_POST["comment"];
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$CUID=$_SESSION["CUID"];
$isReleased=0;
$date=date("Y-m-d H:i:s");
$db->real_query("UPDATE ".$table." SET `text`='$text' WHERE `CUID`='$CUID';");
$db->real_query("UPDATE ".$table." SET `title`='$title' WHERE `CUID`='$CUID';");
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentComments.php?filter=all');
echo "true";
?>