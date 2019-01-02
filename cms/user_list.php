<?php
require('authenticate.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WEBI 2012 Users Admin</title>
<style type="text/css">
body {font-family: Arial, Helvetica, sans-serif; font-size: 90%;}
#wrapper {margin: 50px auto 0px auto; width: 400px; text-align: center;}
table {border-collapse: collapse; border-color:#000000;}
table {margin: 0px auto;}
tr.gray {background-color: #CCCCCC;}
td {padding: 5px;}
td.red {background-color: red;}
</style>

</head>

<body>
<div id="wrapper">

<h3>WEBI 2012 Users Admin</h3>
<?php
require_once('database.php');

 // Get all users
    $query = 'select * FROM users
              order by email';
    $users = $db->query($query);

?>

<p><b><a href="index.php">Back to WEBI 2012 Admin</a></b></p>

<table border="1">
 <tr>
  <th>
   User
  </th>

  <th colspan="2">&nbsp;
   
  </th>
 </tr>


<?php foreach ($users as $user) : ?>

<tr>
<td><?php echo $user['email']; ?></td>
<td>
<a href="delete_user.php?userid=<?php echo $user['userID']; ?>" onClick="javascript:return confirm('Are you sure you want to delete this record?')">delete</a>
</td>

<td>
<a href="edit_user_form.php?userid=<?php echo $user['userID']; ?>&email=<?php echo $user['email']; ?>">edit</a>
</td>
</tr>

<?php endforeach; ?>
<tr><td colspan="3"><a href="add_user_form.php">add new user</a></td></tr>
<tr><td colspan="3"><a href="logout.php">logout</a></td></tr>
</table>
 
 </div>


</body>

</html>
