<?php session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['admin_password'])) 
{

	$user_password = $_POST['admin_password'];
	$user_email = $_POST['admin_email'];
	
	require_once('database.php');
	
	 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
   $query = "SELECT * FROM users WHERE email = '$user_email' AND password = SHA1('$user_password')";
        $result = mysqli_query($dbc, $query);

$row = mysqli_fetch_row($result);
$current_password = $row[2]; 


	
	
	
	$sha1_password = SHA1($user_password);
	/*
		echo $current_password;
		echo "<br>";
     
	   echo $sha1_password;
*/

    if ($current_password == $sha1_password) {
        $_SESSION['loggedIn'] = true;
    } else {
		 echo 'Incorrect username or password';
		/*
		echo $current_password;
		echo "<br>";
       echo 'Incorrect password';
	   echo "<br>";
	   echo $sha1_password;
	   */
		 
    }
} 

if (!$_SESSION['loggedIn']): ?>

<html><head><title>Login</title></head>
<style type="text/css">
div {padding: 10px; margin: 100px auto; width: 300px; font-family: sans-serif;}
</style>
  <body>
  <div>
    <p>Admin Login</p>
    <form method="post">
      Username: <input type="text" name="admin_email"> <br />
        Password: <input type="password" name="admin_password"> <br />
      <input type="submit" name="submit" value="Login">
    </form>
    </div>
  </body>
</html>

<?php
exit();
endif;
?>
