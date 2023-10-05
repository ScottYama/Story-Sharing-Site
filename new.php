<!DOCTYPE html>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<html lang="en">
<head>
	<title>New User</title>
</head>
<body>

<?php
    // start session
    session_start();
    // get variables
    $file = $_GET['file'];
    $new = $_GET['new'];
    
    // get list of valid usernames
    $names = array();
    $_SESSION['users'] = fopen("/srv/module2group/users.txt", 'r');
    $users = $_SESSION['users'];
    while (!feof($users)) {
        array_push($names, substr(fgets($users), 0, -1));
    }
    $_SESSION['names'] =  $names;

    // if user doesn't exist, add new user
    if (in_array($new, $names)) {
        echo "<h2>User already exists</h2>";
    } else {
        if (mkdir("/srv/module2group/$new/")) {
            $users = fopen("/srv/module2group/users.txt", 'w');
            fwrite($users, "$new\n");
            foreach ($names as $name) {
                fwrite($users, "$name\n");
            }
            echo "<h2>User created</h2>";
        } else {
            echo "<h2>Error creating user</h2>";
        }
       
    }
?>

     <!-- back button -->
     <form action="sfss.php">
        <input type="submit" value="Back"> 
    </form>

</body>
</html>
