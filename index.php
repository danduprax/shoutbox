<?php

include "database.php";

if (isset($_POST['submit'])) {
	if ($_POST['user'] > "" && $_POST['message'] > "") {
		$user = mysqli_escape_string($connect, $_POST['user']);
		$message = mysqli_escape_string($connect, $_POST['message']);

		$sql = "INSERT INTO shouts (username, message)
				   VALUES ('$user', '$message')";

		if (mysqli_query($connect, $sql)) {
		    $info = "New record created successfully.";
		} else {
		    $info = "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	} else {
		$info = "Please input data.";
	}
}

$sql = "SELECT * FROM shouts";
$query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Shoutbox</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<header>
			<h1>Shoutbox</h1>
		</header>

		<div id="shouts">
			<ul>
				<?php
					while($row = mysqli_fetch_assoc($query)) {
						echo '<li class="shout">
							  	<span>' . $row['datetime'] . ' - </span>
							    ' . $row['username'] . ':
							    ' . $row['message'] . '
							  </li>';
					}
				?>
			</ul>
		</div> <!-- /#shouts -->

		<div id="input" class="group">
			<form method="post" action="index.php">
				<input type="text" name="user" placeholder="Enter Your Name">
				<input type="text" name="message" placeholder="Enter Your Message">
				<br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div> <!-- /#input -->

		<div id="information" class="group">
			<?php
				if (isset($info)) {
					echo '<div>
						    <span class="info-text">' . $info . '</span>
						  </div>';
				}
			?>
		</div> <!-- /#information -->
	</div> <!-- /.container -->
</body>

</html>