<?php
require('authenticate.php');


$email = $_GET['email'];
$userid = $_GET['userid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEBI 2012 Update User</title>
 <script type="text/javascript">
   function ckdelete()
   {
	   var estring = "";
	   
	   if(document.getElementById('email').value == "")
	   {
		  estring += "Please enter your email. /n";
	   }
	   if(document.getElementById('password').value == "")
	   {
		   estring += "Please enter your password. /n";
	   }
	   
	   if(estring=="")
	   {
		   return true;
	   }
		else
		{
			alert("Please enter both username and password.");
			return false;
		 }
   }
   </script>
<style type="text/css">
div {padding: 10px; margin: 100px auto; width: 300px; font-family: sans-serif;}
</style>
</head>

<body>
<div>
<form action="edit_user.php" method="post" enctype="multipart/form-data"  onsubmit="return ckdelete();">
<input type="hidden" name="frm_userid" value="<?php echo $userid; ?>" />
<label for="email">Email: </label><input type="text" name="frm_email" id="email" value="<?php echo $email; ?>" size="20" /><br />
<label for="password">Password: </label><input type="password" name="frm_password" id="password" size="20" /><br />
<input type="submit" value="update user" />
</form>
</div>
</body>
</html>
