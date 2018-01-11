//Codes written below works when hover the mouse for displaying sub menu automaticallly
$(document).ready(function () {
    
    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(500);
         
    });
 
    $("#deliverPicEnable").hide(); //Hides as default 
    $("#takenPicEnable").hide(); //Hides as default 
    $("#deliverSide").hide(); //Hides as default 
    $("#taken").hide();
    $("#confirmOrder").hide();
    $("#deliverPicdisable").click(function(){
        $(this).slideUp(400, function(){
            $("#deliverPicEnable").slideDown(200, function(){
            $("#deliverSide").fadeIn(100);
                $("#confirmOrder").hide();
            $("#takenPicDisable").slideDown(); 
            $("#takenPicEnable").slideUp(100);
                $("#taken").fadeOut(100);
            });
            
        });
         
        });
     
    $("#takenPicDisable").click(function(){
       $("#deliverPicEnable").slideUp(50, function(){
        $("#deliverPicdisable").slideDown(50);
           });
        $(this).slideUp(400, function(){
            $("#takenPicEnable").slideDown(200, function(){
            $("#confirmOrder").show();
                $("#deliverSide").fadeOut(50, function(){
               $("#taken").fadeIn(50);
               
            });   
             
            });
        });
    });
    
 
    
    $("#login_button").click(function () {
      
         var userEmail = $("#userEmail").val();
        var userPassword = $("#userPassword").val();

        if (userEmail != "" && userPassword != "") {
            $.ajax({
                url: "function/login.php",
                method: "POST",
                data: {
                    userEmail: userEmail,
                    userPassword: userPassword
                },
                success:function (data) {
                    if (data == "yes") {
                        alert("Logged in Successfully");
                        location.reload();
                
                    }  
                    
                    else {
                         $("#login_message").html("Email or password incorrect.....");
                        $("#login_message").fadeIn(500).delay(10000).fadeOut(500);
                        $("#userEmail").val("");
                        $("#userPassword").val("");
                        $("#userEmail").focus();
                         
                    }
                   

                }
            });



        } else {
             $("#login_message").html("All fields are mandatory");
            $("#userEmail").focus();
        }
    })
})
 //For choosing category 


 
//Checking change password section 
//If false is found, it would stop user from changing password
function changePasswordCheck()
{
    //These are coming from change password modal....
    var message=document.getElementById("oldPasswordMessage").value;
    var newPasswordMessage=document.getElementById("newPasswordMessege");
    var confirmPasswordMessage=document.getElementById("confirmPasswordMessae");
      var newpassword=document.getElementById("mynewpassword").value; 
    var confirmpassword=document.getElementById("confirmPassword").value;
    
    
    if(newpassword!==confirmpassword)
        {
              document.getElementById("confirmPassword").focus();
            confirmPasswordMessage.innerHTML="Password mismatch";
             document.getElementById("confirmPassword").style.borderColor="red";
            return false; 
        }
    else {
        document.getElementById("confirmPassword").style.borderColor="green";
     confirmPasswordMessage="";
    }
     
    
    if(message!="Match")
        {
       document.getElementById("oldPassword").focus();
    document.getElementById("oldPassword").style.borderColor="red";
            document.getElementById("olMessage").innerHTML="Incorrect current password";
            return false; 
        }
    else {
     document.getElementById("oldPassword").style.borderColor="green";
               document.getElementById("olMessage").innerHTML="";
    
    }
     
    if(newPasswordMessage.innerHTML!="Ok")
        {
            confirmPasswordMessage.innerHTML="Please enter strong passwords";
          document.getElementById("newPassword").focus();
              document.getElementById("newPassword").style.borderColor="red";
           
            return false; 
        }
    else {
               document.getElementById("newPassword").style.borderColor="green";
        confirmPasswordMessage.innerHTML="";
       
    }
    
     
   
    
}

