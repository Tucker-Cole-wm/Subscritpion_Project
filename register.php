<?php
require_once('connect.php');
function register($conn) {
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $first_name = $_POST['name_first'];
    $last_name = $_POST['name_last'];
    $address = $_POST['address'];
    $token = generateToken();
    $sql = 'INSERT INTO user (password, email, first_name, last_name, address, token) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    try {
        if ($stmt->execute(array($password, $email, $first_name, $last_name, $address, $token))) {
            setcookie('token', $token, 0, "/");
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        //echo 'Email already registered.';
    }
}
function generateToken() {
    $date = date(DATE_RFC2822);
    $rand = rand();
    return sha1($date.$rand);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<?php
if(isset($_POST['register'])) {
    register($dbh);
}
?>
<h2>Reservation</h2>
<form method="post" action="">
    <input type="text" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password"/>
    <input type="text" name="name_first" placeholder="First Name"/>
    <input type="text" name="name_last" placeholder="Last Name"/>
    <input type="text" name="address" placeholder="Address"/>
    <input type="submit" name="register" placeholder="Register"/>
</form>
</body>
</html>