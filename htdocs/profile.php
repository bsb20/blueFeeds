<?php
session_start();
$table="`test`.`students`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM ".$table." WHERE `SUID`='".$SUID."';";
$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
if($row=mysqli_fetch_array($result)){
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    }
$result=           " <li class='dynamicProfile' data-dynamicContent='profile' style='display:none;'>
                    <h1>$name</h1>
                    <img src='$photo' class='imgTile'alt='Turk'/>
                    <p>$title, $spec</p>
                </a>
            </li>";
echo $result;
?>