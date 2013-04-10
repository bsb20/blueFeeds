<?php
	session_start();
	$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";
	$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$filepath);
	$rss = "";
	foreach($xml->item as $item)
	{
		$title = $item->title;
		$link = $item->link;
		$date = $item->date;
		$desc = $item->description;
		
		$rss.="						<li>
						<a>$title</a>
						<div>
							<h3>$title</h3>
							$desc
							<p>
								$date
							</p>
							<a href=$link><button class='bg-color-blueLight'> Link </button></a>	
							<a href='#'><button class='bg-color-green'> Edit </button></a>
							<a href='#'><button class='bg-color-red'> Delete </button></a>							
						</div>
					</li>";
	}
	$_SESSION['rss'] = $rss;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>RSS Feeds</h1></header>
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
            <h2>Bluefeeds Newsletter</h2>
				<div style="width:100%;height:85%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
					<ul class="accordion dark span10" style="width: 50%; float: left; padding-top: 2%;" data-role="accordion">
						<?php
							echo $_SESSION['rss'];
						?>							
					</ul>
					<form style="float: left;" action="updaterss.php" method="post">
						<div class="input-control text">
							<label for="title">Title: </label>					
							<input type="text" name="title" placeholder="(i.e. The Supreme Court's Marriage Problem)"/>
						</div>
						<div class="input-control text">
							<label for="link">Link: </label>					
							<input type="text" name="link" placeholder="http://blog.sfgate.com/opinionshop/2013/03/27/the-supreme-courts-marriage-problem/"/>
						</div>					
						<div class="input-control text">
							<label for="description">Description: </label>					
							<input type="text" name="description" placeholder="(i.e. Description)"/>
						</div>
						<div class="input-control text">
							<label for="date">Date: </label>					
							<input type="text" name="date" placeholder="(i.e. 3/28/13)"/>
						</div>	
						<div style="padding-top: 3%" class="input">								
							<label for="updaterss"></label>
						<input type="submit" name="updaterss" value="Publish RSS" class="big">	
						</div>
					</form>
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
