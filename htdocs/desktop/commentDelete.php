<?php
session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$CUID=$_GET["CUID"];
$isReleased=0;
$date=date("Y-m-d H:i:s");
$db->real_query("DELETE FROM".$table."WHERE `CUID`='$CUID';");
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentComments.php?filter=all');
echo "true";
?>