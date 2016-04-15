<?php
$dbh = new PDO('mysql:host=localhost;dbname=subscription_project', 'root', 'root');
$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Subscription</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<h2>Sites to Subscribe to:</h2>


<div class="aboutUl">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</div>

</body>
</html>

