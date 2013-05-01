<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows the user to create a new tag (TUID) and adds it to the database. 
*/
session_start();
$table="`test`.`tags`";
$UUID=$_SESSION["UUID"];
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$tag=$_POST["tag"];
$TUID=uniqid("",FALSE);
$db->real_query("INSERT INTO ".$table." (`tag`, `TUID`, `UUID`) VALUES ('$tag', '$TUID', '$UUID');");
?>
