<?php
session_start();
$table="`test`.`feeds`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$url=$_POST["feedUrl"];
$title=$_POST["feedName"];
$user=$_SESSION["UUID"];
$isReleased=0;
$FUID=$_POST["FUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `date`, `url`, `FUID`, `title`) VALUES ('$user', '$date', '$url', '$FUID','$title');");
?>
