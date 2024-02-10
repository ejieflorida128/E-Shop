<?php
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
</head>
<body>

    <div class="main">

        <!-- start sa modal na creation of shop -->
      
                    <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#putStoreToDb">
                    Create shop
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="putStoreToDb" style = "margin-top: 100px;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Shop Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="shop_name">Shop Name:</label><br>
                                        <input type="text" class = "form-control" id = "shop_name" required>
                                        <label for="shop_num">Shop Contact Number:</label><br>
                                        <input type="text" class = "form-control" id = "shop_num" required>
                                        <label for="shop_gmail">Shop Email:</label><br>
                                        <input type="email" class = "form-control" id = "shop_gmail" required>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Cancel</button>
                            <button type="button" class="btn btn-success" onclick = "StoringStoreToDb()">Confirm Create</button>
                        </div>
                        </div>
                    </div>
                    </div>

         <!-- end sa creation of shop na modal -->

         <!-- start sa Notification of Creatio of Shop -->
            <div class="modal" tabindex="-1" id = "succesfullyCreatedaShop" style = "margin-top: 150px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>You have Successfully Created A shop!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                       
                    </div>
                    </div>
                </div>
                </div>
        <!-- end sa Notification of Creatio of Shop -->



        
    </div>
    
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
        // function para ma refresh ang website if executed!
      function refreshIfClose(){
                        location.reload();
                    }


    
    // start sa StoringStoreToDb
    function StoringStoreToDb(){

        var ShopCreationClick = true;
        var shopName = $('#shop_name').val();
        var shopContactNo = $('#shop_num').val();
        var shopEmail = $('#shop_gmail').val();

        $.ajax({

                    url: "../ajax/seller_ajax.php",
                    type: 'post',
                    data: {
                        ShopCreationClick:ShopCreationClick,
                        shopName:shopName,
                        shopContactNo:shopContactNo,
                        shopEmail:shopEmail
                    },
                    success: function (data, status) {
                        $('#putStoreToDb').modal('hide');                
                        $('#succesfullyCreatedaShop').modal('show');
                        
                    }

                });

    }
    // end sa StoringStoreToDb

    </script>

</body> 
</html>