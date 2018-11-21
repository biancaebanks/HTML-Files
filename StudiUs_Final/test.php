<html>
<body>

<?php
session_start();
echo "<script type='text/javascript'>console.log('Starting PHP')</script>";
$servername = "74.208.75.114";
$username = "student02";
$password = "tacoo02";
$dbname = "student02";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected!";
echo $_SESSION['user'];
$username = $_SESSION['user'];
$sql ="SELECT id FROM users WHERE username = '$username'";
$userID = mysqli_query($conn,$sql);
echo "User found";

?>

</body>
</html>