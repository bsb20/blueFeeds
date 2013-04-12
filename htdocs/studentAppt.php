<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`students`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$UUID=$_SESSION["UUID"];
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
$final=           " <li class='dynamicProfile' data-dynamicContent='studentAppt' style='display:none;'>
                    <h1>$name</h1>
                    <img src='$photo' class='imgTile'alt='Turk'/>
                    <p>$title, $spec</p>
                </a>
            </li>";
$table="`test`.`appointments`";
$sql = "SELECT * FROM ".$table." WHERE `SUID`='$SUID' AND `UUID`='$UUID' ORDER BY `start`;";
$result=$db->query($sql);
for($i=0; $i<mysqli_num_rows($result); $i++){
    if($row=mysqli_fetch_array($result)){
        $past=strtotime($row['start'])>time() || $row['isWeekly'] ? "a" : "d";
        $pastMessage= strtotime($row['start'])>time() || $row['isWeekly'] ? "":"Past Meeting Time";
        $duration=$row['duration'];
        $start=strtotime($row['start']);
        $formattedStart=date("g:i",$start);
        $end=date("g:i", strtotime($row['end']));
        $weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);
        $title=$row['title'];
        $loc=$row['location'];
        $AUID=$row["AUID"];
        $final.=" <li data-theme='$past' data-dynamicContent='studentAppt'><a href='#reminder'>
                    <h1>$title</h1>
                    <p><strong>$loc</strong></p>
                    <p>$weekly $formattedStart-$end</p>
                    <p class='ui-li-aside'><strong>$pastMessage</strong></p>
                </a>
                <input type='text' id='no' style='display:none' value='$AUID'>
                <input type='text' id='no2' value='$SUID'>
            </li>";
    }
}
echo $final;
?>
