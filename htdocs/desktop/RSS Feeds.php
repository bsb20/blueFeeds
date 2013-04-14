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
            <h2>Bluefeeds Newsfeed</h2>
				<div style="width:100%;height:85%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
					<ul class="accordion dark span10" data-role="accordion">
						<?php
							echo $_SESSION['rss'];
						?>						
					</ul>
					<a href="./RSSFeedsSplit.php"><button class="big">Publish RSS</button></a>				
				</div>
        </div>
		<?php
			include 'menu.php';
		?>
    </div>​
</body>
</html>

