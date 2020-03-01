<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title><?= $sProjectTitle ?? 'Simple Project' ?></title>
</head>
<body>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="flight-track.php">Track your Flight</a></li>
        <li><a href="">About Us</a></li>
        <li><a href="">Contact Us</a></li>
        <?php if(!empty($_SESSION['email'])){ ?>
            <li><a href="flights.php">Flights</a></li>
            <li><a><?= 'welcome '.$_SESSION['email']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
           <li><a href="login.php">Login</a></li>
        <?php } ?>
    </ul>