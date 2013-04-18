<?php
function create(){
session_start();
$table="`test`.`users`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
if($_POST["pass"]!=$_POST["passc"]){
    return 1;
}
$user=$_POST['usr'];
$password=md5($_POST['pass'],FALSE);
$email=$_POST['email'];
// $photo=$_FILES['photo']['tmp_name'];
$title=$_POST['title'];
$spec=$_POST['speciality'];
$UUID=uniqid("",FALSE);
$_SESSION["UUID"]=$UUID;
$sql = "SELECT * FROM ".$table." WHERE `user`='".$user."';";
$hasDuplicatesResult=$db->query($sql);
if(mysqli_fetch_array($hasDuplicatesResult)){
    return 2;
}
$db->real_query("INSERT INTO ".$table." (`user`, `pass`, `email`, `UUID`, `photo`, `title`, `speciality`) VALUES ('$user', '$password', '$email', '$UUID', '$photo', '$title', '$spec');");
return 0;
}
switch(create()){
    case(1):
        echo "passwords did not match!";
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/Login.html?alert=1');		
        break;
    case(2):
        echo "username is already in use, try again!";
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/Login.html?alert=2');				
        break;
    default:
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/Login.html?alert=3');			
        echo "true";
    }

?>