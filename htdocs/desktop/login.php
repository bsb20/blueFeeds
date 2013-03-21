<?php
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
        $_SESSION["UUID"]=$row["UUID"];
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/test2.php');
    }

else{echo "Username/Password combo was incorrect!";
}
?>