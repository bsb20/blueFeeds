<?php

/*
This php script loads all courses for a user to select and their respective course information links. It is called 
directly after a course has been selected and sets both private and public variables for the user repsectively. 
*/

session_start();
$table="`test`.`groups`";
$table1="`test`.`courses`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
if(isset($_SESSION["UUID"])){
$UUID=$_SESSION["UUID"];
$sql="SELECT * FROM $table1, ".$table." WHERE $table.`UUID`='".$UUID."' AND $table1.`GUID`=$table.`GUID`;";
$result=$db->query($sql);
}
else{
    $SUID=$_SESSION["SUID"];
    $sql="SELECT * FROM `test`.`gs`, `test`.`courses` WHERE `test`.`gs`.`SUID`='$SUID' AND `test`.`courses`.`GUID`=`test`.`gs`.`GUID`;";
    $result=$db->query($sql);
}
$courses=array();

for($i=0; $i<mysqli_num_rows($result); $i++){
    if($row=mysqli_fetch_array($result)){
    $table2="`test`.`groups`";
    $table3="`test`.`users`";
    $other=$row["GUID"];
    $sql2="SELECT * FROM `test`.`groups`, `test`.`users` WHERE `test`.`groups`.`GUID`='$other' AND `test`.`users`.`UUID`=`test`.`groups`.`UUID`;";
    $result2=$db->query($sql2);
    $instructors="";
    for($j=0; $j<mysqli_num_rows($result2); $j++){
        if($row2=mysqli_fetch_array($result2)){
            $yes=$row2["user"];
            $instructors=$instructors.$yes."; ";
        }
    }
    $info=$row["info"];
    $title=$row['title'];
    $GUID=$row['GUID'];
    $body="<h3>$info</h3><strong>Instructors: $instructors</strong>";
    $head="$title";
    $block=array('body'=>$body, 'head'=>$head, 'key'=>$GUID);
    $object=json_encode($block);
    array_push($courses,$object);
    }
}
$jsonCourses=json_encode($courses);
echo $jsonCourses;
?>
