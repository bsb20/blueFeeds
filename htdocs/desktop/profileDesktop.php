<?php
session_start();
$table="`test`.`students`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM ".$table." WHERE `SUID`='".$SUID."';";
$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
if($row=mysqli_fetch_array($result)){
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    }
$result=           " <div class="tile-content">
					<img src="$photo" class="place-left" id="ProfilePic"/>
                    <h2>$name</h2>
					<h5>$title</h5>
					<p>
						%spec
					</p>					
					
                    <p>$title, $spec</p>
				</div>;
echo $result;
?>