<?php
	/* Student comments page */
	session_start();
	$table="`test`.`comments`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno)
	{
		echo "FAILURE";
	}
	$SUID=$_SESSION["SUID"];
	$sql = "SELECT * FROM ".$table."WHERE `SUID`='$SUID' ORDER BY 'date' DESC";
	$result=$db->query($sql);
	$commentList="";
	
	/* Time Filtering */
	for($i=0; $i<mysqli_num_rows($result); $i++){
		if($row=mysqli_fetch_array($result)){
			$title=$row["title"];
			$text=$row["text"];
			$CUID=$row["CUID"];
			$date=$row["date"];
			$time=strtotime($date);
			$formattedDate=date("m/d/y",$time);
			
			$today=getDate();
			$testday = $today['mday'];
			$day=intval(date("j",$time));
			$month=intval(date("n",$time));
			$year=intval(date("Y",$time));				
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
												<a href='./EditStudentComment.php?CUID='$CUID'><button class='bg-color-green'> Edit </button></a>
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
												<a href='./EditStudentComment.php?CUID='$CUID'><button class='bg-color-green'> Edit </button></a>
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
												<a href='./EditStudentComment.php?CUID='$CUID'><button class='bg-color-green'> Edit </button></a>
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
					<a href="./StudentProfile.php">																									
						<button class="shortcut" id="TimeFilterButton">
							<span class="icon">
								<i class="icon-undo"></i>
							</span>
							<span class="label"> Back
							</span>
						</button>	
					</a>
					<a href="./StudentCommentsSplit.php">																									
						<button class="shortcut" id="TimeFilterButton">
							<span class="icon">
								<i class="icon-file-pdf"></i>
							</span>
							<span class="label"> Split screen PDF
							</span>
						</button>	
					</a>		
					<a href="./StudentCommentsTags.php">																														
						<button class="shortcut" id="TimeFilterButton">
							<span class="icon">
								<i class="icon-tag"></i>
							</span>
							<span class="label"> Search by Tags
							</span>
						</button>	
					</a>
					<a href="./StudentComments.php?filter=thisweek">																														
						<button class="shortcut" id="TimeFilterButton">
							<span class="icon">
								<i class="icon-clock"></i>
							</span>
							<span class="label"> This Week
							</span>
							<span class="badge">11</span>
						</button>
					</a>
					<a href="./StudentComments.php?filter=month">																																			
					<button class="shortcut" id="TimeFilterButton">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> This Month
						</span>
						<span class="badge">50</span>
					</button>	
					</a>
					<a href="./StudentComments.php?filter=all">																																			
					<button class="shortcut" id="TimeFilterButton">
						<span class="icon">
							<i class="icon-clock"></i>
						</span>
						<span class="label"> All
						</span>
						<span class="badge">100</span>						
					</button>	
					</a>
					<ul class="accordion dark span10" data-role="accordion" data-dynamicQuery="commentRetrieveDesktop">
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
        </div>
		<?php
			include 'menu.php';
		?>
</body>
</html>