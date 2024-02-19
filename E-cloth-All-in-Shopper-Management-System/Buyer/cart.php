<?php
        include("../connection/conn.php");
    session_start();
    include("../includes/buyer_header.php");
    include("../includes/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="../Buyer_Design/cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


        <div class="optionForCart" style = "margin-top: 120px; margin-left: 40px; display:flex;">
            <a href="cart.php" class = "btn btn-primary" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">My cart</a>
            <a href="#" class = "btn btn-warning" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Pending Orders</a>
            <a href="#" class = "btn btn-info" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Parcel Status</a>
            <a href="#" class = "btn btn-danger" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Cancelled</a>
            <a href="#" class = "btn btn-success" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Successful Delivery</a>
        </div>


        <div class="container">
                <div class="table">
                        <div class="tableInfo" id = "tableForCart">
                            <!-- displaying current cart of the buyer -->

                        </div>
                </div>
        </div>


        <!-- modal -->
<div class="modal" tabindex="-1" id = "SuccesfulDeletedFromCart" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Edited Successfully!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>


 <!-- modal -->
 <div class="modal" tabindex="-1" id = "addToOrderPending" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Selected Item is Processing in the Pending Order Page </p>
        <p>Please wait for seller to confirm your item order!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>




        <script>

            $(document).ready(function () {
                    displayTableForCart();  
                              
            });

            function refreshIfClose(){
                    $(document).ready(function () {
                     location.reload();
                    displayTableForCart();              
            });
            }


            function displayTableForCart(){
                $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                                displayCart:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableForCart').html(data);                       
                        }
                    });
            }



            function DeleteCart(id){
                    var CartId = id;

                    $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                                toDeleteCart:true,
                                CartId:CartId
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#SuccesfulDeletedFromCart').modal('show');                       
                        }
                    });

            }


            function AddToOrderPending(cartId,BuyerId,SellerId,itemname,itemPrice,itemSource,buyerFullname,buyerLocation,buyerAge,Seller){

                var cartId = cartId;
                var BuyerId = BuyerId;
                var SellerId = SellerId;
                var itemName = itemname;
                var itemPrice = itemPrice;
                var itemSource = itemSource;
                var buyerFullname = buyerFullname;
                var buyerLocation = buyerLocation;
                var buyerAge = buyerAge;
                var Seller = Seller;

                $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                                AddToOrderPending:true,
                                cartId:cartId,
                                BuyerId:BuyerId,
                                SellerId:SellerId,
                                itemName:itemName,
                                itemPrice:itemPrice,
                                itemSource:itemSource,
                                buyerFullname:buyerFullname,
                                buyerLocation:buyerLocation,
                                buyerAge:buyerAge,
                                Seller:Seller
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#addToOrderPending').modal('show');                       
                        }
                    });

            }
            
        </script>
    
    
</body>
</html>