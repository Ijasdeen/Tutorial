<?php
$connection=mysqli_connect("localhost","root","","pizza_hut");
 session_start();
$id=$_GET['id'];

$productID="";
$quantity="";
$status="";
$name="";
$price="";
 
$fileName=$_GET["name"]; // Getting from url by using $_GET function 
if(isset($fileName)) // If the name is set
{
    if($fileName=="pizza") //if the data from url is equal to "Pizza"
    {
     
        if(!isset($id))
 {
     echo "Could not get the id"; 
     echo mysqli_error($connection);
    exit();
 }
if(!isset($_SESSION["userID"])) //If the user id not set, which means If the user doesn't login
{ 
     echo '<script>alert("Please Login first")</script>';  
     echo '<script>window.location="../pizza.php"</script>'; //Redirect the page

    exit();
}

if(!isset($_SESSION["userID"]))
{
    echo 'User Id is not set';
    exit();
}
else {
    $userId=$_SESSION["userID"];//Gettind ID from Login.php
}

 
$query="select * from pizza where p_id='$id'";
$result=mysqli_query($connection,$query);


if($result)
{
  
    while($row=mysqli_fetch_array($result))
    {
         
         $productID=$row[0]; // Getting the Id 
        $name=$row["name"];// Getting name from pizza table
        $price=$row["price"]; // Getting price from Pizza table 
         $quantity=1; //Intial value /Default Value
         $status="Pending"; // Default for checking If complete or not; 
        $insertQuery="insert into myorder values('',$productID,$userId,'$name',$price,'$status')";
        $excuteQuery=mysqli_query($connection,$insertQuery);
    if($excuteQuery) //If the query execute
    {
     $_SESSION['message']=$name." Added Successfully"; //Session takes this message to pizza.php 
     echo '<script>window.location="../pizza.php"</script>'; //Redirect the page
        
    }
    else {
        echo "<script>alert('Something wrong')</script>"; //If query doesn't work.......
        mysqli_error($connection);
    }

         
    }
    
    
}

        
    
    }  //End of checking name of Pizza from pizza
    
    
if($fileName=="wings") //If the name is set as wings
{
 
       if(!isset($id))
 {
     echo "Could not get the id"; 
     echo mysqli_error($connection);
    exit();
 }
if(!isset($_SESSION["userID"])) //If the user id not set, which means If the user doesn't login
{ 
     echo '<script>alert("Please Login first")</script>';  
     echo '<script>window.location="../wings.php"</script>'; //Redirect the page

    exit();
}

if(!isset($_SESSION["userID"]))
{
    echo 'User Id is not set';
    exit();
}
else {
    $userId=$_SESSION["userID"];//Gettind ID from Login.php
}

 
$query="select * from wingstreet where w_id='$id'";
$result=mysqli_query($connection,$query);


if($result)
{
 
    
    while($row=mysqli_fetch_array($result))
    {
         $productID=$row[0]; // Getting the Id 
        $name=$row["name"];// Getting name from pizza table
        $price=$row["price"]; // Getting price from Pizza table 
         $quantity=1; //Intial value /Default Value
         $status="Pending"; // Default for checking If complete or not; 
        $insertQuery="insert into myorder values('',$productID,$userId,'$name',$price,'$status')";
        $excuteQuery=mysqli_query($connection,$insertQuery);
    if($excuteQuery) //If the query execute
    {
     $_SESSION['message']=$name." Added Successfully"; //Session takes this message to pizza.php 
     echo '<script>window.location="../wings.php"</script>'; //Redirect the page
        
    }
    else {
        echo "<script>alert('Something wrong')</script>"; //If query doesn't work.......
        mysqli_error($connection);
    }

         
    }
    
    
}
else {
   echo "<script>alert('Could not add to cart... please contact admin')</script>"; //If result's false(notwork);
  
}
    
  
} //Wings statement finishes here
    
    
    if($fileName=="sides")
    {
        
              if(!isset($id))
 {
     echo "Could not get the id"; 
     echo mysqli_error($connection);
    exit();
 }
if(!isset($_SESSION["userID"])) //If the user id not set, which means If the user doesn't login
{ 
     echo '<script>alert("Please Login first")</script>';  
     echo '<script>window.location="../sides.php"</script>'; //Redirect the page

    exit();
}

if(!isset($_SESSION["userID"]))
{
    echo 'User Id is not set';
    exit();
}
else {
    $userId=$_SESSION["userID"];//Gettind ID from Login.php
}

 
$query="select * from sides where s_id='$id'";
$result=mysqli_query($connection,$query);


if($result)
{
 
    
    while($row=mysqli_fetch_array($result))
    {
         $productID=$row[0]; // Getting the Id 
        $name=$row["name"];// Getting name from pizza table
        $price=$row["price"]; // Getting price from Pizza table 
         $quantity=1; //Intial value /Default Value
         $status="Pending"; // Default for checking If complete or not; 
        $insertQuery="insert into myorder values('',$productID,$userId,'$name',$price,'$status')";
        $excuteQuery=mysqli_query($connection,$insertQuery);
    if($excuteQuery) //If the query execute
    {
     $_SESSION['message']=$name." added Successfully"; //Session takes this message to pizza.php 
     echo '<script>window.location="../sides.php"</script>'; //Redirect the page
        
    }
    else {
        echo "<script>alert('Something wrong')</script>"; //If query doesn't work.......
        mysqli_error($connection);
    }

         
    }
    
    
}
else {
   echo "<script>alert('Could not add to cart... please contact admin')</script>"; //If result's false(notwork);
  
}   
   
        
    } // End of Sides.php 
    
    
    
    if($fileName=="desserts")
    {
        
                if(!isset($id))
 {
     echo "Could not get the id"; 
     echo mysqli_error($connection);
    exit();
 }
if(!isset($_SESSION["userID"])) //If the user id not set, which means If the user doesn't login
{ 
     echo '<script>alert("Please Login first")</script>';  
     echo '<script>window.location="../sides.php"</script>'; //Redirect the page

    exit();
}

if(!isset($_SESSION["userID"]))
{
    echo 'User Id is not set';
    exit();
}
else {
    $userId=$_SESSION["userID"];//Gettind ID from Login.php
}

 
$query="select * from desserts where d_id='$id'";
$result=mysqli_query($connection,$query);


if($result)
{
 
    
    while($row=mysqli_fetch_array($result))
    {
         $productID=$row[0]; // Getting the Id 
        $name=$row["name"];// Getting name from pizza table
        $price=$row["price"]; // Getting price from Pizza table 
         $quantity=1; //Intial value /Default Value
         $status="Pending"; // Default for checking If complete or not; 
        $insertQuery="insert into myorder values('',$productID,$userId,'$name',$price,'$status')";
        $excuteQuery=mysqli_query($connection,$insertQuery);
    if($excuteQuery) //If the query execute
    {
     $_SESSION['message']=$name." added Successfully"; //Session takes this message to pizza.php 
     echo '<script>window.location="../desserts.php"</script>'; //Redirect the page
        
    }
    else {
        echo "<script>alert('Something wrong')</script>"; //If query doesn't work.......
        mysqli_error($connection);
    }

         
    }
    
    
}
else {
   echo "<script>alert('Could not add to cart... please contact admin')</script>"; //If result's false(notwork);
  
} 
        
           
        
    }//End of desserts.php
    
    if($fileName=="drinks")
    {
        
         if(!isset($id))
 {
     echo "Could not get the id"; 
     echo mysqli_error($connection);
    exit();
 }
if(!isset($_SESSION["userID"])) //If the user id not set, which means If the user doesn't login
{ 
     echo '<script>alert("Please Login first")</script>';  
     echo '<script>window.location="../drinks.php"</script>'; //Redirect the page

    exit();
}

if(!isset($_SESSION["userID"]))
{
    echo 'User Id is not set';
    exit();
}
else {
    $userId=$_SESSION["userID"];//Gettind ID from Login.php
}

 
$query="select * from beverages where b_id='$id'";
$result=mysqli_query($connection,$query);


if($result)
{
 
    
    while($row=mysqli_fetch_array($result))
    {
         $productID=$row[0]; // Getting the Id 
        $name=$row["name"];// Getting name from pizza table
        $price=$row["price"]; // Getting price from Pizza table 
         $quantity=1; //Intial value /Default Value
         $status="Pending"; // Default for checking If complete or not; 
        $insertQuery="insert into myorder values('',$productID,$userId,'$name',$price,'$status')";
        $excuteQuery=mysqli_query($connection,$insertQuery);
    if($excuteQuery) //If the query execute
    {
     $_SESSION['message']=$name." added Successfully"; //Session takes this message to pizza.php 
     echo '<script>window.location="../drinks.php"</script>'; //Redirect the page
        
    }
    else {
        echo "<script>alert('Something wrong')</script>"; //If query doesn't work.......
        mysqli_error($connection);
    }

         
    }
    
    
}
else {
   echo "<script>alert('Could not add to cart... please contact admin')</script>"; //If result's false(notwork);
  
} 
 
        
    } //(drink.php)Drink area finishes here
    
    
    if($fileName=="pasta")
    {
         
         if(!isset($id))
 {
     echo "Could not get the id"; 
     echo mysqli_error($connection);
    exit();
 }
if(!isset($_SESSION["userID"])) //If the user id not set, which means If the user doesn't login
{ 
     echo '<script>alert("Please Login first")</script>';  
     echo '<script>window.location="../pasta.php"</script>'; //Redirect the page

    exit();
}

if(!isset($_SESSION["userID"]))
{
    echo 'User Id is not set';
    exit();
}
else {
    $userId=$_SESSION["userID"];//Gettind ID from Login.php
}

 
$query="select * from pasta where p_id='$id'";
$result=mysqli_query($connection,$query);


if($result)
{
  
    while($row=mysqli_fetch_array($result))
    {
         $productID=$row[0]; // Getting the Id 
        $name=$row["name"];// Getting name from pizza table
        $price=$row["price"]; // Getting price from Pizza table 
         $quantity=1; //Intial value /Default Value
         $status="Pending"; // Default for checking If complete or not; 
        $insertQuery="insert into myorder values('',$productID,$userId,'$name',$price,'$status')";
        $excuteQuery=mysqli_query($connection,$insertQuery);
    if($excuteQuery) //If the query execute
    {
     $_SESSION['message']=$name." added Successfully"; //Session takes this message to pizza.php 
     echo '<script>window.location="../pasta.php"</script>'; //Redirect the page
        
    }
    else {
        echo "<script>alert('Something wrong')</script>"; //If query doesn't work.......
        mysqli_error($connection);
    }

         
    }
     
}
else {
   echo "<script>alert('Could not add to cart... please contact admin')</script>"; //If result's false(notwork);
  
} 
        
         
    }//End of pasta contex
    
     
}
else {
    echo "<script>alert('Could not connect the data')</script>"; //If the data isn't set

}
 
?>