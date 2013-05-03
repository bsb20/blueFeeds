<?php
	/* Student comments page with a collated annotatable pdf on the right */
	session_start();
	$table="`test`.`comments`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$SUID=$_SESSION["SUID"];
	$GUID=$_SESSION["GUID"];	
	$sql = "SELECT * FROM ".$table."WHERE `SUID`='$SUID' AND `GUID`='$GUID' ORDER BY 'date' DESC";
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
		
		/* Sets default filtering to this week if filter is empty */
		if(empty($_GET))
		{
			$timeframe="thisweek";
		}
		else
		{
			$timeframe=$_GET["filter"];
		}		
		
		/* Populates student comments by filter */
		switch ($timeframe)
		{
			case "thisweek":
				$beginweek = $today['mday'] - $today['mday']%7;
				$endweek = $today['mday']+7 - ($today['mday']+7)%7;		
				if($beginweek <= $day and $day <= $endweek and $today['mon']==$month and $today['year']==$year)
				{
					$commentList.="						<li>
											<a href='#'>$title</a>
											<div>
												$text
												<p>
													$formattedDate
												</p>
												<a href='./EditStudentComment.php?CUID=$CUID'><button class='bg-color-green'> Edit </button></a>
												<a href='./commentDelete.php?CUID=$CUID'><button class='bg-color-red'> Delete </button></a>													
											</div>
										</li>";
				}
				break;
			case "month":
				if($today['mon']==$month and $today['year']==$year)
				{
					$commentList.="						<li>
											<a href='#'>$title</a>
											<div>
												$text
												<p>
													$formattedDate
												</p>
												<a href='./EditStudentComment.php?CUID=$CUID'><button class='bg-color-green'> Edit </button></a>
												<a href='./commentDelete.php?CUID=$CUID'><button class='bg-color-red'> Delete </button></a>													
											</div>
										</li>";
				}				
				break;
			case "all":
				if($today['year']==$year)
				{
					$commentList.="						<li>
											<a href='#'>$title</a>
											<div>
												$text
												<p>
													$formattedDate
												</p>
												<a href='./EditStudentComment.php?CUID=$CUID'><button class='bg-color-green'> Edit </button></a>
												<a href='./commentDelete.php?CUID=$CUID'><button class='bg-color-red'> Delete </button></a>													
											</div>
										</li>";
				}				
				break;
		}
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
        <div class="StudentCommentsSplit">
            <h2>
				<?php 
					echo $_SESSION['student'] . "'s Comment Page";					
				?>				
			</h2>
				<div style="width:50%;height:85%;line-height:3em;padding:1.5px;overflow-x: hidden; float: left;">
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
					</button>
					<button class="shortcut" id="TimeFilterButtonSplit">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> This Month
						</span>
					</button>	
					<button class="shortcut" id="TimeFilterButtonSplit">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> All Time
						</span>
					</button>					
					<ul class="accordion dark span10" id="Accordion" data-role="accordion">
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
								<label for="instructors">Release to Instructors</label>
									<select name="instructors" id="instructors">
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>	
								<label for="students">Release to Students</label>
									<select name="students" id="students">
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</br>
								<?php
									include 'showUserTags.php';
								?>
								<div class="input-control text">
									<label for="submit"></label>
									<input type="submit" class="big" name="submit" value="Add Comment" style="float: left;">	
								</div>
							</form>
					</div>							
				</div>
				<iframe style="float: left; padding-left: 2%; width:48%; height:85%;" src="https://crocodoc.com/view/lwFn2zXvICaoEZNz_ctLCTSF1iruxNyvt9l_OonmxdgG2mH7y8T_oATbLjVNW4zzzO_X6tOQRtrSZnjkWydd-QYHcfzzDWVB7QGO7q1r6Oj6sXuFDXWGmBow5k2dLDl7GDeneSrbnCi5FnOl1ljwsw1QiTMhqBQ1iGTEluxQ_qq6vBJVeIdqgRzbePYa6x2rJnYYR2pH0wwiVreg9Bxzaw" frameborder="0"></iframe>	
				
        </div>
</body>
</html>
