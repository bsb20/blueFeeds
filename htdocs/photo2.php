<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang, Brett Cadigan
This php script submits handles all photo-based applications within the app. Specifically, it allows the user (UUID) to
access the phones camera and upload profile pictures for themselves (and possibly for students).
*/

include("initialize.php");
if (!empty($_FILES))
{
echo $_FILES['photo2']['error'].": ";
$table="`test`.`users`";
$fileExtension=$_SESSION["UUID"];
    // PATH TO THE DIRECTORY WHERE FILES UPLOADS
    $file_src   =   'uploads/'.$_FILES['photo2']['name'];
    // FUNCTION TO UPLOAD THE FILE
    if(move_uploaded_file($_FILES['photo2']['tmp_name'], "uploads/$fileExtension.jpg")):
    // SHOW THE SUCCESS MESSAGE AFTER THE MOVE - NO VISIBLE CHANGE
    echo 'Your file has been uploaded successfully';
    else:
    // SHOW ERROR MESSAGE
    echo 'Error';
    endif;
    
$sql = "UPDATE $table SET `photo`='uploads/$fileExtension.jpg' WHERE `UUID`='$fileExtension';";
$result=$db->query($sql);
chmod("uploads/$fileExtension.jpg",0766);
$exif=exif_read_data("uploads/$fileExtension.jpg",0,true);
$orient=$exif["IFD0"]["Orientation"];
switch($orient){
	case 3:
	     shell_exec("bash uploads/rotate.sh uploads/$fileExtension.jpg 180");
	break;
	case 6:
	     shell_exec("bash uploads/rotate.sh uploads/$fileExtension.jpg 90");
	break;
	}
}
?>
<html>
<head>
<meta http-equiv="REFRESH" content="0;url=blueFeeds.html#courses">
//http://bluefeeds.cs.duke.edu/ui_branch/blueFeeds/htdocs/blueFeeds.html">
</head>
</html>
