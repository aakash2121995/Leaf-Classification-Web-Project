<?php
require 'connect.php';
// print_r($_POST);
$query = "INSERT INTO lawyer (email, password,firstName,LastName) VALUES ('$_POST[email]','$_POST[password]','$_POST[first_name]','$_POST[last_name]')";	
// echo "$query";
$result = mysqli_query($db,$query);
echo $result;
// echo "You have been registered";
 ?>