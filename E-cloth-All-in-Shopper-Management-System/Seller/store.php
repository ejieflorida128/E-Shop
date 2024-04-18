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
    <title>My Store</title>
    <link rel="stylesheet" href="../Seller_Design/store.css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
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
                            <a href="LoadToStore.php"><i class='bx bx-store'><span>My Store</span></i></a>
                        </div>

                        <div class="forCart">
                            <a href="LoadToPending.php"><i class='bx bx-cart-alt' ><span>Pending</span></i></a>
                        </div>

                        <div class="forProfile">
                            <a href="LoadToProfile.php"><i class='bx bx-user' ><span>Seller Profile</span></i></a>
                        </div>

                        <div class="forLogout">
                            <a href="LoadToLogout.php"><i class='bx bx-door-open'><span>Logout</span></i></a>
                        </div>
                </div>

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 80px;" >
                    <div class = "contain">
                                <!-- item list for mobile -->
                                <div class="searchItemsForMobile" id = "shopListForMobile" style = "margin-left: 8px;">
                                     <!-- search items from the database -->
                                 </div>

                               
                                
                    </div>
        </div>
    </div>

    <div class="main">
        <!-- Modal for shop creation -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#putStoreToDb">
            Create shop
        </button>
        <div class="modal fade" id="putStoreToDb" style="margin-top: 100px;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Shop Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="shop_name">Shop Name:</label><br>
                            <input type="text" class="form-control" id="shop_name" required>
                            <label for="shop_num">Shop Contact Number:</label><br>
                            <input type="text" class="form-control" id="shop_num" required>
                            <label for="shop_gmail">Shop Email:</label><br>
                            <input type="email" class="form-control" id="shop_gmail" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="refreshIfClose()">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="storingStoreToDb()">Confirm Create</button>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Notification Modal for Shop Creation -->
        <div class="modal" tabindex="-1" id="succesfullyCreatedaShop" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <p>You have Successfully Created A shop!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container to display shops -->
        <div class="shopList" id="ListOfShop">
            <!-- This will be populated with shop data -->
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
      // Call displayMyStoresList function on page load para makita every refersh
        $(document).ready(function(){
            displayMyStoresList();
            displayMyStoresListMobile();
        });


        // Function to refresh the page if modal is closed
        function refreshIfClose(){
            $(document).ready(function(){
            displayMyStoresList();
            displayMyStoresListMobile();
              });
        }

        // Function to store shop details to the database
        function storingStoreToDb(){
            var shopName = $('#shop_name').val();
            var shopContactNo = $('#shop_num').val();
            var shopEmail = $('#shop_gmail').val();
            $.ajax({
                url: "../ajax/seller_ajax.php",
                type: 'post',
                data: {
                    shopName: shopName,
                    shopContactNo: shopContactNo,
                    shopEmail: shopEmail
                },
                success: function (data, status) {
                    $('#putStoreToDb').modal('hide');                
                    $('#succesfullyCreatedaShop').modal('show');
                }
            });
        }

        // Function to display list of shops
        function displayMyStoresList() {
            $.ajax({
                url: "../ajax/seller_ajax.php",
                type: 'post',
                data: {
                    ListOfShop: true
                },
                success: function (data, status) {
                    console.log(data);
                    $('#ListOfShop').html(data);                       
                }
            });
        }



          // for mobile
         // Function to display list of shops
         function displayMyStoresListMobile() {
            $.ajax({
                url: "../ajax/seller_ajax.php",
                type: 'post',
                data: {
                    ListOfShopMobile: true
                },
                success: function (data, status) {
                    console.log(data);
                    $('#shopListForMobile').html(data);                       
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
