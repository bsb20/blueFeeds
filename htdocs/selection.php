<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrieves all students for a given user (UUID) and displays them in a list querymobile styled format. 
*/

include("initialize.php");
$UUID=$_SESSION["UUID"];
$table1="`test`.`groups`";
$table2="`test`.`gs`";
$table3="`test`.`students`";
if(!isset($_SESSION['GUID'])){
$sql = "SELECT * FROM $table1, $table2, $table3 WHERE $table1.`UUID`='$UUID' AND $table1.`GUID`=$table2.`GUID` AND $table2.`SUID`=$table3.`SUID`;";
}
else{
    $GUID=$_SESSION['GUID'];
    $sql = "SELECT * FROM $table1, $table2, $table3 WHERE $table1.`UUID`='$UUID' AND $table1.`GUID`='$GUID' AND $table1.`GUID`=$table2.`GUID` AND $table2.`SUID`=$table3.`SUID`;";
}
$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
$html="";
$repeated=array();
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    if(!in_array($row["SUID"],$repeated)){
    array_push($repeated, $row["SUID"]);
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    $SUID=$row["SUID"];

$html.=           " <li class='dynamicSelection' data-dynamicContent='selection'>
                    <a href='#studentProfile2'>
                    <h1>$name</h1>
                    <img src='$photo' class='imgTile'alt='getarealphone'/>
                    <p>$title, $spec</p>
                    </a>
                    <input type='text' id='no' style='display:none' value='$SUID'>
            </li>";
    }
    }
}
echo $html;

?>
