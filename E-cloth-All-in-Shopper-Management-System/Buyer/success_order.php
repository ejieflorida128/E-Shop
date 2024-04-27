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
    <title>Document</title>
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
                <div class="containerS" style=" height: 100vh; margin-top: 50px;">
                    <a href="LoadToUserDashboard.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">DASHBOARD</a>
                    <a href="LoadToHome.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 70px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">HOME</a>
                    <a href="LoadToStore.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 140px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">STORE</a>
                    <a href="LoadToMyCart.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 210px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">CART</a>
                    <a href="LoadToMyProfile.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 280px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PROFILE</a>
                    <a href="LoadToLogout.php" style="color: black; background-color: red; color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; bottom: 10px; margin-top: 350px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">LOGOUT</a>
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

                    <div class="tableForCompleteDeliveriesForMobiles" id = "tableForCompleteDeliveriesForMobiles"> 
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
                        <div class="tableInfo" id = "tableForCompleteDeliveries">
                            <!-- displaying current cart of the buyer -->

                        </div>
                </div>
        </div>
       </div>



        <script>

            $(document).ready(function () {
                tableForCompleteDeliveries();  
                tableForCompleteDeliveriesForMobile();
                              
            });

            function refreshIfClose(){
                    $(document).ready(function () {
                     location.reload();
                     tableForCompleteDeliveries();          
                     tableForCompleteDeliveriesForMobile();    
            });
            }


            function tableForCompleteDeliveries(){
                $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                            tableForCompleteDeliveries:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableForCompleteDeliveries').html(data);                       
                        }
                    });
            }

            function tableForCompleteDeliveriesForMobile(){
                $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                            tableForCompleteDeliveriesForMobile:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableForCompleteDeliveriesForMobiles').html(data);                       
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