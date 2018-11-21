<html>
<body>
<?php
session_start();
$servername = "74.208.75.114";
$newMeetingID = $_POST["hidden"];
$dbname = $_POST["myDB"];

$conn = mysqli_connect("74.208.75.114", "student02", "tacoo02", "student02");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$user = $_SESSION['user'];
// Find the user ID
$sql = "SELECT id FROM users WHERE username = '$user'";
if (!$getUserID = mysqli_query($conn, $sql)){
  echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();
}
$userID = mysqli_fetch_assoc($getUserID)['id'];

// Create the engagement using the meeting ID and user ID
$sql = "INSERT INTO engagements (member_id, meeting_id) VALUES ('$userID','$newMeetingID')";
if (!mysqli_query($conn, $sql)){
  echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();
}
  echo "<script type = 'text/javascript'>alert('Congrats! You joined a new study group! Tell your friends! :^D')</script>";
	header("location: yourSG.php");

mysqli_close($conn);
?>

</body>
</html>