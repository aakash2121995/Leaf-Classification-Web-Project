<?php
/*script for lawyer login*/
  require_once 'connect.php';
    session_start();
  $_SESSION['loggedin'] = 0;
   $uName = $_POST['email']; // lawyer email
   $pass = $_POST['password'];// lawyer password


   $result = mysqli_query($db,"SELECT lawyerId FROM lawyer where email = '$uName' and password = '$pass'");
   if(mysqli_num_rows($result)>0)
   {
   	$_SESSION['loggedin'] = 1;
   	$_SESSION['id'] = mysqli_fetch_row($result)[0];
   	header("Location: Dashboard.php");
   }
   else
   {

    // header("Location: lawyerLogin.php");
    echo "<script>alert('wrong email or password')
          window.location = 'Login.php'
          </script>";
   }
?>