<?php
/**
 * Created by PhpStorm.
 * User: session2
 * Date: 2/10/16
 * Time: 4:16 PM
 */

$user = 'root';
$pass = 'root';
$name = 'reservation_project';
$dbh = null;
try {
    $dbh = new PDO('mysql:host=localhost;dbname='.$name, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>