<html>
<body>

<?php
session_start();
$school = $_POST["school"];
$email= $_POST["email"];
$name = $_POST["name"];
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$pwd2 = $_POST["pwd2"];
$conn = mysqli_connect("74.208.75.114", "student02", "tacoo02", "student02");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

$_SESSION['user'] = $username;
$hash = crypt($pwd, '$2a$07$usesomesillystringforsalt$');
// TODO: Check if username already exists
$sql = "INSERT INTO users (name, email, school, username, pwd) VALUES ('$name', '$email', '$school', '$username', '$hash')";

if (mysqli_query($conn, $sql)) {
	
	header("Location: main.html");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
?>

</body>
</html>