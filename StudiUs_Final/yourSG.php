<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Study Group</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background-color:light-grey;">
		

	<div class="container-fluid">

		<h1>Your Study Group</h1>
		<div class="row" style="padding:10px;">
			<div class="border border-dark col-sm-8" id = "yourSGs" style="padding:5px;">
				
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

			$username = $_SESSION['user'];
			$sql ="SELECT id FROM users WHERE username = '$username'";
			$userIDResult = mysqli_query($conn,$sql);

			$userID = mysqli_fetch_assoc($userIDResult)['id'];

			$sql = "SELECT meeting_id FROM engagements WHERE member_id = '$userID'";

			$meetingIDsResult = mysqli_query($conn,$sql);
			
			//$meetingIDs = mysqli_fetch_array($meetingIDsResult,MYSQLI_ASSOC);
			

			// Iterate over result of query
			while ($current = $meetingIDsResult->fetch_array()) {
				// Select meeting with the current id
				$sql = "SELECT * FROM meetings WHERE id = '$current[0]'";
				$currentMeetingResult = mysqli_query($conn,$sql);
				$currentMeeting = mysqli_fetch_assoc($currentMeetingResult);
				// Echo HTML for current meeting

				echo '
					<div class="card">
						<div class="card-body">
							<form action="leaveSG.php" method="post">
								<input type="text" class="form-control" name="hidden" value = "'.$currentMeeting['id'].'" style="display:none;">
								<input type="image" name="leaveMeeting" class="float-right" style="border:none;background-color:white;" src="ic_delete.png" alt="DELETE">
							</form>
							
							<h3>'.$currentMeeting['name'].'</h3>
							<div>Location: '.$currentMeeting['location'].'</div>
							<div>Date: '.$currentMeeting['date'].'</div>
							<div>Time: '.$currentMeeting['time'].'</div>
							<br>
							<div>Focus: '.$currentMeeting['focus'].'</div>
						</div> 
						<div class="card-footer">
							<div style="float:right">Creator: '.$currentMeeting['creator'].'</div>
							<div>Category: '.$currentMeeting['category'].'</div>
						</div>
					</div>
					<br>';
			}
			
			if (mysqli_query($conn, $sql)) {
				echo "<script type = 'text/javascript'>console.log('Connection Successful')</script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
			
			
			mysqli_close($conn);
			?>	
			</div>
			<div class="col-sm-4" style="padding-left:5px;">
				<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=r9mkaoqcjb635vo5fa2v397df4%40group.calendar.google.com&amp;color=%238C500B&amp;ctz=America%2FNew_York" 
				style="border:solid 1px #777" width="100%" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>

		
	</div>

</body>
</html>
