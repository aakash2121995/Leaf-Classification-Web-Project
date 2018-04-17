<?php
require 'connect.php';
$email = $_POST['email'];

$query = "select firstName,password from lawyer where email='$email'";

// echo $query;

$result = mysqli_query($db,$query);

$op = mysqli_fetch_row($result);

if($result->num_rows == 0)
	echo "<script>
			alert('Email is not registered')
			window.location='forgot.php'
		</script>";


$name = $op[0];
$pass = $op[1];

$to      = $email;
$subject = 'Password recovery';
$message = 'Hi $name your password is $pass';
$headers = 'From: webmaster@leaf.com' . "\r\n" .
    'Reply-To: webmaster@leaf.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo "<script>
		alert('An email has been sent to $email')
		window.location='index.html'
	</script>";



?>