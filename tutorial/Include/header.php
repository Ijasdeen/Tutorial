<?php
session_start();
  
$connection=mysqli_connect("localhost","root","","pizza_hut");
$user_id="";
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" href="../Images/top.jpg" type="image/gif" sizes="16x16">
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="parallax.js-1.5.0/parallax.min.js"></script>
     <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="js/main.js"></script>
     <link rel="stylesheet" href="css/animate.min.css">
<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet"> 
    
    <title>Pizza hut</title>
</headx>
<body>
<style>
  
 /*    This is for HR tag*/
    hr {
      -moz-border-bottom-colors: grey;
      -moz-border-image: none;
      -moz-border-left-colors: grey;
      -moz-border-right-colors: grey;
      -moz-border-top-colors: grey;
      border-color: #EEEEEE -moz-use-text-color #FFFFFF;
      border-style: solid none;
      border-width: 2px 0;
      margin: 18px 0;
  }
/*    This is for Social media */
   .social {
      font-size: 20px;
      height: 30px;
      width: 30px;
      text-align: center;
      padding: 5px;
      border: 1px solid #cccccc;
      margin-bottom: 10px;
      margin-right: 5px;
      color: white;
      background-color: red;
      -webkit-transition: 300ms all ease-in-out;
      -o-transition: 300ms all ease-in-out;
      transition: 300ms all ease-in-out;
  }
/*    This is for Apps*/
    .apps{
         margin-top: 0px;
      font-size: 20px;
      height: 30px;
      width: 30px;
      text-align: center;
      padding: 2px;
      border: 1px solid white;
      margin-bottom: 10px;
      background-color: red;
      color: white;
      border-radius: 360px;
      -webkit-transition: 300ms all ease-in-out;
      -o-transition: 300ms all ease-in-out;
      transition: 300ms all ease-in-out;

    }
   
    </style>

<!--Navbar Start-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Pizza Hut</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="navCenter">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Order Online<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="pizza.php">PIZZA</a></li>
            <li><a href="wings.php">WINGS</a></li>
            <li><a href="sides.php">SIDES</a></li>
            <li><a href="desserts.php">DESSERT</a></li>
            <li><a href="drinks.php">DRINKS</a></li>
            <li><a href="pasta.php">Pasta</a></li>
          </ul>
        </li>
        <li><a href="contactUs.php">Contact us</a></li>
  
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          //If the user name is NOT set, then it will display sign up and login
          if(!isset($_SESSION["userName"]))
          {
          ?>
        <li><a href="#signUpModal" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        
        <li><a href="#loginTest" data-toggle="modal" id="loginCaller"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a></li>
         <?php
          }
          else {
              //Else, it will display only LOGIN part
          ?>
            <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp; Hi <?php if(isset($_SESSION["userName"])) {echo $_SESSION["userName"];}?></a>
          <ul class="dropdown-menu">
             <li><a href="order.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Cart</a></li>
             <li><a href="#changePassword" data-toggle="modal" id="changePasswordCaller">Change Password</a></li>
             <li><a href="function/logout.php">Logout</a></li>
            
          </ul>
        </li>
          <?php
          }
          ?>
         <li><a href="order.php"><span class="fa fa-shopping-cart text-warning" style="font-size:20px;"></span>&nbsp;<span class="badge">
             <?php
             if(isset($_SESSION["userID"]))
             {
               $user_id=$_SESSION["userID"];

             }
              
                $query="select * from myorder where user_id='$user_id' and status='Pending'";
                 $result=mysqli_query($connection,$query);
                $count=mysqli_num_rows($result);
                if($result)
                {
                    if($count > 0)
                    {
                        echo $count; 
                    }
                    else {
                    echo $count =0;
                    }
                }
             ?>
         </span></a></li>
       
      </ul>
    </div>
  </div>
</nav>
<!--Navbar finish-->

<!-- Modal -->
 <!-- Trigger the modal with a button -->

