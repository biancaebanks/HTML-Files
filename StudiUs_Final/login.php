<html>
<body>

<?php
session_start();
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$db = "student02";


$conn = mysqli_connect("74.208.75.114", "student02", "tacoo02", "student02");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$_SESSION['user'] = $username;

$pwd = crypt($pwd, '$2a$07$usesomesillystringforsalt$');
$sql = "SELECT id FROM users WHERE username = '$username' and pwd = '$pwd'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
$count = mysqli_num_rows($result);
      
// If result matched $username and $pwd, table row must be 1 row

		
if($count == 1) {
         
	 header("location: main.html");
}else {
	echo "Your Username or Password is invalid";
}




mysqli_close($conn);
?>

</body>
</html>