<?php
session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$text=$_POST["comment"];
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$CUID=$_POST["CUID"];
$isReleased=0;
$date=date("Y-m-d H:i:s");
$db->real_query("UPDATE ".$table." SET `text`='$text' WHERE `CUID`='$CUID';");
echo "true";
?>