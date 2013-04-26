<?php

/*
This php script retrieves all tags (TUID) for a specific user (UUID) and displays them in listview jquerymobile formatting.
*/

session_start();
$table="`test`.`tu`";
$table2="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$TUID=$_SESSION["TUID"];
$UUID=$_SESSION["UUID"];
$SUID=$_SESSION["SUID"];
$finally="";

$sql = "SELECT * FROM `test`.`tu` INNER JOIN `test`.`comments` ON `test`.`tu`.`CUID` = `test`.`comments`.`CUID` WHERE `test`.`comments`.`SUID` ='".$SUID."' AND `test`.`tu`.`TUID` ='".$TUID."';";
$result=$db->query($sql);


    for($i=0; $i<mysqli_num_rows($result); $i++){
        if($row=mysqli_fetch_array($result)){
                            $title=$row["title"];
                            $text=$row["text"];
                            $CUID=$row["CUID"];
                            $date=$row["date"];
        }
$finally.=        "<li data-theme='d' class='listNote dynamicComment' data-dynamicContent='tagRetrieve' style='margin: 1%; overflow: visible; white-space: normal;'>
    				      <h1>$title</h1>
					      	<p class='note'>$text</p>
					      	<div data-role='controlgroup' data-mini='true' data-type='horizontal' align='right'>
						<a href='#editcomment' data-role='button' data-mini='true'>Edit</a>
						<a href='#viewcomment' data-role='button' data-mini='true'>View</a>
						</div>
					        </li>";
}

echo $finally;
?>
