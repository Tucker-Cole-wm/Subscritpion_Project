<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Subscription</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<h2>Guitar Wars - Add Your High Score</h2>
<?php



$dbh = new PDO('mysql:host=localhost;dbname=subscription_project', 'root', 'root');
$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

?>
<hr/>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="32768"/>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>"/>
    <br/>
    <label for="score">Score:</label>
    <input type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>"/>
    <br/>
    <label for="screenshot">Screen shot:</label>
    <input type="file" id="screenshot" name="screenshot"/>
    <hr/>
    <input type="submit" value="Add" name="submit"/>
</form>
</body>
</html>

