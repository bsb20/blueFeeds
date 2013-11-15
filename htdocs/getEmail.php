<?php
/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
Retrieves information to populate a pre-written email to send an appointment reminder.
Joins current student ID to current appointment ID and retirves user info from current user ID.
Populates email based on student email address and user name, uses appointment info in email body
*/
include("initialize.php");
$table="`test`.`students`";
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
    $end=$row["end"];
    $formattedDay=date("l, F j, Y", strtotime($date));
    $formattedTime=date("h:i A", strtotime($date));
    $formattedEndTime=date("h:i A", strtotime($end));
    }
$list="<li data-dynamicContent='getEmail' data-theme='a' style='display:none;'>
                    <h1>$student</h1>
                    <img src='$photo' class='imgTile'alt='Turk'/>
                    <p>$formattedDay, $formattedTime</p>
                </a>
            </li>";
/*
This is the text for the prewritten email.  Must be written as html encoded string.  Feel free to change this!
*/
$list.= "<li data-theme='b' data-dynamicContent='getEmail'><a id='sendReminder'  href='mailto:$email?subject=Meeting&body=
$student,%0A%20This%20is%20a%20reminder%20for%20our%20meeting%0AWhen:%20$formattedDay%20$formattedTime-$formattedEndTime%0A-$user
'>Send Reminder</a></li>";
echo $list;
?>
