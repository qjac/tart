<?php
require('authenticate.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>create user</title>
<style type="text/css">
div {padding: 10px; margin: 100px auto; width: 300px; font-family: sans-serif;}
</style>
</head>

<body>
<div>
 <p>Add User</p>
  <form method="post" action="add_user.php">
      Email: <input type="text" name="frm_email"> <br />
        Password: <input type="password" name="frm_password"> <br />
      <input type="submit" name="submit" value="add user">
    </form>
</div>
</body>
</html>
