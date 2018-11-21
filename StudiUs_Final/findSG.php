<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find Study Group</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="container-fluid">
		
	<div >
	<h1>Find A Study Group</h1>
	<div class="row">
		<div class="col-sm-8 mx-auto">
			<br>
			<div class="body">
				<input type="text" id="mySearch" size="100" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"/>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<?php
		echo "<script type='text/javascript'>console.log('Starting PHP')</script>";
		$servername = "74.208.75.114";
		$username = "student02";
		$password = "tacoo02";
		$dbname = "student02";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$sql = "SELECT * FROM meetings";
		
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// Output card for each meeting
			while($currentMeeting = mysqli_fetch_assoc($result)) {
				echo '
				<div class="col-sm-4 myscroll" style="height:25vh">
					<div class="card">
						<div class="card-body">
							<form action="joinSG.php" method="post">
								<input type="number" class="form-control" name="hidden" value = "'.$currentMeeting['id'].'" style="display:none;">
								<input type="image" name="newMeeting" class="float-right" style="border:none;background-color:white;" src="ic_add.png" alt="JOIN">
							</form>
							<h4>'.$currentMeeting['name'].'</h4>
							<button type="button" class="btn" data-toggle="collapse" data-target="#details'.$currentMeeting['id'].'">Details</button>
							<div id="details'.$currentMeeting['id'].'" class="collapse">
							<div>Location: '.$currentMeeting['location'].'</div>
							<div>Date: '.$currentMeeting['date'].'</div>
							<div>Time: '.$currentMeeting['time'].'</div>
							<br>
							<div>Focus: '.$currentMeeting['focus'].'</div>
							</div>
						</div> 
						<div class="card-footer">
							<div style="float:right">Creator: '.$currentMeeting['creator'].'</div>
							<div>Category: '.$currentMeeting['category'].'</div>
						</div>
					</div>
				</div>';
			}
		} else {
			echo "0 results";
		}
		
		if (mysqli_query($conn, $sql)) {
			echo "<script type = 'text/javascript'>console.log('Connection Successful')</script>";
			include 'yourSG.html';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		
		
		mysqli_close($conn);
		?>
	</div>
    </div>
	
<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>


