<?php
require_once("include/header.php");
$connection=mysqli_connect("localhost","root","","pizza_hut");
if(!$connection)
{
    echo "<script>alert('Connection failed.. please contact admin')</script>";
    echo "<script>window.locaiton='index.php'</script>";

}
$userId="";
$total=0;
$mytotal="";
if(isset($_SESSION["userID"]))
{
 $userId=$_SESSION["userID"];
}
else {
    echo "<script>alert('Please Login first')</script>";
    echo "<script>window.location='index.php';</script>";
    
}
   $query="select * from myorder where user_id='$userId' and status='Pending'";
       $result=mysqli_query($connection,$query);
       $count=mysqli_num_rows($result); 
    
?> 
   <div class="container" style="margin-top:50px;">
     <div class="row">
      <div class="col-md-4 col-lg-12 col-sm-2 col-xs-12">
      <h3 class="text-info">Order details</h3><br>
         <?php
            if(isset($_SESSION["orderCompletedMessage"]))
            {
                ?>
            <div class="alert alert-info">
                <?php echo $_SESSION["orderCompletedMessage"];?>
            </div>
            <?php
            } 
             ?>
            <pre>Total product(s) : <?php echo $count;?></pre>
                    <div class="table-responsive">
               <table class="table table-bordered table-responsive" id="orderTable">
                            <thead>
                                <tr>
                                    <th width="40%">Item name</th>
                                    <th width="10%">quantity</th>
                                    <th width="20%">price</th>
                                    <th width="15%">Total</th>
                                    <th width="5%">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
          if($result)  
          {
           while($row=mysqli_fetch_array($result)) //Fetching data by array
           {
               
       ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["name"];?>
                                        </td>
                                        <td>1</td>
                                        <td> Rs&nbsp;
                                            <?php echo $row["price"];?>
                                        </td>
                                        <td>
                                            <?php echo $row["price"];?>
                                        </td>
                                        <td align="center" id="removeArea">

                                            <a href="function/removeItem.php?id=<?php echo $row[0];?>"><i class="fa fa-times text-danger" aria-hidden="true" id="cross"></i></a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                $total+=$row[4];
             }
           ?>
                                            <td colspan="3" align="right"><span class="text-danger"><strong>Total</strong></span></td>
                                            <td align="right"><span class="text-info">RS. &nbsp;<?php
           if($total==0)
           {
             $total=0;
           }
           echo number_format($total,2)?></span></td>
                                    </tr>
                                    <?php
         
       }
               ?>
                            </tbody>

                        </table>

                        <?php if($count!=0):?>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#chooseModal" id="modalButton" style="margin-top:5px;">Ready to Check out</button>
                        <?php endif;?>
                        <div class="modal fade" id="chooseModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" id="ChooseModalHeader">
                                        <h3>Choose your Way to order</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6">
                                                    <div>
                                                        <div><a href="#" id="deliverPicdisable"><img src="Images/mypic.PNG" alt="Pizza hut"></a>
                                                            <a href="#" id="deliverPicEnable"><img src="Images/mypic2.PNG" alt="Choose"></a>
                                                        </div>
                                                        <h3 style="margin-top:12px; margin-left:12px;" class="text-danger">Deliver</h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <a href="#"><img src="Images/takepizza.PNG" alt="Taken pic" id="takenPicDisable"></a>
                                                    <img src="Images/takepizza2.PNG" alt="Taken pic2" id="takenPicEnable">
                                                    <h3 style="margin-top:12px; margin-left:12px;" class="text-danger">Carryout</h3>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="deliverSide">
                                            <div>
                                                <h4 class="text-danger">Please Enter your address below</h4><br>
                                            </div>
                                            <form action="function/confirmOrder.php" method="POST" onsubmit="return checkOrderAddress()">
                                                <div class="form-group">
                                                    <input type="text" name="address" id="orderAddress" placeholder="Address*" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="apt" id="orderAPT" placeholder="Apt/Suite/Bldg" class="form-control">
                                                </div>
                                                <input type="submit"id="optionalAddress" class="form-control btn btn-info" value="Deliver me">
                                            </form>
                                        </div>
                                        <div class="text-info" id="taken"><strong>Your pizza would be ready. you may come and collect after 5 minutes.</strong></div>
                                        <a href="function/confirmOrder.php?key=mykey" class="btn btn-info" id="confirmOrder" name="confirmOrder">Confirm my order</a>
                                       
                                    </div>

                                    <div class="modal-footer">
                                     <a href="https://www.google.com/maps/search/Kallady+beach/@7.721115,81.716043,13z?hl=en-US" class="btn btn-info" target="_blank">Find the restaurant</a>
                                    <strong id="orderMessage" class="text-danger"></strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
             </div>
                    </div>

                    <div class="container" style="margin-top:180px;">
                        <hr>
                        <?php
            $_SESSION["orderCompletedMessage"]="";
    require_once("include/footer.php");
    ?>
                    </div>