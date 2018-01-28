<?php

require_once("Include/header.php"); //Taking header from include file. The header.php has all the required CDN and other links. 
?>

<div class="container" style="margin-top:20px;">
 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active" id="crousel-div">
                <img src="Images/coursal1.JPG" alt="Los Angeles" style="width:100%; height:300px;">
            </div>

            <div class="item" id="crousel-div">
                <img src="Images/crousal2.JPG" alt="Chicago" style="width:100%; height:300px;">
            </div>

            <div class="item" id="crousel-div">
                <img src="Images/crousal3.JPG" alt="New york" style="width:100%; height:300px;">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container">
    <div class="row" style="margin:25px;">
        <div class="col-md-6 col-xs-12 col-sm-12">
          <a href="pizza.php">  <img src="Images/pizza.PNG" class="img-responsive" alt="" style="width:auto;" id="test"></a>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-12" style="">
            <img src="Images/pizza.PNG" class="img-responsive" alt="" style="width:auto;">

        </div>

    </div>

    <div class="parallax-window" data-parallax="scroll" data-z-index="1" data-image-src="Images/half-pizza.jpg"></div>

    <div class="row" style="margin:20px;" id="ads">
           <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="img-responsive" id="adspic">
                   <img src="Images/mydeal1.PNG" alt="">
                   
               </div>
           </div>
           <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="img-responsive">
                   <img src="Images/mydeal2.PNG" alt="">
               </div>
           </div>
    </div>
    <div class="parallax-window" data-parallax="scroll" data-z-index="1" data-image-src="Images/food-pizza-fast-food.jpg"></div>

    <div class="row" id="bottom-menu">
        <h3 class="text-info">MENU</h3>
        <div class="col-md-4 wow fadeInRight">
            <a href="pizza.php"><img src="Images/menu1.PNG" alt="Menu for Pizza"></a>
        </div>
        <div class="col-md-4 wow fadeInRight">
            <a href="wings.php"><img src="Images/menu2.PNG" alt="Menu for wings"></a>

        </div>
        <div class="col-md-4 wow fadeInRight">
            <a href="sides.php"><img src="Images/menu4.PNG" alt="Menu for Sides"></a>
        </div>




    </div>
    <div class="row wow fadeInLeft" id="bottom-menu" style="margin-top:20px;">
        <div class="col-md-4">
            <a href="pasta.php"><img src="Images/menu5.PNG" alt="Menu for pasta"></a>
        </div>
        <div class="col-md-4 wow fadeInLeft">
            <a href="drinks.php"><img src="Images/menu7.PNG" alt="Menu for drinks"></a>
        </div>
        <div class="col-md-4 wow fadeInLeft">
            <a href="desserts.php"><img src="Images/menu6.PNG" alt="Menu for desserts"></a>
        </div>
    </div>
 
    <?php
    require_once("include/footer.php");
    ?>


</div>



</body>

</html>
