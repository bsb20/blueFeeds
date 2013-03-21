<?php
$table1="`test`.`users`";
$table2="`test`.`su`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$user=$_POST["usr"];
$pass=$_POST["pass"];
$UUID;
$sql1 = "SELECT * FROM ".$table1." WHERE `user`='".$user."';";
$result1=$db->query($sql1);
if($row=mysqli_fetch_array($result1) and $row["pass"]==md5($pass,FALSE)){
        session_start();
        $_SESSION["UUID"]=$row["UUID"];
		$UUID=$row["UUID"];
    }
$sql2 = "SELECT * FROM ".$table2." WHERE `UUID`='".$UUID."';";
$result2=$db->query($sql2);
if($row=mysqli_fetch_array($result2))){
        $_SESSION["SUID"]=$row["SUID"];
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/test.php');
    }

else{echo "Username/Password combo was incorrect!";
}
?>