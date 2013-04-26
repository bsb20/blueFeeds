<?php
	/* The bluefeeds help page */
	session_start();
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
<header>
	<div>
		<h1 style="display: inline-block">
			BlueFeeds Newsletter
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
        <div class="BluefeedsNewsPage">
            <h2>Bluefeeds Frequently Asked Questions</h2>
			<div style="width:100%;height:85%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
				<h3>Below is a list of helpful video demonstrations of how to use the Bluefeeds Webpage</h3>
				<ul class="accordion dark span10" style="width: 50%; float: left; padding-top: 2%;" data-role="accordion">
					<li>
						<h4>Logging into Bluefeeds</h4>
						<iframe style="float: left;" width="560" height="315" src="http://www.youtube.com/embed/gbe07HeAFFM" frameborder="0" allowfullscreen></iframe>						
					</li>
					<li>
						<h4>Appointments in Bluefeeds<h4>
						<iframe width="560" height="315" src="http://www.youtube.com/embed/WYkD1RlPA7k" frameborder="0" allowfullscreen></iframe>
					</li>
					<li>
						<h4>Publishing for the Bluefeeds Newsletter<h4>
						<iframe width="560" height="315" src="http://www.youtube.com/embed/r1G7QQdrI0Y" frameborder="0" allowfullscreen></iframe>
					</li>	
					<li>
						<h4>Students and Courses</h4>
						<iframe width="560" height="315" src="http://www.youtube.com/embed/3DRxHN92JUw" frameborder="0" allowfullscreen></iframe>						
					</li>
					<li>
						<h4>Providing Feedback</h4>
						<iframe width="560" height="315" src="http://www.youtube.com/embed/faGMf3fZDO8" frameborder="0" allowfullscreen></iframe>						
						
					</li>
					<li>
						<h4>Creating tags and tagging comments</h4>
						<iframe width="560" height="315" src="http://www.youtube.com/embed/9OYmVRqRjMA" frameborder="0" allowfullscreen></iframe>						
					</li>
				</ul>
			</div>

        </div>
		<?php
			include 'menu.php';
		?>
    </div>​
</body>
</html>

