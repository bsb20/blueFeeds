<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
Using user inserted login credentials, this script verifies the authorization of the user with the database. 
As parameters, it takes in a username and password.
*/


include("initialize.php");
$table="`test`.`users`";
$user=$_POST["usr"];
$pass=$_POST["pass"];
if(strlen($user)==0 || strlen($pass)==0){
echo "please enter login information";
return;
}
$sql = "SELECT * FROM ".$table." WHERE `user`='".$user."';";
$result=$db->query($sql);
if($row=mysqli_fetch_array($result) and $row["pass"]==md5($pass,FALSE)){
        session_start();
        if(isset($_SESSION["GUID"])){
            unset($_SESSION["GUID"]);
        }
        $_SESSION["UUID"]=$row["UUID"];
	$_SESSION["tmpUUID"]=$_SESSION["UUID"];
        echo "instructor";
	return;
    }
else{
    $table="`test`.`students`";
    $sql="SELECT * FROM ".$table." WHERE `id`='".$user."';";
    $result=$db->query($sql);
    if($row=mysqli_fetch_array($result) and $row["pass"]==md5($pass,FALSE)){
        session_start();
        if(isset($_SESSION["GUID"])){
            unset($_SESSION["GUID"]);
        }
        if(isset($_SESSION["UUID"])){
            unset($_SESSION["UUID"]);
        }
        $_SESSION["SUID"]=$row["SUID"];
        $_SESSION["isStudent"]="true";
        echo "student";
	return;
    }
echo "Username/Password combo was incorrect!";
}
?>
