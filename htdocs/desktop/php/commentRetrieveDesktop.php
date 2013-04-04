<?php
session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM `test`.`comments` WHERE `SUID`='$SUID'";
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $title=$row["title"];
    $text=$row["text"];
    $CUID=$row["CUID"];
    $date=$row["date"];
    $time=strtotime($date);
    $formattedDate=date("m/d/y",$time);
    }
    $finally.=                       "<li class='listNote dynamicComment' data-dynamicContent='commentRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
						<a>$title</a>
						<div class='note'>$text</div>
                        <p class='ui-li-aside'><strong>$formattedDate</strong></p>
					</li>";
}
    echo $finally;
?>