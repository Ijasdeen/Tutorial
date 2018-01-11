<?php
 
$connection=mysqli_connect("localhost","root","","pizza_hut");
require_once("include/header.php");
?>
<div class="container">
   
    <h3 class="text-muted">Drinks</h3>
    <hr>
    <?php
    $query="select * from beverages order by b_id desc";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($result)):
    ?>
   <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
       
    <form method="POST" action="function/f_pizza.php?name=drinks&id=<?php echo $row[0]?>">
             <div class="thumbnail wow fadeInRight mymenu" data-wow-delay="0.2s">
                <img src="bevarages/<?php echo $row["image"]?>" alt="<?php echo $row["name"]?>" class="img-responsive" style="heigth:250px;">
                <div class="caption">
                    <h3 class="text-muted text-uppercase"><?php echo $row["name"]?></h3>
                    <p class="text-danger">Rs. <?php echo $row["price"]?></p>
                    <p class="text-info"><strong><?php echo $row["des"]?></strong></p>
                    <input type="submit" value="Order now" class="form-control btn btn-success" style="margin-top:20px;">
                    
                </div>
            </div>
        </form>
    </div>    
    <?php
    endwhile; 
    ?>
</div>

<div class="container">
    <hr>
    <?php require_once("include/footer.php");?>
</div>


