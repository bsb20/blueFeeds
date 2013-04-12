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
	if($photo=="./uploads/nophoto.gif")
	{
		$photo = "http://bluefeeds.cs.duke.edu/home/htdocs/uploads/nophoto.gif";
	}
	else
	{
		$photo = "http://bluefeeds.cs.duke.edu/home/htdocs/" . $photo;
	}
    $title=$row["title"];
    $spec=$row["speciality"];
    $SUID=$row["SUID"];
	$profilelink="./StudentProfile.php?SUID=" . $SUID;
    }
	$html.=           "<li>
							<a href='$profilelink'>
								<div class='icon'>
									<img src=$photo>
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
<header>
	<div>
		<h1 style="display: inline-block">
			Student Selection
		</h1>		
		<div style="display: inline-block; padding: 1.5%; float: right; height: 65px; width: 50%; overflow-y: scroll; overflow-x: hidden;">
			<?php
				echo $_SESSION['buttons'];
			?>
		</div>
	</div>
</header>
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
		<?php
			include 'menu.php';
		?>
    </div>​
</body>
</html>

