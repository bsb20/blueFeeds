<?php
session_start();
$table="`test`.`users`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
	echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM ".$table." WHERE `UUID`='$UUID';";
$result=$db->query($sql);
$name;
$email;
$title;
$spec;
if($row=mysqli_fetch_array($result)){
	$name=$row["user"];
	$email=$row["email"];
	$title=$row["title"];
	$spec=$row["speciality"];
	echo "UUID ".$UUID;
	echo "</br>";
	echo $name;
	}
	$_SESSION['profile'] = " <div class="tile-content">
					<img src="./images/Doctor-house.jpg" class="place-left" id="ProfilePic"/>
					<h2>$name</h2>
					<h5>$title</h5>
					<p>
						$spec
					</p>					
				</div>;"
?>