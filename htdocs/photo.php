<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
if (!empty($_FILES))
{
echo $_FILES['photo']['error'];
session_start();
$table="`test`.`students`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$fileExtension=$_SESSION["SUID"];
    // PATH TO THE DIRECTORY WHERE FILES UPLOADS
    $file_src   =   'uploads/'.$_FILES['photo']['name'];
    // FUNCTION TO UPLOAD THE FILE
    if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$fileExtension.jpg")):
    // SHOW THE SUCCESS MESSAGE AFTER THE MOVE - NO VISIBLE CHANGE
    echo 'Your file have been uploaded sucessfuly';
    else:
    // SHOW ERROR MESSAGE
    echo 'Error';
    endif;
    
$sql = "UPDATE $table SET `photo`='uploads/$fileExtension.jpg' WHERE `SUID`='$fileExtension';";
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
<meta http-equiv="REFRESH" content="0;url=http://bluefeeds.cs.duke.edu/ui_branch/blueFeeds/htdocs/blueFeeds.html">
</head>
</html>
