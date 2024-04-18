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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>

<div class = "mobileView">
    <div class="sidebar">
            <div class="menu" style = "position:fixed; z-index: 20;">
                <input type="checkbox" id = "menu" hidden>
                <label for="menu"><i class='bx bx-menu'></i></label>
                      
                <div class="contentForSidebar">
                        <div class="mlogo"><img src="../images/Screenshot 2024-04-13 141001.png"></div>
                        
                        <div class="forHome">
                            <a href="LoadToHome.php"><i class='bx bx-home-smile'><span>Home</span></i></a>
                        </div>

                        <div class="forStore">
                            <a href="LoadToStore.php"><i class='bx bx-store'><span>Store</span></i></a>
                        </div>

                        <div class="forCart">
                            <a href="LoadToMyCart.php"><i class='bx bx-cart-alt' ><span>My cart</span></i></a>
                        </div>

                        <div class="forProfile">
                            <a href="LoadToMyProfile.php"><i class='bx bx-user' ><span>Buyer Profile</span></i></a>
                        </div>

                        <div class="forLogout">
                            <a href="LoadToLogout.php"><i class='bx bx-door-open'><span>Logout</span></i></a>
                        </div>
                </div>

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 80px;" >
                    <div class = "contain">

                    <div class="options"style = "margin-left: 10px;">
                        <a href="cart.php" class = "btn btn-primary" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">My Cart</a>
                        <a href="pending_order.php" class = "btn btn-warning" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Pending Orders</a>
                        <a href="status_order.php" class = "btn btn-info" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Parcel Status</a>
                        <a href = "cancel_order.php" class = "btn btn-danger" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 10px; margin-bottom: 10px;">Cancelled</a>
                        <a href = "success_order.php" class = "btn btn-success" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 10px; margin-bottom: 10px;">Successfull Delivery</a>

                        
                    </div>

                    <div class="tableInfoForMobile" id = "tableInfoForMobile"> 
                            <!-- displaying current cart of the buyer -->

                        </div>
                                
                  
                               
                                
                    </div>
        </div>
    </div>


   <div class="desktop">
   <div class="optionForCart" style = "margin-top: 120px; margin-left: 40px; display:flex;">
            <a href="cart.php" class = "btn btn-primary" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">My cart</a>
            <a href="pending_order.php" class = "btn btn-warning" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Pending Orders</a>
            <a href="status_order.php" class = "btn btn-info" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Parcel Status</a>
            <a href="cancel_order.php" class = "btn btn-danger" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Cancelled</a>
            <a href="success_order.php" class = "btn btn-success" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Successful Delivery</a>
        </div>


        <div class="container">
                <div class="table">
                        <div class="tableInfo" id = "tableForCart">
                            <!-- displaying current cart of the buyer -->

                        </div>
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
        <p>Successfully Deleted from your cart!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>


 <!-- modal -->
 <div class="modal" tabindex="-1" id = "ManagePayment" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Please Check your Payment Application In order to confirm Payment Transaction!</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <script>

            $(document).ready(function () {
                    displayTableForCart();  
                    displayTableForCartForMobile();
                              
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

            function displayTableForCartForMobile(){
                $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                                displayCartForMobile:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableInfoForMobile').html(data);                       
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


            function ManagePayment(cartId,BuyerId,SellerId,itemname,itemPrice,itemSource,buyerFullname,buyerLocation,buyerAge,Seller,GcashNumber){

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
                var GcashNumber = GcashNumber;

                $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                                ManagePayment:true,
                                cartId:cartId,
                                BuyerId:BuyerId,
                                SellerId:SellerId,
                                itemName:itemName,
                                itemPrice:itemPrice,
                                itemSource:itemSource,
                                buyerFullname:buyerFullname,
                                buyerLocation:buyerLocation,
                                buyerAge:buyerAge,
                                Seller:Seller,
                                GcashNumber:GcashNumber
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#ManagePayment').modal('show');                       
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

<script>
                            function toggleSidebar() {
                                    var sidebarContent = document.getElementById('sidebarContent');
                                        if (sidebarContent) {
                                            if (sidebarContent.style.right === '0px') {
                                                sidebarContent.style.right = '-360px'; // Adjust the value based on the width of your sidebar
                                            } else {
                                                sidebarContent.style.right = '200px';
                                            }
                                        }
                                }



                                                        document.addEventListener('DOMContentLoaded', function () {
                            const menuCheckbox = document.getElementById('menu');

                            menuCheckbox.addEventListener('change', function () {
                                const contentForSidebar = document.querySelector('.contentForSidebar');

                                if (menuCheckbox.checked) {
                                    contentForSidebar.style.left = '0';
                                } else {
                                    contentForSidebar.style.left = '-360px';
                                }
                            });
                        });

                    </script>   
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
</body>
</html>