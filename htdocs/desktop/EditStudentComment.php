<?php
	/* Student comments page */
	session_start();
	$table="`test`.`comments`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$CUID=$_GET["CUID"];
	$_SESSION['CUID'] = $CUID;
	$SUID=$_SESSION["SUID"];
	$sql = "SELECT * FROM `test`.`comments` WHERE `SUID`='$SUID'";
	$result=$db->query($sql);
	$finally="";
	for($i=0; $i<mysqli_num_rows($result); $i++){
		if($row=mysqli_fetch_array($result)){
			if($CUID==$row["CUID"])
			{
				$_SESSION['title']=$row["title"];
				$_SESSION['text']=$row["text"];
			}
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
	<link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>Comment Page</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">
					<?php 
						echo $_SESSION['profile'];					
					?>	
				</div>
        </div>
        <div class="BluefeedsNewsPage">
            <h2>
				<?php 
					echo $_SESSION['student'] . "'s Comment Page";					
				?>				
			</h2>
				<div style="width:100%;height:85%;line-height:3em;padding:5px;overflow-x: hidden;">
					<div id="NewCommentArea" class="input-control textarea">
						<h2>Edit Comment</h2>
							<form action="commentEdit.php" method="post">
								<div class="input-control text">
									<label for="title">Title: </label>
									<?php
										echo '<input type="text" name="title" placeholder="Morning meeting" value="' . $_SESSION['title'] . '"/>';
									?>
								</div>	
								<div class="input-control text">
									<label for="comment">Comment: </label>
									<textarea name="comment" placeholder="Description"/><?php echo $_SESSION['text']; ?></textarea>
								</div>	
								<div class="input-control text">
									<label for="submit"></label>
									<input type="submit" class="big" name="submit" value="Edit Comment" style="float: left;">	
								</div>
							</form>
					</div>							
				</div>
        </div>
		<?php
			include 'menu.php';
		?>
</body>
</html>