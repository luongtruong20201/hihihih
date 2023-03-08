<?php

function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 20; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['txtEmail'];
    $pass_word = $_POST['txtPassword'];
    $random_string = RandomString();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "btth03";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `users` (`user_id`, `user_name`, `pass_word`, `user_hash`, `user_status`) VALUES (NULL, '" . $email . "', '" . $pass_word . "', '" . $random_string . "', '');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        include("Ulis/EmailServerInterface.php");
        include("ULis/EmailSender.php");
        include("Ulis/MyEmailServer.php");

        $activationEmail = "";
        // $activationEmail = "LQT";
        $emailServer = new MyEmailServer();
        $emailSender = new EmailSender($emailServer);
        $emailSender->send($email, "Activation", $activationEmail);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    
    $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="register.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="txtEmail" id="email">

        <label for="password">password</label>
        <input type="password" name="txtPassword" id="password">

        <input type="submit" value="Register">
    </form>
</body>

</html>