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
</head>
<body>
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



        <script>

            $(document).ready(function () {
                tableForCompleteDeliveries();  
                              
            });

            function refreshIfClose(){
                    $(document).ready(function () {
                     location.reload();
                     tableForCompleteDeliveries();              
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



            
            
        </script>
</body>
</html>