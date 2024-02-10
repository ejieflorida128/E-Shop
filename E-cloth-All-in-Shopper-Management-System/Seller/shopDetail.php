<?php
    include("../includes/seller_header.php");
    include("../includes/footer.php");
    
    session_start();


   

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    <link rel="stylesheet" href="../Seller_Design/shopDetail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <div class="header2" style = "position: fixed; top: 0; z-index: 3000; width: 1000px;">
            <h4>Example's Shop</h4>
        </div>

        <div class="main">
             <!-- Modal for shop creation -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#putItemToChosenStore" style = "margin-top: -130px;">
            Add Item
        </button>
        <div class="modal fade" id="putItemToChosenStore" style="margin-top: 100px;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Item Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="item_img">Item Img:</label><br>
                            <input type="file" class="form-control" id="item_img" required><br>
                            <label for="item_price">Price:</label><br>
                            <input type="text" class="form-control" id="item_price" required>
                            <label for="item_name">Name of the product:</label><br>
                            <input type="text" class="form-control" id="item_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Cancel</button>
                        <button type="button" class="btn btn-success" onclick = "AddItemInDb()">Confirm Item Details</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end sa add items -->
        

          <!-- Notification Modal for Shop Creation -->
          <div class="modal" tabindex="-1" id="succesfullyCreatedaShop" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <p>You have Successfully added an item to the shop!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- end sa notification sa add items -->


            <div class="itemsInTheShop" id = "itemsInTheShop" style = "margin-top: -40px; margin-bottom: 170px; margin-left: 25px;">
                <!-- automatically regenrated kay naa tay code sa seller ajax -->
            </div>






        </div>



        <script>   

                    $(document).ready(function () {
                        DisplayAllItemsInTheShops(null);
                            $("#searchData").on('input', function () {
                                var value = $(this).val();

                                DisplayAllItemsInTheShops(value);

                            });         
                        });
        
                    function refreshIfClose(){
                                $(document).ready(function(){
                                    DisplayAllItemsInTheShops(null);
                                });
                    }



                    function AddItemInDb(){
                            var image = $('#item_img').val();

                            var item_price = $('#item_price').val();
                            var item_name = $('#item_name').val();
                            var item_image = image.replace(/C:\\fakepath\\/i, '');

                                $.ajax({
                                        url: "../ajax/seller_ajax.php",
                                        type: 'post',
                                        data: {
                                           
                                            item_image: item_image,
                                            item_price: item_price,
                                            item_name: item_name,
                                            SelectedShop: '<?php echo $_GET['shopName']; ?>'
                                        },
                                        success: function (data, status) {
                                            $('#putItemToChosenStore').modal('hide');                
                                            $('#succesfullyCreatedaShop').modal('show');
                                        }
                                    });
                    }



        
             function DisplayAllItemsInTheShops(ItemSearchValue) {
                    $.ajax({
                        url: "../ajax/seller_ajax.php",
                        type: 'post',
                        data: {
                            ItemsSearchInTheCurrentShop: true,
                            ItemSearchValue: ItemSearchValue,
                            SelectedShop: '<?php echo $_GET['shopName']; ?>'
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#itemsInTheShop').html(data);                       
                        }
                    });
                }

        </script>
</body> 
</html>