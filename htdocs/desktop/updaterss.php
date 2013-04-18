<?php
	error_reporting(E_ALL);
	$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";
	
	if (file_exists($_SERVER['DOCUMENT_ROOT'].$filepath)) {
		$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$filepath);
 		$title=$_POST["title"];
		$link=$_POST["link"];
		$date=$_POST["date"];		
		$desc=$_POST["description"]; 	
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		
		$channel = $dom->getElementsByTagName('channel');
		$item = $dom->createElement('item');
		$item->appendChild($dom->createElement('title', $title));		
		$item->appendChild($dom->createElement('link', $link));		
		$item->appendChild($dom->createElement('date', $date));	
		$item->appendChild($dom->createElement('description', $desc));		
		$channel->appendChild($item);
		
		/*
		$item->addChild('title', $title);
		$item->addChild('link', $link);
		$item->addChild('date', $date);	
		$item->addChild('description', $desc);
		*/
		
		$dom->saveXML();	
		$dom->save($_SERVER['DOCUMENT_ROOT'].$filepath);
		
		if($xml->asXML($_SERVER['DOCUMENT_ROOT'].$filepath))
		{
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/RSS Feeds.php');
			/* echo "Success";
			print_r($xml); */
		}
		else
		{	
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/RSS Feeds.php');		
			/* echo "Failure"; */
		}
	}
	else
	{
		echo "File missing";
	}
?>