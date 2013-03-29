<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM `test`.`comments` WHERE `SUID`='$SUID' ORDER BY `date` DESC";
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
    $finally.=                       "<li data-theme='d' class='listNote dynamicComment' data-dynamicContent='commentRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
						<h1>$title</h1>
						<p class='note'>$text</p>
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl' align='right'>
                                                <a href='#editcomment' data-role='button' data-mini='true' data-icon='plus'>Edit</a>
						<a href='#viewcomment' data-role='button' data-mini='true' data-icon='info'>View</a>						
						</div>
                                                <p class='ui-li-aside'><strong>$formattedDate</strong></p>
                                                    <input type='text' name='CUID' value='$CUID' class='hiddenForm' style='display: none;'>
					</li>";
					
}
    echo $finally;
?>
