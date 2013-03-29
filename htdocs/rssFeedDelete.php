<?php
session_start();
$table="`test`.`feeds`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$FUID=$_POST["FUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("DELETE FROM".$table."WHERE `FUID`='$FUID';");
echo "true";
?>
