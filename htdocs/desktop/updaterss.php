<?php
	echo $_SERVER['DOCUMENT_ROOT'];
	if (file_exists('http://bluefeeds.cs.duke.edu/home/htdocs/desktop/bluefeedsTest.xml')) {
		$xml = simplexml_load_file('http://bluefeeds.cs.duke.edu/home/htdocs/desktop/bluefeedsTest.xml');
 		$title=$_POST["title"];
		$link=$_POST["link"];
		$date=$_POST["date"];		
		$desc=$_POST["description"]; 	
		
		$item = $xml->addChild('item');
		$item->addChild('title', $title);
		$item->addChild('link', $link);
		$item->addChild('date', $date);	
		$item->addChild('description', $desc);
		
		if($xml->asXML('http://bluefeeds.cs.duke.edu/home/htdocs/desktop/bluefeedsTest.xml'))
		{
			echo "Success";
			print_r($xml);			
		}
		else
		{
			echo "Failure";
		}
/* 		echo $sxe->asXML();		 */			
	}
	else
	{
		echo "File missing";
	}
?>