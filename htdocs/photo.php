<?php
if (!empty($_FILES))
{
    // PATH TO THE DIRECTORY WHERE FILES UPLOADS
    $file_src   =   'uploads/'.$_FILES['photo']['name'];
    // FUNCTION TO UPLOAD THE FILE
    if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/testPhoto.jpg")):
    // SHOW THE SUCCESS MESSAGE AFTER THE MOVE - NO VISIBLE CHANGE
    echo 'Your file have been uploaded sucessfuly';
    else:
    // SHOW ERROR MESSAGE
    echo 'Error';
    endif;

}
?>