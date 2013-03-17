<?php
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
    $finally.=                       "<li data-theme='a' class='listNote dynamicComment' data-dynamicContent='tagRetrieve' style='margin: 1%; overflow: visible; white-space: normal;'>
  					
					<a href='#commentspageresults' id='loadMyFilter'>	
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl'>
                                               	<h1>$text</h1>
						</div>
						</a>
						//<input type='text' id='no' style='display:none' value='$TUID'>
						 <input type='text' name='TUID' value='$TUID' class='hiddenForm' style='display: none;'>
                                        </li>";
}
    echo $finally;
?>
