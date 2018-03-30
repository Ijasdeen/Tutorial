<?php
  
    
session_start();

$connection=mysqli_connect("localhost","root","","pizza_hut");
$mymessage="";
$myEmail="";
//When email is getting from URL by using AJAx
if(isset($_GET["myemail"]))
{
    $myEmail=mysqli_real_escape_string($connection, $_GET["myemail"]);
}

         if(isset($myEmail))
         {
             
       if(filter_var($myEmail, FILTER_VALIDATE_EMAIL))
       {
            if(!empty($myEmail))
              {
                  $myquery="select email from user_info where email='$myEmail'";
             $myresult=mysqli_query($connection,$myquery); 
             if($myresult)
             {
                if(mysqli_num_rows($myresult) >0)
                {
                    echo "Email Already exist";
                    exit();
                }
                 if(mysqli_num_rows($myresult)==0)
                 {
                     echo "Ok";
                 }
                
             }
              }
             else {
                 echo "";
             }
           
           
        
       }
       
             
         
        }


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($connection)
{
    

if(isset($_POST["btnSignup"]))
{        
   $first_name=mysqli_real_escape_string($connection, $_POST["first_name"]); 
    $last_name=mysqli_real_escape_string($connection, $_POST["last_name"]); 
    $email = mysqli_real_escape_string($connection,  $_POST["email"]);
    $password=mysqli_real_escape_string($connection, $_POST["password"]);
    $password=mysqli_real_escape_string($connection, md5($password));
    $mobile = mysqli_real_escape_string($connection,  $_POST["mobile"]);
    $address_1="Null";
    $address_2="Nulll"; 
   
    if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($address_1) ||  empty($address_2) || empty($mobile))
    {
        header("location:../index.php");
        exit();
    }
    
    $query="insert into user_info values('','$first_name','$last_name','$email','$password',$mobile,'$address_1','$address_2')";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        $_SESSION['msg']="Registered Successfully...please Login now"; 
           echo '<script>window.location="../index.php"</script>';

   
    }
    else {
        echo mysqli_error($connection);
        echo "<script>alert('Could not sign up.. please contact the admin')</script>";
         
        
    }
       
}
    
}

}
mysqli_close($connection);
?>
