<?php

/*
This php script submit can be used to verify database connection status. If connected, the script will output post info. 
*/

$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
echo $db->host_info."\n";

?>
