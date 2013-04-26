<?php

/*
Using user inserted login credentials, this script verifies the authorization of the user with the database. 
As parameters, it takes in a username and password.
*/

$table="`test`.`users`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$user=$_POST["usr"];
$pass=$_POST["pass"];
$sql = "SELECT * FROM ".$table." WHERE `user`='".$user."';";
$result=$db->query($sql);
if($row=mysqli_fetch_array($result) and $row["pass"]==md5($pass,FALSE)){
        session_start();
        if(isset($_SESSION["GUID"])){
            unset($_SESSION["GUID"]);
        }
        $_SESSION["UUID"]=$row["UUID"];
        echo "instructor";
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
    }
//echo "Username/Password combo was incorrect!";
}
?>
