<?php
session_start();
$connection=mysqli_connect("localhost","root","","pizza_hut");

$email =mysqli_real_escape_string($connection,$_POST["userEmail"]);
$password=mysqli_real_escape_string($connection,md5($_POST["userPassword"]));

 
if(empty($email) || empty($password))
{
    header("Location:../index.php");
    exit();
}

$query="select * from user_info where email='$email' and password='$password'";
$result=mysqli_query($connection,$query);

if(mysqli_num_rows($result) >0)
{
    $row=mysqli_fetch_array($result); 
    $_SESSION["userID"]=$row[0]; // User ID 
    $_SESSION["userName"]=$row[1]; // User name
     
    $_SESSION["email"] = $email; 
    echo "yes";
} 
else {
    echo "no";
}

mysqli_close($connection);

?>