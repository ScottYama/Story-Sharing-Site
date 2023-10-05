<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
	<title>Share</title>
</head>
<body>

<?php
    // start session
    session_start();
    // get variables
    $file = $_GET['file'];
    $receiver = $_GET['receiver'];
    $username = $_SESSION['username'];
    $files = $_SESSION['files'];
    $names = $_SESSION['names'];

    // if valid file name and revceiver name, copy file to receiver's folder
    if (in_array($file, $files) and in_array($receiver, $names)) {
        if (copy("/srv/module2group/$username/$file", "/srv/module2group/$receiver/$file")) {
            echo "<h2>File shared</h2>";
        } else {
            echo "<h2>File failed to share</h2>";
        }
    } else {
        echo "<h2>File or receiver not found</h2>";
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
