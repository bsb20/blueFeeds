<html>
<head>
</head>
<body>
<?php
	session_start();
	$table="`test`.`users`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$UUID=$_SESSION["UUID"];
	echo $UUID;
?>
</body>
</html>