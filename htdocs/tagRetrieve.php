<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retieves all tags for a specific user (UUID) and displays them in html-based jquerymobile listviews.
*/


session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $text=$row["text"];
    $TUID=$row["TUID"];
    }
    $finally.=                       "<li data-theme='a' class='dynamicTag' data-dynamicContent='tagRetrieve' style='margin: 1%; overflow: visible; white-space: normal;'>
  					
					<a href='#commentspageresults'>	
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl'>
                                               	<h1>$text</h1>
						</div>
					</a>
						<input type='text' id='no' style='display:none' value='$TUID'>
                                    </li>";
}
    echo $finally;
?>
