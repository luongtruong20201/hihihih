<?php
include("Ulis/EmailServerInterface.php");
include("ULis/EmailSender.php");
include("Ulis/MyEmailServer.php");

$emailServer = new MyEmailServer();
$emailSender = new EmailSender($emailServer);
$emailSender->send("quynh01.s9traveldn@gmail.com", "Test Email", "This is a test email.");
?>