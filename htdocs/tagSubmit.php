<?php
session_start();
$table="`test`.`tu`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$title=$_POST["title"];
$user=$_SESSION["UUID"];
$TUID=$_POST["TUID"];
$db->real_query("INSERT INTO ".$table." (`TUID`, `FUID`, `title`) VALUES ('$user', '$FUID','$title');");
echo "true";
?>
