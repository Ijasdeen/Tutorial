<?php
 
$connection=mysqli_connect('localhost',"root","","pizza_hut");
require_once("include/header.php");
 
?>
<div class="container">
    <h3 class="text-muted text-uppercase">Pasta</h3>
    <hr>
    <?php
    $query="select * from pasta";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($result)):
    ?>
    <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 mymenu" style="padding:10px; margin-top:20px;">
    <form method="POST" action="function/f_pizza.php?name=pasta&id=<?php echo $row[0]?>">
             <div class="thumbnail wow fadeInRight mymenu" data-wow-delay="0.2s">
                <img src="pasta/<?php echo $row["image"]?>" alt="<?= $row["name"]?>">
                <div class="caption">
                    <h4 class="text-info text-uppercase"><?php echo $row["name"]?></h4>
                    <p class="text-pirmary">Rs. <?php echo $row["price"]?></p>
                    <p class="text-danger"><?php echo $row["des"]?></p>
                    
                    <input type="submit" value="Order now" class="form-control btn btn-success"  style="margin-top:10px;">
                </div>
            </div>
        </form>
    </div>
    <?php
    endwhile; 
    ?>
      </div>
 
<hr>
<div class="container">
    <?php
require_once("include/footer.php");
?>
</div>