<!-- Modal for login-->
  
      
     <div class="container">
          
           <div id="changePassword" class="modal fade" role="dialog">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header text-center" id="loginHeader"><h4>Change password</h4></div>
                       <div class="modal-body">
                           <form method="POST" action="function/changePassword.php" onsubmit="return changePasswordCheck()">
                               <div class="form-group">
                                  <label for="Old password">Old password</label>
                                   <input type="password" class="form-control" id="oldPassword" name="oldPassword" required maxlength="180" onkeyup="takeOldPassword(this.value)">
                                   <input type="hidden" id="oldPasswordMessage">
                                   <small class="text-danger form-text" id="olMessage"></small>
                               </div>
                               <div class="form-group">
                                   <label for="newPassword">New Password</label>
                                   <input type="password" onkeyup="newpassword(this.value)" class="form-control" id="mynewpassword" name="newPassword" required>
                                   <small class="text-muted form-text" id="newPasswordMessege"></small>
                                   
                               </div>
                               <div class="form-group">
                                   <label for="ConfirmPassword">Confirm Password</label>
                                   <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                   <small class="text-danger form-text" id="confirmPasswordMessae"></small>
                               </div>
                               <div class="form-group">
                                   <input type="submit" value="Change password" class="form-control btn btn-info" name="btnChangePassword">
                               </div>
                           </form>
                           
                       </div>
                       <div class="modal-footer" id="loginFooter"></div>
                   </div>
               </div>
           </div>
          
<!--            Testing start here-->
           
            <div class="modal fade" id="loginTest" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header login_modal_header">
                           <h3>Login here</h3>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="Email">Email</label>
               <input type="email" class="form-control" name="userEmail" id="userEmail" required> 
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
               <input type="password" name="userPassword" id="userPassword" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <button type="button" name="login_button" id="login_button" class="btn btn-info">Login</button>   
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer login_modal_footer">
                            <span id="login_message"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
<!--            Testing finishes here-->
   
   
           
       </div>
      

<!--Modal for signup-->
     <div class="modal fade" role="dialog" id="signUpModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-muted">Sign Up here</h4>
                </div>
                <div class="modal-body">
                    <form action="function/signup.php"  method="POST" onsubmit="return checkAll()" name="signUp" autocomplete="off">
                        <div class="form-group">
                           <label for="First Name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" maxlength="180" required>
                            
                        </div>    
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" maxlength="180" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" maxlength="180" name="email" id="email" class="form-control" onkeyup="checkExistEmail(this.value)" required >
                            
                            <small id="email_helper" class="form-text text-muted">We will never share your email with anyone else.</small>
                        </div>
                        <div class="form-group"><label for="Password">Password</label>
                        <input type="password" name="password" maxlength="180" id="password" class="form-control" onkeyup="validPassword(this.value)" required>
                            <small id="password_helper" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label> 
                            <input type="tel" maxlength="180" name="mobile" id="mobile" class="form-control" maxlength="10" onkeyup="validMobile(this.value)">
                            <small id="mobile_helper" class="form-text text-muted"></small>
                        </div>
                         <div class="form-group">
                            <input type="submit" value="Sign up" class="form-control btn btn-primary btn-md" onclick="checkEmailExist();" name="btnSignup">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <strong class="text-danger">We will never share any of your information with third party</strong>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid" id="top">
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="myjump">
        <img src="Images/pizza_hut.PNG" alt="Pizza hut Icon" style="width:4vw; margin-top:-10px;"> <span class="text-white"><strong id="welcomeText">Welcome to Pizza hut</strong></span>
     <span id="pzmessage">
         <?php
         if(isset($_SESSION['message']))
         {
            echo $_SESSION['message'];
         }
         if(isset($_SESSION['msg']))
             {
                 echo $_SESSION['msg']; 
             }
        $_SESSION['msg']=""; // Clear the session in second loading
        $_SESSION['message']=""; // Clear the session in second loading 
         ?>
        
         
          
     </span>
      
    </div>
      </div>
  </div>
</div>

