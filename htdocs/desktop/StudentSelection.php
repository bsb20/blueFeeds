<?php
session_start();
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$table1="`test`.`su`";
$table2="`test`.`students`";
$sql = "SELECT * FROM $table1, $table2 WHERE $table1.`SUID`=$table2.`SUID` AND $table1.`UUID`='$UUID';";
$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
$html="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    $SUID=$row["SUID"];
	$profilelink="./StudentProfile.php?SUID=" . $SUID;
    }
	$html.=           "<li>
							<a href='$profilelink'>
								<div class='icon'>
									<img src='$photo'/>
								</div>
								<div class='data'>
									<h4>$name</h4>
										<p id='TileFont'>
											$title, $spec
										</p>
										<a href='$email'>$email</a>
								</div>						
							</a>
						</li>";
}
$_SESSION['studentpage'] = $html;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
	<link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>Student Selection</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">
					<?php
						echo $_SESSION['profile'];
					?>								
				</div>
        </div>
        <div class="StudentSelectionPage">
			<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;">
				<ul class="listview fluid">
					<?php
						echo $_SESSION['studentpage'];
					?>
				</ul>
			</div>
        </div>
        <div class="MenuPage">
			<ul id="MenuOptions" style="padding-top: 5%">
            	<li><a href="./LandingPage.php"><button class="big" id="MenuButtons">Home<i class="icon-home icon-small"></i></button></a></li>			
            	<li><a href="./Appointments.php"><button class="big" id="MenuButtons">Appointments<i class="icon-clipboard-2 icon-small"></i></button></a></li>
                <li><a href="./StudentSelection.php"><button class="big" id="MenuButtons">Students<i class="icon-user-2 icon-small"></i></button></a></li>
                <li><a href="./RSS Feeds.php"><button class="big" id="MenuButtons">RSS Feeds<i class="icon-feed icon-small"></i></button></a></li>
                <li><a href="./Add Appointment.php"><button class="big" id="MenuButtons">Schedule Appointment<i class="icon-clipboard icon-small"></i></button></a></li>
                <li><a href="./Add Student.php"><button class="big" id="MenuButtons">Add New Students<i class="icon-plus-2 icon-small"></i></button></a></li>               
            </ul>                   
        </div>
    </div>​
</body>
</html>

