<?php 
	require('header.php');
 ?>

 <main class="row u-cf u-full-width">
		<div class="hero u-full-width">
			<!-- background image! Woohoo! -->
			<h2>Let's chat.</h2>	
		</div> <!-- end hero -->
	
		<section class="connect">
			<hr>
		
<h3>Follow Us!</h3>
		<div class="soc-media no-divide">
		<a href="#">
			<i class="fa fa-twitter fa-4x" aria-hidden="true"></i><span class="sr-only">Follow us on Twitter</span></a>
		<a href="#">
			<i class="fa fa-facebook-official fa-4x" aria-hidden="true"></i><span class="sr-only">Follow us on Facebook</span>
		</a>
		<a href="#">
			<i class="fa fa-instagram fa-4x" aria-hidden="true"></i><span class="sr-only">Follow us on Instagram</span>
		</a>
	</div>

	<hr>

	<h3>Write Us!</h3>

		<div id="contact-area" class="no-divide">	
			<form method="post" name="contactform"
	action="contact-form-handler.php">
	    Your Name:
	    <input type="text" name="name">
	 
	    Email Address:
	    <input type="text" name="email">
	 
	    Message:
	    <textarea name="message"></textarea>
	 
	    <input type="submit" value="Submit">
	</form>
		</section>
	</main>


<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
frmvalidator.addValidation("message","req","Please leave a message");
</script>
<!--
Sample code from:
http://www.html-form-guide.com/contact-form/php-email-contact-form.html
-->
<?php 
	require('footer.php');
 ?>

