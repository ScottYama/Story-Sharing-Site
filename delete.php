<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
	<title>Delete</title>
</head>
<body>

<?php
    // start session
    session_start();
    // get file name and username and file path
    $file = $_GET['file'];
    $username = $_SESSION['username'];
    $file_path = "/srv/module2group/$username/$file";
    // if file exists, delete the file
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo "<h2>File deleted successfully</h2>";
        } else {
            echo "<h2>Unable to delete the file</h2>";
        }
    } else {
        echo "<h2>File does not exist</h2>";
    }
?>
    <!-- back button -->
    <form action="files.php">
        <input type="submit" value="Back"> 
    </form><br>
    <!-- logout button -->
    <form action="sfss.php">
        <input type="submit" value="Log Out"> 
    </form>

</body>
</html>
