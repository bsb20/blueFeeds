<?php
/* Retrieves the most recent comment made by the user and populates the session variable commentList */
session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM ".$table."WHERE `SUID`='$SUID' ORDER BY 'date' DESC";
$result=$db->query($sql);
$commentList="";
for($i=0; $i<mysqli_num_rows($result); $i++){
	if($row=mysqli_fetch_array($result)){
		$title=$row["title"];
		$text=$row["text"];
		$CUID=$row["CUID"];
		$date=$row["date"];
		$time=strtotime($date);
		$formattedDate=date("m/d/y",$time);
    }
    $commentList.="						<li>
							<a href='#'>$title</a>
							<div>
								$text
								<p>
									$formattedDate
								</p>
							</div>
						</li>";
}
$_SESSION["commentList"]=$commentList;	
?>
