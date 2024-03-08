<?php
session_start();    
include("../includes/buyer_header.php");
include("../includes/footer.php");
include("../connection/conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="../Buyer_Design/cartInfo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="containerT">
                <div class="image">
                    <img src="
                            <?php

                            $id = $_GET['id'];

                            $pic = "SELECT img FROM items WHERE id = $id";
                            $query = mysqli_query($connforMyOnlineDb,$pic);
                            $sql = mysqli_fetch_assoc($query);

                            if($sql){
                                echo $sql['img'];
                            }
                            ?>
                    " style = "width: 250px; height: 250px; border-radius: 20px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-left: 30px; margin-top: 40px;">
                </div>
                <div class="information">
                            <?php

                                    $pic = "SELECT * FROM items WHERE id = $id";
                                    $query = mysqli_query($connforMyOnlineDb,$pic);
                                    $sql = mysqli_fetch_assoc($query);

                                    if($sql){


                            ?>

                            <label for="itemName">Item Name:</label>
                            <input type="text" id = "itemName" class = "form-control" style = "width: 630px;" value = "<?php echo $sql['item_name']; ?>" disabled>
                            <label for="itemPrice">Item Price:</label>
                            <input type="text" id = "itemPrice" class = "form-control" style = "width: 100px;" value = "<?php echo $sql['item_price']; ?>" disabled>
                            <div class="div" style = "display: flex; font-size: 30px; position: absolute; left: 1050px; bottom: 120px;">
                                      <?php
                                              $rate = $sql['rate'];
                                              echo $rate;
                                              
                                        ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                            </div>
                            <label for="itemShop">Shop:</label>
                            <input type="text" id = "itemShop" class = "form-control" style = "width: 250px;" value = "<?php echo $sql['item_source']; ?>" disabled>
                            <label for="itemSeller">Seller Information:</label>
                            <input type="text" id = "itemSeller" class = "form-control" style = "width: 300px;" value = "<?php echo $sql['seller']; ?>" disabled>
                            <input type="text" id = "SellerId" class = "form-control" style = "width: 300px;" value = "<?php echo $sql['SellerId']; ?>" disabled hidden>
                                        
                            <?php
                                    }
                            ?>

                            <?php

                                    $id = $_SESSION['id'];

                                    $sql = "SELECT * FROM buyer_account WHERE id = $id";
                                    $query = mysqli_query($connForMyDatabase,$sql);

                                    $call = mysqli_fetch_assoc($query);

                                    if($call){

                                    
                                    
                            ?>
                            
                            <input type="text" id = "BuyerFullname" hidden value = "<?php echo $call['fullname']; ?>" style = "position: absolute;">
                            <input type="text" id = "BuyerLocation" hidden value = "<?php echo $call['location']; ?>" style = "position: absolute;">
                            <input type="text" id = "BuyerAge" hidden value = "<?php echo $call['age']; ?>"style = "position: absolute;" >
                            <input type="text" id = "BuyerId" hidden value = "<?php echo $call['id']; ?>"style = "position: absolute;" >
                            <input type="number" id = "BuyerNumber" hidden value = "<?php echo "0".$call['number']; ?>"style = "position: absolute;" >
 
                            <?php

                                    }
                            ?>
                            
                           
                            


                        
                </div>
        </div>

        <div class="buttons" style = "position: absolute; top: 480px; left: 170px; ">
            <a href="home.php" class = "btn btn-danger" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); border-radius: 10px;">Back To Home</a>
            <button class = "btn btn-primary" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); border-radius: 10px;" onclick = "AddtoCart()">Confirm Add to Cart</button>
        </div>
    </div>



    <!-- modal -->
<div class="modal" tabindex="-1" id = "SuccesfullAddToCart" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
      </div>
      <div class="modal-body">
        <p>Added to cart Successfully!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>




    <script>

        function refreshIfClose() {
                $(document).ready(function() {
                    location.reload();
                });
            }



            function AddtoCart(){

                var itemName = $('#itemName').val();
                var itemPrice = $('#itemPrice').val();
                var itemShop = $('#itemShop').val();
                var itemSeller = $('#itemSeller').val();
                var SellerId = $('#SellerId').val();
                

                var BuyerFullname = $('#BuyerFullname').val();
                var BuyerLocation = $('#BuyerLocation').val();
                var BuyerAge = $('#BuyerAge').val();
                var BuyerId = $('#BuyerId').val();
                var BuyerNumber = $('#BuyerNumber').val();

                                 $.ajax({
                                        url: "../ajax/buyer_ajax.php",
                                        type: 'post',
                                        data: {
                                            
                                            addtoCart:true,
                                            itemName:itemName,
                                            itemPrice:itemPrice,
                                            itemShop:itemShop,
                                            itemSeller:itemSeller,
                                            BuyerFullname:BuyerFullname,
                                            BuyerLocation:BuyerLocation,
                                            BuyerAge:BuyerAge,
                                            BuyerNumber:BuyerNumber,
                                            BuyerId:BuyerId,
                                            SellerId:SellerId
                                            
                                        },
                                        success: function (data, status) {
                                                        
                                            $('#SuccesfullAddToCart').modal('show');
                                        }
                                    });
            }
    </script>

</body>
</html>