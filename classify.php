<?php
require "connect.php";
session_start();
// $_SESSION['image'] = 'leaf Images/1_17955625095.jpg';

if(!$_SESSION['loggedin']) // checking if lawyer is logged in 
    header("Location: index.html");


$com = "python client.py '". $_SESSION['image'] . "'" ;

$command = escapeshellcmd($com);
// shell_exec("exit");
// $out = '';
// $return_var = '';
$output = shell_exec($command);
$query = "Insert into predictions values($_SESSION[id],'$_SESSION[image]','$output')";
// echo $query;
$result = mysqli_query($db,$query);
echo $output;
// print_r($out);
// echo $return_var;

// echo $output;
?>
