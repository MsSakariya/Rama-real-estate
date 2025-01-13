<?php
     $randomNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);


//require_once ('vendor/autoload.php'); // if you use Composer
require_once('ultramsg.class.php'); // if you download ultramsg.class.php
    
$token="5v7lfgmjc70cnugk"; // Ultramsg.com token
$instance_id="instance57229"; // Ultramsg.com instance id
$client = new UltraMsg\WhatsAppApi($token,$instance_id);
    
// $to="9725419289"; 
// $body="$randomNumber"; 
// $api=$client->sendChatMessage($to,$body);
// if($api)
// {
//      echo"<script>alert('Message successfully sent')</script>";
// }
?> 
