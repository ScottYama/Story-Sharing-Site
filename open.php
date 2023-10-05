<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
	<title>Open</title>
</head>
<body>

<?php
    // start session
    session_start();

    // get file name, valid files and username
    $file = $_GET['file'];
    $username = $_SESSION['username'];
    $validFiles = $_SESSION['files'];
    // read contents of file based on type of file
    if (in_array($file, $validFiles)) {
        if (strpos($file, '.txt')) {
        $contents = file_get_contents("/srv/module2group/$username/$file", 'r');
        echo $contents;
        } else {
            // code from https://stackoverflow.com/questions/4286677/show-image-using-file-get-contents
            $contents = base64_encode(file_get_contents("/srv/module2group/$username/$file"));
            $src = 'data: '.mime_content_type("/srv/module2group/$username/$file").';base64,'.$contents;
            echo '<img src="' . $src . '">';
            // end of used code
        }
    } else {
        echo "<h2>$file not found</h2>";
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
