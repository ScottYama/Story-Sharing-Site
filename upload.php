<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
	<title>Upload</title>
</head>
<body>

<?php
    // start session
    session_start();

    // Get the filename and username and make sure they are valid
    $filename = basename($_FILES['uploadedfile']['name']);
    $username = $_SESSION['username'];
    if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
        echo "<h2>Invalid filename</h2>";
    } elseif( !preg_match('/^[\w_\-]+$/', $username) ){
        echo "<h2>Invalid username</h2>";
    } else {
        // get path and upload
        $full_path = sprintf("/srv/module2group/%s/%s", $username, $filename);
        if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
            echo "<h2>Upload complete</h2>";
        }else{
            echo "<h2>Upload failed</h2>";
        }

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