function newpassword(mypassword)
{
    var message=document.getElementById("newPasswordMessege"); 
    var mynewPassword=mypassword.length; 
     
     if(mynewPassword!=0)
         {
             if(mynewPassword <10)
                 {
                     message.innerHTML="Too short";
                     message.style.color="red";
                     return false; 
                 }
             if(mynewPassword >10)
                 {
                     message.innerHTML="Ok";
                     message.style.color="green";
                       
                 }
         }
    else {
        message.innerHTML="";
        return false; 
    }
   
}
    

////This function validate password length from Signup.php 
function checkAll() {
    var helper = document.getElementById("mobile_helper").innerHTML;
    var password = document.forms["signUp"]["password"].value;
    var emailHelper=document.getElementById("email_helper").innerHTML; 
     
    var pass_length = password.length;
    if (pass_length < 10) {
        document.forms["signUp"]["password"].focus();
        return false;
    }
    if (helper != "Ok") {
        document.forms["signUp"]["mobile"].focus();
        return false;

    }
    
    if(emailHelper=!"Ok")
        {
    document.forms["signUp"]["email"].focus();
            return false; 
        }
     

}
// This is from singup.php
function validMobile(myNumber) {
     
    var mobile = myNumber.length;
    var helper = document.getElementById("mobile_helper");
    var testMob =/^[1-9]{1}[0-9]{9}$/;

    //isNan== Is not a number 
    if(isNaN(myNumber)) 
        {
            helper.classList.add("text-danger");
            helper.innerHTML = "Only numbers allowed";
            return false;
        }
    
    if (mobile != 0) {
        if (mobile != 10) {
            helper.classList.add("text-danger");
            helper.innerHTML = "Number should be 10 digits";
            return false;
        }
        if (mobile == 10) {
            helper.classList.remove("text-danger");
            helper.classList.add("text-success");
            helper.innerHTML = "Ok";
            return true;
        }
    } else {
        helper.innerHTML = "";
        document.getElementById('mobile').focus();
        return false;
    }



}


 //This is from change password modal
function takeOldPassword(oldPassword)
{  
    var oldPassword=oldPassword; 
    if(oldPassword.length==0)
        {
  document.getElementById("oldPasswordMessage").innerHTML="";         
        }
    var mykey=new XMLHttpRequest();
    mykey.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
            {
                document.getElementById("oldPasswordMessage").value=this.responseText; 
                document.getElementById("oldPasswordMessage").classList.add("text-danger");
            }
    }; 
    mykey.open("GET","function/changePassword.php?oldPassword="+oldPassword,true); 
    mykey.send();
    
        }


//This is from Signup.php
function checkExistEmail(email)
{
    var myemail= email;
     var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("email_helper").innerHTML=this.responseText;
        document.getElementById("email_helper").classList.add("text-danger");
    }
  };
  xhttp.open("GET", "function/signup.php?myemail="+myemail, true);
  xhttp.send();
}


// Validating password length by keyup function from singup.php
function validPassword(password) {
    var textLength = password.length;
    var message = document.getElementById('password_helper');

    if (textLength != 0) {
        //When password length goes down, it says "Too short"
        if (textLength < 5) {
            message.innerHTML = "Too short";
            message.style.color = "red";
            return false;
        }
        //When the password goes above 5 letters. it is medium
        if (textLength > 5) {
            message.innerHTML = "Please make strong password";
            message.style.color = "blue";

        }
        // when the password goes above the 10 letters. it is STRONG password
        if (textLength > 10) {
            message.innerHTML = "Ok";
            message.style.color = "green";
        }
    } else {
        document.getElementById('password').focus();
        message.innerHTML = "";

        return false;
    }

}
//from order.php for validation address fields
function checkOrderAddress()
{
    var address=document.getElementById("orderAddress"); 
    var apt= document.getElementById("orderAPT"); 
    var messsage=document.getElementById("orderMessage");

    if(address.value=="")
        {
            address.focus();
            address.style.borderColor="red";
            messsage.innerHTML="Please Enter the address";
            return false; 
        }
    else {
        address.style.borderColor="green";
    }
    if(apt.value=="")
        {
            apt.focus();
            apt.style.borderColor="red";
            messsage.innerHTML="Please enter the apartment field";
            return false; 
        }
    else {
        apt.style.borderColor="green";
    }
}
 