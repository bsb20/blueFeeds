<?php
session_start();
$table="`test`.`tags`";
echo "start";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
echo "before";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
	echo "after";
    $text=$row["text"];
    $TUID=$row["TUID"];
    }
    $finally.=                       "<li data-theme='a' class='listNote dynamicComment' data-dynamicContent='tagRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
						<a href='commentspage'>
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl'>
                                               	<h1>$text</h1>
                                               	<span class="ui-li-count"$10</span>
						</div>
						</a>
                                        </li>";
}
    echo $finally;
?>
