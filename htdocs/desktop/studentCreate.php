<?php
/* Defines a function to create a new student */
function create(){
session_start();
$table="`test`.`students`";
$joinTable="`test`.`su`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
if($_POST["pass"]!=$_POST["passc"]){
    return 1;
}
$UUID=$_SESSION["UUID"];
$user=$_POST['first']." ".$_POST["last"];
$email=$_POST['email'];
$photo="./uploads/nophoto.gif";
$title=$_POST['title'];
$spec=$_POST['study'];

$SUID=uniqid("",FALSE);
$_SESSION["SUID"]=$SUID;
$sql = "SELECT * FROM ".$table." WHERE `user`='".$user."';";
$hasDuplicatesResult=$db->query($sql);
if(mysqli_fetch_array($hasDuplicatesResult)){
    return 2;
}
$db->real_query("INSERT INTO ".$table." (`user`, `email`, `SUID`, `photo`, `title`, `speciality`) VALUES ('$user','$email', '$SUID', '$photo', '$title', '$spec');");
$db->query("INSERT INTO $joinTable (`UUID`,`SUID`) VALUES ('$UUID', '$SUID')");
return 0;
}

/* Calls function that creates student and echos the result */
switch(create()){
    case(1):
        echo "passwords did not match!";
        break;
    case(2):
        echo "student is already in system, try again!";
        break;
    default:
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/LandingPage.php');		
        echo "true";
    }

?>