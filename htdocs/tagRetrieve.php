<?php
session_start();
$table="`test`.`tags`";
echo "start";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
echo "before";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
	echo "after";
    $text=$row["text"];
    $TUID=$row["TUID"];
    $time=strtotime($date);
    $formattedDate=date("m/d/y",$time);
    }
    $finally.=                       "<li data-theme='d' class='listNote dynamicComment' data-dynamicContent='tagRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
						<p class='note'>$text</p>
						<span class="ui-li-count">counter</span></a>
                                                <p class='ui-li-aside'><strong>$formattedDate</strong></p>
                                                    <input type='text' name='TUID' value='$TUID' class='hiddenForm' style='display: none;'>
					</li>";
}
    echo $finally;
?>

