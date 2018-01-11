<?php
$connection=mysqli_connect("localhost","root","","pizza_hut");
$oder_id=$_GET["id"];
if($connection)
{
    $query="delete from myorder where order_id='$oder_id'";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        header("location:../order.php");
    }
    else {
        echo "Something wrong";
    }
}
mysqli_close($connection);
?>