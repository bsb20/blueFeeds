<?php
  	/* Deletes the xml file with a specified title within /desktop/bluefeedsTest.xml */
	/* Takes the following values: title */
	session_start();
	$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";

	if (file_exists($_SERVER['DOCUMENT_ROOT'].$filepath)) {
		$rss = file_get_contents($_SERVER['DOCUMENT_ROOT'].$filepath);
		$dom = new DOMDocument();	
		$dom->loadXML($rss);
		
		$items = $dom->getElementsByTagName('item');
		foreach($items as $node)
		{
			$title = $node->title;
			if($title == $_GET['title'])
			{
				$domnode=dom_import_simplexml($node);
				$domnode->parentNode->removeChild($node);			
			}
		}
		
		$rss = $dom->saveXML();	
		$bytes = file_put_contents($_SERVER['DOCUMENT_ROOT'].$filepath, $rss);
		if($bytes)
		{
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/RSS Feeds.php?success=' . $bytes);			
		}
		else
		{
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/RSS Feeds.php?failure=' . $bytes);				
		}
	}
	else
	{
		echo "File missing";
	}
?>
