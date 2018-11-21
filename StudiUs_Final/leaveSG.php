<html>
<body>
<?php
session_start();
$servername = "74.208.75.114";
$leaveMeetingID = $_POST["hidden"];
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

$sql = "SELECT creator FROM meetings WHERE id = '$leaveMeetingID'";
$result = mysqli_query($conn,$sql);

$creator = mysqli_fetch_assoc($result)['creator'];

if ($creator == $user){
	$sql = "DELETE FROM meetings where id ='$leaveMeetingID'";
	if (!mysqli_query($conn, $sql)){
		echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
		exit();
	}
	$sql = "SELECT id FROM engagements WHERE meeting_id = '$leaveMeetingID'";
	$result = mysqli_query($conn, $sql);
	// Iterate over result of query
	while ($current = $result->fetch_array()) {
		// Select meeting with the current id
		$sql = "DELETE FROM engagements WHERE id = '$current[0]'";
		mysqli_query($conn,$sql);
	}
}
// Select the engagement to delete using the meeting ID and user ID
$sql = "DELETE FROM engagements WHERE member_id='$userID' AND meeting_id='$leaveMeetingID'";
if (!mysqli_query($conn, $sql)){
  echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();
}
  echo "<script type = 'text/javascript'>alert('You have successfully left the group.')</script>";
	header("location: yourSG.php");

mysqli_close($conn);
?>

</body>
</html>