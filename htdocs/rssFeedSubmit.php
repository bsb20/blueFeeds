<?php
include("initialize.php");
$table="`test`.`feeds`";
$url=$_POST["feedUrl"];
$title=$_POST["feedName"];
$user=$_SESSION["UUID"];
$FUID=$_POST["FUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `date`, `url`, `FUID`, `title`) VALUES ('$user', '$date', '$url', '$FUID','$title');");
echo "true";
?>
