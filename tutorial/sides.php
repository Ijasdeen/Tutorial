<?php
$connection=mysqli_connect("localhost","root","","pizza_hut");
require_once("include/header.php");
?>
<div class="container">
  <h3 class="text-muted">Sides</h3>
  <hr>
   <?php
    $query="select * from sides order by s_id desc";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($result)):
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12 col-lg-4">
       <form method="POST" action="function/f_pizza.php?name=sides&id=<?php echo $row[0]?>">
            <div class="thumbnail wow fadeInRight mymenu" data-wow-delay="0.2s"> 
                <img src="sides/<?php echo $row["image"];?>" alt="<?php echo $row["name"];?>">
                <div class="caption">
                    <h3 class="text-muted text-uppercase"><?php echo $row["name"];?></h3>
                    <p class="text-info">Rs .<?php echo $row["price"]?></p>
                    <p class="text-danger"><?php echo $row["des"]?></p>
                    <input type="submit" value="Order now" name="order_now" class="form-control btn btn-success">
                </div>
            </div>
        </form>
    </div>
    <?php endwhile?>
</div>

<div class="container">
<hr>
        <?php
require_once("include/footer.php");
?>
</div>