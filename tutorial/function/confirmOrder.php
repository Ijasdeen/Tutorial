<?php
session_start();
$connection=mysqli_connect("localhost","root","","pizza_hut");
 $userId=0; 
$_SESSION["orderCompletedMessage"]="Your order has been submitted successfully";
if(isset($_GET["key"]))
{
    if(isset($_SESSION["userID"]))
    {  
        $userId=$_SESSION["userID"]; 
        $query="select * from myorder where user_id='$userId' and status='Pending'";
        $result=mysqli_query($connection,$query);
        $ConfirmCode=mysqli_fetch_array($result);
         
        $updateQuery="update myorder set status='carryout' where user_id='$userId'and status='Pending'";
            $myresult=mysqli_query($connection,$updateQuery);
            if($myresult)
            {
                header("location:../order.php");
            }
         
     }
    
    else {
        header("location:../order.php");
    }
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
     $myuserId=$_SESSION["userID"]; 
     $address=mysqli_real_escape_string($connection, $_POST["address"]);
    $apt=mysqli_real_escape_string($connection, $_POST["apt"]);
     
    if(empty($address) || empty($apt)) 
    {
         $_SESSION["orderCompletedMessage"]="All fields are mandatory";

        echo "<script>window.location='../order.php'</script>";
    }
     
    if(isset($myuserId))
     {
$myquery="update user_info set address_1='$address', address_2='$apt' where user_id='$myuserId'";
    $statement=mysqli_query($connection,$myquery);
     if(!$statement)
     {
         echo "<script>alert('Pleaes Contact the Admin... Something went wrong')</script>";
         echo "<script>window.location='../order.php'</script>";
     }
     $query="select * from myorder where user_id='$myuserId' and status='Pending'";
        $result=mysqli_query($connection,$query);
         $ConfirmCode=mysqli_fetch_array($result);
          $updateQuery="update myorder set status='deliver' where user_id='$myuserId' and status='Pending'";
            $myresult=mysqli_query($connection,$updateQuery);
            if($myresult)
            {
                 header("location:../order.php");
            }
         else {
             echo "<script>alert('Something went wrong... please contact the Admin')</script>";
         }
          
     }
      
}
 
  mysqli_close($connection)
?>