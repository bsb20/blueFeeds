<?php
	session_start();
	$table="`test`.`comments`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$SUID=$_SESSION["SUID"];
	$sql = "SELECT * FROM ".$table."WHERE `SUID`='$SUID' ORDER BY 'date' DESC";
	$result=$db->query($sql);
	$commentList="";
	for($i=0; $i<mysqli_num_rows($result); $i++){
		if($row=mysqli_fetch_array($result)){
			$title=$row["title"];
			$text=$row["text"];
			$CUID=$row["CUID"];
			$date=$row["date"];
			$time=strtotime($date);
			$formattedDate=date("m/d/y",$time);
		}
		$commentList.="						<li>
								<a href='#'>$title</a>
								<div>
									$text
									<p>
										$formattedDate
									</p>
								</div>
							</li>";
	}
	$_SESSION["commentList"]=$commentList;	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
	<link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
<!--     <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> -->    

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header>
	<div>
		<h1 style="display: inline-block">
			Comment Page
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
        <div class="StudentCommentsSplit">
            <h2>
				<?php 
					echo $_SESSION['student'] . "'s Comment Page";					
				?>				
			</h2>
				<div style="width:50%;height:85%;line-height:3em;padding:5px;overflow-x: hidden; float: left;">
					<a href="./StudentComments.php">																									
						<button class="shortcut" id="TimeFilterButtonSplit">
							<span class="icon">
								<i class="icon-undo"></i>
							</span>
							<span class="label"> Back
							</span>
						</button>	
					</a>
					<button class="shortcut" id="TimeFilterButtonSplit">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> This Week
						</span>
						<span class="badge">11</span>
					</button>
					<button class="shortcut" id="TimeFilterButtonSplit">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> This Month
						</span>
						<span class="badge">50</span>
					</button>	
					<button class="shortcut" id="TimeFilterButtonSplit">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> All Time
						</span>
						<span class="badge">100</span>						
					</button>					
					<ul class="accordion dark span10" id="Accordion" data-role="accordion" data-dynamicQuery="commentRetrieveDesktop">
						<?php 
							echo $_SESSION['commentList'];					
						?>						
					</ul>
					<div id="NewCommentArea" class="input-control textarea">
						<h2>New Comment</h2>			
							<form action="commentSubmit.php" method="post">
								<div class="input-control text">
									<label for="title">Title: </label>
									<input type="text" name="title" placeholder="Morning meeting"/>
								</div>	
								<div class="input-control text">
									<label for="comment">Comment: </label>
									<textarea name="comment" placeholder="Description"/></textarea>
								</div>	
								<div class="input-control text">
									<label for="submit"></label>
									<input type="submit" class="big" name="submit" value="Add Comment" style="float: left;">	
								</div>
							</form>
					</div>							
				</div>
				<iframe style="float: left; padding-left: 2%; width:50%; height:85%;" src="http://bluefeeds.cs.duke.edu/home/htdocs/desktop/uploadsPDF/Fillable_PDF_Sample_from_TheWebJockeys_vC5.pdf" frameborder="0"></iframe>								
        </div>
		<?php
			include 'menu.php';
		?>
</body>
</html>