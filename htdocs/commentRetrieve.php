<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrives all comments in the database for a specific user (UUID) and student (SUID) in the database.
It then outputs the comments in html format through jquerymobile.
*/
include("initialize.php");
$table="`test`.`comments`";
$SUID=$_SESSION["SUID"];
$UUID=$_SESSION["UUID"];
if(!isset($_SESSION["GUID"])){
        $sql = "SELECT DISTINCT * FROM `test`.`comments` WHERE `SUID`='$SUID' AND `UUID`='$UUID' ORDER BY `date` DESC";
}
else{
$GUID=$_SESSION["GUID"];
    if(isset($_SESSION["UUID"])){
        $sql = "SELECT DISTINCT * FROM `test`.`comments` WHERE `SUID`='$SUID' AND `GUID`='$GUID' AND (`UUID`='$UUID' OR `instructors`='1') ORDER BY `date` DESC";
    }
    else{
        $sql="SELECT DISTINCT * FROM `test`.`comments` WHERE `SUID`='$SUID' AND `GUID`='$GUID' AND `students`='1' ORDER BY `date` DESC";
    }
}
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $title=$row["title"];
    $text=$row["text"];
    $CUID=$row["CUID"];
    $date=$row["date"];
    $uzer=$row["UUID"];
    $students=$row["students"];
    $instructors=$row["instructors"];
    $time=strtotime($date);
    $formattedDate=date("m/d/y",$time);
    }
    if(isset($_SESSION["UUID"])){
    $finally.=                       "<li data-theme='c' class='listNote dynamicComment' data-dynamicContent='commentRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
						<h1>$title</h1>
						<p class='note'>$text</p>
						<div data-role='controlgroup' data-mini='true' data-type='horizontal' align='right'>
						<a href='#editcomment' data-role='button' data-mini='true'>Edit</a>
						</div>
                                                <p class='ui-li-aside'><strong>$formattedDate</strong></p>
                                                    <input type='text' name='CUID' value='$CUID' class='hiddenForm' style='display: none;'>
                                                    <input type='text' name='students' value='$students' id='hiddenForm2' style='display: none;'>
                                                    <input type='text' name='instructors' value='$instructors' id='hiddenForm3' style='display: none;'>
					</li>";}
    else{
	$_SESSION["tempUUID"] = $uzer;
        $finally.=                       "<li data-theme='d' class='listNote dynamicComment' data-dynamicContent='commentRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
						<h1>$title</h1>
						<p class='note'>$text</p>
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl' align='right'>
						<a href='#viewcomment' data-role='button'  data-theme='b' data-mini='true' data-icon='info'>View</a>						
						</div>
                                                <p class='ui-li-aside'><strong>$formattedDate</strong></p>
                                                    <input type='text' name='CUID' value='$CUID' class='hiddenForm' style='display: none;'>
                                                    <input type='text' name='students' value='$students' id='hiddenForm2' style='display: none;'>
                                                    <input type='text' name='instructors' value='$instructors' id='hiddenForm3' style='display: none;'>
                                                    <input type='text' name='UUID' value='$uzer' id='hiddenForm4' style='display: none;'>
					</li>";}
    }

    echo $finally;
?>
