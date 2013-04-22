<?php
	session_start();
	/* Student Comments Search Page for Tags */
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
					echo $_SESSION['student'] . "'s Comment Search Page";					
				?>				
			</h2>
			<div style="width:100%;height:85%;line-height:3em;padding:1.5px;overflow-x: hidden; float: left;">
				<form action="tagRetrieve.php" method="post">
					<label for="filter"></label>
					<input name="filter" id="filter" type="text" size="31" />
					<input type="submit" value="Search" />
				</form>	
				<ul class="accordion dark span10" data-role="accordion">
					<?php 
						echo $_SESSION['commentList'];					
					?>						
				</ul>		
			</div>
		</div>
		<?php
			include 'menu.php';
		?>		
	</div>
</body>
</html>