<?php
	error_reporting(E_ALL);
	$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";
	
	if (file_exists($_SERVER['DOCUMENT_ROOT'].$filepath)) {
 		$title=$_POST["title"];
		$link=$_POST["link"];
		$date=$_POST["date"];		
		$desc=$_POST["description"]; 	
		
		$rss = file_get_contents($_SERVER['DOCUMENT_ROOT'].$filepath);
		$dom = new DOMDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;		
		$dom->loadXML($rss);
		
		$channelList = $dom->getElementsByTagName('channel');
		$channel = $channelList->item(0);		
		$item = $dom->createElement('item');
		$item->appendChild($dom->createElement('title', $title));		
		$item->appendChild($dom->createElement('link', $link));		
		$item->appendChild($dom->createElement('date', $date));	
		$item->appendChild($dom->createElement('description', $desc));		
		$channel->appendChild($item);
		
		$rss = $dom->saveXML();	

		if(file_put_contents($_SERVER['DOCUMENT_ROOT'].$filepath, $rss))
		{
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/RSS Feeds.php');			
		}
		else
		{
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/RSS Feeds.php');				
		}
	}
	else
	{
		echo "File missing";
	}
?>
