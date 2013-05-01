<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script removes an desktop updated rssfeed from the live rss feed page and correspondind database location.
*/

session_start();
$table="`test`.`feeds`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
echo "what";
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$FUID=$_POST["FUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("DELETE FROM".$table."WHERE `FUID`='$FUID';");
echo "true";
?>
