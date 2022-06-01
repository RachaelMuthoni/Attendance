<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = 'localhost';
$db   = 'dbattendance';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $mysqli = mysqli_connect($host, $user, $pass, $db);
    mysqli_set_charset($mysqli, $charset);
} catch (\mysqli_sql_exception $e) {
     throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
}

if(isset($_POST['submit'])){
	$barcode = $_POST['barcode'];
$query = mysqli_query($mysqli, "INSERT INTO barcode VALUES ('','$barcode',now())");
header("LOCATION:barcode.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="barcode.php">
	<input type="text" name="barcode">
	<input type="submit" name="submit">

</form>
</body>
</html>