<?php
function create(){
$table="`test`.`users`";
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
if($_POST["pass"]!=$_POST["passc"]){
    return 1;
}
$user=$_POST['usr'];
$password=md5($_POST['pass'],FALSE);
$email=$_POST['email'];
$UUID=uniqid("",FALSE);
$sql = "SELECT * FROM ".$table." WHERE `user`='".$user."';";
$hasDuplicatesResult=$db->query($sql);
if(mysqli_fetch_array($hasDuplicatesResult)){
    return 2;
}
$db->real_query("INSERT INTO ".$table." (`user`, `pass`, `email`, `UUID`) VALUES ('".$user."', '".$password."', '".$email."', '".$UUID."');");
return 0;
}
switch(create()){
    case(1):
        echo "passwords did not match!";
        break;
    case(2):
        echo "username is already in use, try again!";
        break;
    default:
        echo "true";
    }

?>