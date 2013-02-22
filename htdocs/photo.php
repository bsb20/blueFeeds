<?php
if (!empty($_FILES))
{
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
}
?>
<html>
<head>
<meta http-equiv="REFRESH" content="0;url=https://192.168.1.127/blueFeeds.html">
</head>
</html>