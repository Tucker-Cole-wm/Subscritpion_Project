<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>

<body>
<div class="aboutUl">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</div>
<?php
require_once('connect.php');
function login($conn) {
    setcookie('token', "", 0, "/");
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $sql = 'SELECT * FROM user WHERE email = ? AND password = ?';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($email, $password))) {
        $valid = false;
        while ($row = $stmt->fetch()) {
            $valid = true;
            $token = generateToken();
            $sql = 'UPDATE user SET token = ? WHERE email = ?';
            $stmt1 = $conn->prepare($sql);
            if ($stmt1->execute(array($token, $email))) {
                setcookie('token', $token, 0, "/");
                echo '<p class="lazyEchoes">Login Successful</p>';
            }
        }
        if(!$valid) {
            echo 'Email or Password Incorrect';
        }
    }
}

function generateToken() {
    $date = date(DATE_RFC2822);
    $rand = rand();
    return sha1($date.$rand);
}
if(isset($_POST['login'])) {
    login($dbh);
}
?>
<div class="login">
    <h3>Login</h3>
    <form method="post" action="">
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" name="login" value="LOGIN"/>
    </form>

    <a href="register.php">Register Here</a>
</div>
</body>
</html>