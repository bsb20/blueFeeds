<html>
<head>
</head>
<body>
<?php
	session_start();
	$table="`test`.`su`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$UUID=$_SESSION["UUID"];
	$user=$_SESSION["user"];
	$pass=$_SESSION["pass"];
	$sql = "SELECT * FROM ".$table." WHERE `UUID`='".$UUID."';";
	$result=$db->query($sql);
	if($row=mysqli_fetch_array($result)){
		$_SESSION["SUID"]=$row["SUID"];
		echo "success";
	}
	else{
		echo $UUID;
		echo " ";
		echo $user;
		echo " ";
		echo $pass;
		echo "failure";
	}
?>
</body>
</html>