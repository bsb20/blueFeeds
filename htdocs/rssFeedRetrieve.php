<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`feeds`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`feeds` WHERE `UUID`='$UUID' ORDER BY `date` DESC";
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $title=$row["title"];
    $url=$row["url"];
    $FUID=$row["FUID"];
    $date=$row["date"];
    $time=strtotime($date);
    $formattedDate=date("m/d/y",$time);
    }
    $finally.=                       "<li data-theme='a' class='listNote dynamicComment' data-dynamicContent='rssFeedRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
    				<a href=$url data-role='button' data-theme='b' data-mini='true' data-icon='plus'>
    				<h1>$title</h1>
						<p class='note'>$text</p>
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl' align='right'>
                    			
						</div>
                                                <p class='ui-li-aside'><strong>$formattedDate</strong></p>
                               </a>
					</li>";
}
    echo $finally;
?>
