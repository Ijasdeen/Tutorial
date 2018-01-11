<?php
session_start();
$oldpassword="";
 
$connection=mysqli_connect("localhost","root","","pizza_hut");
  $myid=$_SESSION["userID"];

if(isset($_GET["oldPassword"]) && isset($_SESSION["userID"]))
{
    $oldpassword=mysqli_real_escape_string($connection,md5($_GET["oldPassword"])); 
    $myid=$_SESSION["userID"];
    $myquery="select * from user_info where user_id='$myid'";
    $result=mysqli_query($connection,$myquery);
    $userData=mysqli_fetch_array($result);
    if($userData['password']==$oldpassword)
    {
        echo "Match";
    }
    else {
        echo "Password does not match";
    }
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($connection)
    {
     if(isset($_POST["btnChangePassword"]))
     {
    $myoldPassword=mysqli_real_escape_string($connection,md5($_POST["oldPassword"]));
    $newPassword=mysqli_real_escape_string($connection,md5($_POST["newPassword"]));
    $confirmPassword=mysqli_real_escape_string($connection,md5($_POST["confirmPassword"]));
     
    if(empty($myoldPassword) || empty($newPassword) || empty($confirmPassword) || strlen($newPassword)<10 || $newPassword!=$confirmPassword)
    {
        header("location:../index.php");
        $_SESSION['msg']="Something went wrong.... Please contact admin";
        exit();
    }
     
      $updateQuery="update user_info set password='$confirmPassword' where user_id='$myid'";
         $updateResult=mysqli_query($connection,$updateQuery);
         if($updateResult)
         {
             echo "<script>alert('Password has been successfully changed')</script>";
             echo "<script>window.location='../index.php'</script>";
         }
    }
        
    }
}
 
mysqli_close($connection);
?>