<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrieves all tags (TUID) for a specific user (UUID) and displays them in listview jquerymobile formatting.
*/
include("initialize.php");
$table="`test`.`tu`";
$table2="`test`.`comments`";
$TUID=$_SESSION["TUID"];
$UUID=$_SESSION["UUID"];
$SUID=$_SESSION["SUID"];
$GUID=$_SESSION["GUID"];
$finally="";

$sql = "SELECT * FROM `test`.`tu` INNER JOIN `test`.`comments` ON `test`.`tu`.`CUID` = `test`.`comments`.`CUID` WHERE `test`.`comments`.`SUID` ='".$SUID."' AND `test`.`tu`.`TUID` ='".$TUID."' AND `comments`.`GUID`='$GUID';";
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
