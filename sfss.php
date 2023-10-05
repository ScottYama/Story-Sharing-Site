<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
	<title>Simple File Sharing Site</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Simple File Sharing</h1><br>
	<!-- create form to input username -->
	<form action="files.php" method="GET">
		<label>Username: <input type="text" name="username"></label>
		<label></label>
		<input type="submit" value="Submit"> <br><br>
	</form><br><br>

	<!-- create form for new user -->
	<form action="new.php" method="GET">
		<label>New user username: <input type="text" name="new"></label>
		<label></label>
		<input type="submit" value="Submit"> <br><br>
	</form>
<?php
	// if there is a session, destroy it
	if (session_status() == 2) {
		session_destroy();
	}
?>
</body>
</html>
