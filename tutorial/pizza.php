<?php
$connection=mysqli_connect('localhost',"root","","pizza_hut");
require_once("include/header.php");

?>
 

<div class="container">
    <h3 class="text-uppercase">PIZZA</h3>
   
   <ul class="nav nav-tabs" id="myTab">
  <li class="active"><a data-toggle="tab" href="#popular">Popular</a></li>
  <li><a data-toggle="tab" href="#meat">Meat</a></li>
  <li><a data-toggle="tab" href="#chicken">Chicken</a></li>
</ul>

<div class="tab-content">
  <div id="popular" class="tab-pane fade in active wow fadeInLeft">
    <h3>Popular Pizzas</h3>
    <?php
      $query="select * from pizza limit 4"; //we are talking only 4 data 
      $result=mysqli_query($connection,$query); 
      while($row=mysqli_fetch_array($result)){
          ?>
           
          <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3" style=" padding:10px" id="pizza-menu">
              <form method="POST" action="function/f_pizza.php?name=pizza&id=<?php echo $row[0]?>">
                  <div class="thumbnail">
                  <img src="<?php echo $row["image"]?>" alt="<?php echo $row["name"]?>" class="img-responsive">
                  <div class="caption">
                      <h3 class="text-info"><?php echo $row["name"]?></h3>
                      <p class="text-primary">RS. <?php echo $row["price"]?></p>
                      <p class="text-danger"><?php echo "<b>". $row["des"]."</b>"?></p>        
                      <input type="submit" value="Order now" class="form-control btn btn-success" id="btn_pizza">
                       
                  </div>
              </div>
              </form>
 
          </div>
          <?php
           
      }
      ?>

  
  </div>
  <div id="meat" class="tab-pane fade">
    <h3>Meat Pizzas</h3>
    <?php
      $query="select * from pizza limit 4,4"; //we are talking only 4 data after first 4 data
      $result=mysqli_query($connection,$query); 
      while($row=mysqli_fetch_array($result)){
         ?>
    <form method="POST" action="function/f_pizza.php?name=pizza&id=<?php echo $row[0]?>">
         <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 wow fadeInLeft" style="padding:10px" id="pizza-menu">
             <form action="function/f_pizza.php?id=<?php echo $row[0]?>">
                 <div class="thumbnail">
                     <img src="<?php echo $row["image"]?>" alt="<?php echo $row["name"]?>" class="img-responsive">
                     <div class="caption">
                         <h3 class="text-info"> <?php echo $row["name"];?></h3>
                         <p class="text-primary">Rs. <?php echo $row["price"]?></p>
                         <p class="text-danger"><strong><?php echo $row["des"]?></strong></p>
                         <input type="submit" value="Order now" class="form-control btn btn-success" id="btn_pizza"> 
                     </div>
                 </div>
             </form>
         </div>
         
         <?php
      }
      
      ?>
     
  </div>
   
  <div id="chicken" class="tab-pane fade">
    <h3>Chicken Pizzas</h3>
    <?php
      $query="select * from pizza limit 8,4"; 
      $result=mysqli_query($connection,$query); 
      while($row=mysqli_fetch_array($result))
      {
          ?>
          <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3 wow fadeInLeft" style="padding:10px" id="pizza-menu">
                        
         <form method="POST" action="function/f_pizza.php?name=pizza&id=<?php echo $row[0]?>">
                            <div class="thumbnail">
                  <img src="<?php echo $row["image"]?>" alt="<?php echo $row["name"]?>" class="img-responsive">
                  <div class="caption">
                      <h3 class="text-info"><?php echo $row["name"]?></h3>
                      <p class="text-primary">Rs. <?= $row["price"]?></p>
                      <p class="text-danger"><strong><?= $row["des"]?></strong></p>
                      <input type="submit" value="Order now" class="form-control btn btn-success" id="btn_pizza"> 
                  </div>
              </div>

                        </form>
                        
                        </div>
          <?php
      }
      ?>
     
  </div>
</div>
   
   
 </div>
 <div class="container" style="margin-top:30px;"> 

    <hr>
     <?php
require_once("include/footer.php");
?>
 </div>
 