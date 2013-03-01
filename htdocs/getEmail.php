<?php
session_start();
$table="`test`.`students`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$UUID=$_SESSION["UUID"];
$AUID=$_SESSION["AUID"];
$sql = "SELECT * FROM ".$table." WHERE `SUID`='".$SUID."';";
$result=$db->query($sql);
$student;
$email;
$photo;
if($row=mysqli_fetch_array($result)){
    $student=$row["user"];
    $email=$row["email"];
    $photo=$row["photo"];
    }
$table="`test`.`users`";
$sql = "SELECT * FROM ".$table." WHERE `UUID`='".$UUID."';";
$result=$db->query($sql);
$user;
if($row=mysqli_fetch_array($result)){
    $user=$row["user"];
    }
$table="`test`.`appointments`";
$sql = "SELECT * FROM ".$table." WHERE `AUID`='".$AUID."';";
$result=$db->query($sql);
$formattedDay;
$formattedTime;
if($row=mysqli_fetch_array($result)){
    $date=$row['start'];
    $formattedDay=date("m/d/y", strtotime($date));
    $formattedTime=date("h:i a", strtotime($date));
    }
$list="<li data-dynamicContent='getEmail' data-theme='a' style='display:none;'>
                    <h1>$student</h1>
                    <img src='$photo' class='imgTile'alt='Turk'/>
                    <p>$formattedDay, $formattedTime</p>
                </a>
            </li>";

$list.= "<li data-theme='b' data-dynamicContent='getEmail'><a id='sendReminder'  href='mailto:$email?subject=Meeting&body=
$student,%0A%20This%20is%20a%20reminder%20for%20our%20meeting%20on%20$formattedDay%20at%20$formattedTime.%0A-$user
'>Send Reminder</a></li>";
echo $list;
?>