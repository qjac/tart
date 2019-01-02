<?php
require('authenticate.php');


$user_email = $_POST['frm_email']; 
$user_password = $_POST['frm_password'];
$userid = $_POST['frm_userid'];
$sha1_password = SHA1($user_password);

 require_once('database.php');
    $query = "UPDATE users
              SET email = '$user_email',
                  password = '$sha1_password'
               WHERE userID = '$userid'";
    $db->exec($query);
	
	  

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>User Updated</title>
</head>

<body>
<h3>User Updated</h3>
<p><a href="user_list.php">Go back to user list</a></p>
</body>
</html>