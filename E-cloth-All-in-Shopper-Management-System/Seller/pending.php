<?php
    session_start();
    include("../includes/seller_header.php");
    include("../includes/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="../Seller_Design/pending.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>
<div class = "mobileView" style = "position: fixed; top: 0px;">
    <div class="sidebar">
            <div class="menu" style = "position:fixed; z-index: 20;">
                <input type="checkbox" id = "menu" hidden>
                <label for="menu"><i class='bx bx-menu'></i></label>
                <div class="contentForSidebar">
                <div class="containerS" style=" height: 100vh; margin-top: 50px;">
                    <a href="LoadToSellerDashboard.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">DASHBOARD</a>
                    <a href="LoadToHome.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 70px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">HOME</a>
                    <a href="LoadToStore.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 140px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">MY STORE</a>
                    <a href="LoadToPending.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 210px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PENDING</a>
                    <a href="LoadToProfile.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 280px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PROFILE</a>
                    <a href="LoadToLogout.php" style="color: black; background-color: red; color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; bottom: 10px; margin-top: 350px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">LOGOUT</a>
                </div>
                </div>

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 60px;" >
                    <div class = "contain">
                                <!-- item list for mobile -->
                                <div class="tableForPendingForMobile" id = "tableForPendingForMobile" style = "margin-left: 8px;">
                                     <!-- search items from the database -->
                                 </div>

                               
                                
                    </div>
        </div>
    </div>

      <div class="desktop">
      <div class="optionForCart" style = "margin-top: 90px; margin-left: 0px; display:flex;">
           
           <a href="pending_order.php" class = "btn btn-primary" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin: 10px;">Pending Orders</a>
          
       </div>

       <div class="container">
               <div class="table">
                       <div class="tableInfo" id = "tableForPending">
                           <!-- displaying current cart of the buyer -->

                       </div>
               </div>
       </div>
      </div>


     



        <div class="modal" tabindex="-1" id = "ItemApproved" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Selected Item Succesfully Approved! </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>

$(document).ready(function () {
         displayForSellerPending(); 
         displayForSellerPendingForMobile(); 
                  
});

function refreshIfClose(){
        $(document).ready(function () {
         location.reload();
         displayForSellerPending();     
         displayForSellerPendingForMobile();       
});
}


function displayForSellerPending(){
    $.ajax({
            url: "../ajax/seller_ajax.php",
            type: 'post',
            data: {
                    DisplayPendingOrder:true
            },
            success:function (data, status) {
                console.log(data); // Check the data in the console
                $('#tableForPending').html(data);                       
            }
        });
}

function displayForSellerPendingForMobile(){
    $.ajax({
            url: "../ajax/seller_ajax.php",
            type: 'post',
            data: {
                    DisplayPendingOrderForMobile:true
            },
            success:function (data, status) {
                console.log(data); // Check the data in the console
                $('#tableForPendingForMobile').html(data);                       
            }
        });
}



function Approve(cartId,BuyerId,SellerId,itemname,itemPrice,itemSource,buyerFullname,buyerLocation,buyerAge,Seller){

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
                url: "../ajax/seller_ajax.php",
                type: 'post',
                data: {
                        approveOrder:true,
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
                    $('#ItemApproved').modal('show');                       
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
                                    contentForSidebar.style.left = '-150px';
                                } else {
                                    contentForSidebar.style.left = '-360px';
                                }
                            });
                        });

                    </script>   
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
</body>
</html>