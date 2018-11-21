<html>
<body>
<?php
session_start();
$servername = "74.208.75.114";
$groupName = $_POST["groupName"];
$groupFocus= $_POST["groupFocus"];
$groupLocation = $_POST["groupLocation"];
$groupTime = $_POST["groupTime"];
$groupDate = $_POST["groupDate"];
$groupMembers = $_POST["groupMembers"];
$groupCategory = $_POST["groupCategory"];
$dbname = $_POST["myDB"];

$conn = mysqli_connect("74.208.75.114", "student02", "tacoo02", "student02");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$user = $_SESSION['user'];
// Create group and insert group creator into their group
$sql = "INSERT INTO meetings (name, focus, location, time, date, category, creator) VALUES ('$groupName', '$groupFocus', '$groupLocation', '$groupTime', '$groupDate', '$groupCategory', '$user')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Find the user ID
$sql = "SELECT id FROM users WHERE username = '$user'";
if (!$getUserID = mysqli_query($conn, $sql)){
  echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();
}
$userID = mysqli_fetch_assoc($getUserID)['id'];

// Find the meeting ID that was just created
$sql = "SELECT id FROM meetings WHERE creator = '$user' and name = '$groupName' and focus = '$groupFocus'";
if (!$getMeetingID = mysqli_query($conn, $sql)){
  echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();
}
$meetingID = mysqli_fetch_assoc($getMeetingID)['id'];
// Create the engagement using the meeting ID and user ID
$sql = "INSERT INTO engagements (member_id, meeting_id) VALUES ('$userID','$meetingID')";
if (!mysqli_query($conn, $sql)){
  echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();
}
  echo "<script type = 'text/javascript'>alert('Congrats! You created a new study group! Tell your friends! :^D')</script>";
	header("location: yourSG.php");

mysqli_close($conn);
?>

</body>
</html>