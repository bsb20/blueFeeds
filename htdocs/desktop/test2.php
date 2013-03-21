<?php
	session_start();
	$table="`test`.`su`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "Database connection FAILURE";
	}
	$UUID=$_SESSION["UUID"];
	$sql = "SELECT * FROM ".$table." WHERE `UUID`='$UUID';";
	$result=$db->query($sql);
	if($row=mysqli_fetch_array($result)){
		$_SESSION["SUID"]=$row["SUID"];
		echo "success";
	}
	else{
		echo "FAILURE";
	}
?>
<html>
<head>
</head>
<body>
	<?php
		echo "UUID ". $_SESSION["UUID"];
		echo "<br>";
		echo "SUID ". $_SESSION["SUID"];
		
	?>
</body>
</html>