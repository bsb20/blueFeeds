<?php
function mailer($address,$content,$CC){
require_once "Mail.php";
 $from = "BlueFeeds Auto-Mailer <bluefeedsmail@gmail.com>";
 $to = $address;
 $subject = "Notification from BlueFeeds!";
 $body = $content;
 
 $host = "smtp.gmail.com";
 $username = "bluefeedsmail";
 $password = "dukebluedevils";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'CC' => $CC,
   'Bcc' => "bluefeedsmail@gmail.com",
   'Subject' => $subject);

 $smtp =& Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password,
  ));

$mail = $smtp->send($to, $headers, $body);

}
 ?>
