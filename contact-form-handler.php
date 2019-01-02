<?php 
$errors = '';
$myemail = 'jac.quintanilla@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.php');

} 
?>


<!-- This page is displayed only if there is some error -->
<?php 
	require('header.php');
 ?>

<main class="row u-cf u-full-width">
		<div class="hero u-full-width">
			<!-- background image! Woohoo! -->
			<h2>Oops!</h2>	
		</div> <!-- end hero -->
	
		<section>
			<hr>
			<h3><a href="connect.php">Try again...</a></h3>
			<div class="row">
				<p><?php echo nl2br($errors); ?></p>
					<p>
					<a class="btn" href="connect.php">Back to Connect Page</a>
				</p>
			</div>
		</section>
	</main>

<?php 
	require('footer.php');
 ?>