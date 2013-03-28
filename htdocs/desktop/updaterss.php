<?php
	$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";
	echo $_SERVER['DOCUMENT_ROOT'].$filepath;
	if (file_exists($_SERVER['DOCUMENT_ROOT'].$filepath)) {
		$xml = simplexml_load_file('$_SERVER['DOCUMENT_ROOT'].$filepath');
 		$title=$_POST["title"];
		$link=$_POST["link"];
		$date=$_POST["date"];		
		$desc=$_POST["description"]; 	
		
		$item = $xml->addChild('item');
		$item->addChild('title', $title);
		$item->addChild('link', $link);
		$item->addChild('date', $date);	
		$item->addChild('description', $desc);
		
		if($xml->asXML('$_SERVER['DOCUMENT_ROOT'].$filepath'))
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