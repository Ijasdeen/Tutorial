<?php
 
$connection=mysqli_connect('localhost',"root","","pizza_hut");
require_once("include/header.php");



?>
<div class="container">
     <h3 class="text-uppercase">wings</h3>
      <hr>
<?php
    $query="select * from wingstreet order by w_id desc"; 
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($result)){
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3"  style="padding:10px; margin-top:20px;">
          <form method="POST" action="function/f_pizza.php?name=wings&id=<?php echo $row[0]?>">
                <div class="thumbnail wow fadeInRight mymenu" data-wow-delay="0.2s">
                    <img src="wings/<?php echo $row["image"]?>" alt="<?php echo $row["name"]?>">
                    <div class="caption">
                        <h3 class="text-info"><?php echo $row["name"];?></h3>
                        <p class="text-primary">Rs. <?php echo $row["price"]?></p>
                        <p class="text-danger"><strong><?php echo $row["des"]?></strong></p>
                        
                        <input type="submit" value="Order now" class="form-control btn btn-success" style="margin-top:20px;">
                        <?php 
            ?>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
    ?>
      
                  
</div>
<div class="container">
   <hr>
    <?php
    require_once("include/footer.php");
    ?>
</div>