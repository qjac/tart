<?php
require('authenticate.php');

if (isset($_POST['frm_password']) && isset($_POST['frm_email'])) 
{
$user_email = $_POST['frm_email'];
$user_password = $_POST['frm_password'];
require_once('database.php');
$sha1_password = sha1($user_password);

/*
echo $user_email;
echo "<br>";
echo $user_password;
echo "<br>";
echo $sha1_password;
*/
 $query = "INSERT INTO users
                 (email, password)
              VALUES
                 ('$user_email', '$sha1_password')";
    $db->exec($query);
	
		
}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>User Added</title>
</head>

<body>
<h3>User Added</h3>
<p><a href="user_list.php">Go back to user list</a></p>
</body>
</html>