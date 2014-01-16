<?php
session_start();
if(!isset($_SESSION["UUID"]) && !isset($_SESSION["SUID"])){
    echo "~";
}

/*if(!isset($_SESSION["page"]){
	
}*/
date_default_timezone_set("America/New_York");
$db=new mysqli("127.0.0.1","duke","bluedevils","test",3306);
if($db->connect_errno){
    echo "FAILURE";
}
?>
