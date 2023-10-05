<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
    <title>Files</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	
<?php
    // start session
    session_start();

    // get list of valid usernames
    $names = array();
    $_SESSION['users'] = fopen("/srv/module2group/users.txt", 'r');
    $users = $_SESSION['users'];
    while (!feof($users)) {
        array_push($names, substr(fgets($users), 0, -1));
    }
    $_SESSION['names'] =  $names;


    // get inputted username and if it is valid, print out list of user's files
    $username = $_GET['username'];
    if (isset($username)) {
        $_SESSION['username'] = $username;
    }
    $username = $_SESSION['username'];
    echo "<h1>$username's Files</h1>";
    if (in_array($username, $names)) {
        $_SESSION['files'] = scandir("/srv/module2group/$username");
        foreach ($_SESSION['files'] as $file) {
            if ($file[0] != '.') {
                echo "<h2>$file</h2> <br>";
            }
        }
        echo "<br><br>";
    // if invalid username, return to login page
    } else {
        header("Location: sfss.php");
        exit;
        
    }
?>
    <!-- options for what user wants to do with files (open, delete, upload) -->
    <form action="open.php" method="GET">
        <label>Open file <input type="text" name="file" placeholder="File name"></label>
        <input type="submit" value="Submit"> <br><br>
    </form>
    <form action="delete.php" method="GET">
        <label>Delete file <input type="text" name="file" placeholder="File name"></label>
        <input type="submit" value="Submit"> <br><br>
    </form>
    <form action="share.php" method="GET">
        <label>Share file <input type="text" name="file" placeholder="File name"></label>
        <input type="text" name="receiver" placeholder="Share to">
        <input type="submit" value="Submit"> <br><br>
    </form>
    <form action="upload.php" method='POST' enctype='multipart/form-data'>
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
            <label for="uploadfile_input">Upload file <input name="uploadedfile" type="file" id="uploadfile_input"></label>
            <input type="submit" value="Submit">
    </form> <br><br>

    <!-- logout button -->
    <form action="sfss.php">
        <input type="submit" value="Log Out"> 
    </form>
</body>
</html>
