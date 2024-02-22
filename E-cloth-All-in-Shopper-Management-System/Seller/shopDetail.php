<?php
session_start();
    include("../connection/conn.php");
    include("../includes/seller_header.php");
    include("../includes/footer.php");
    
    


   

    
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
            <h4>
                <?php    echo $_GET['shopName'];  ?>  's STORE
            </h4>
        </div>

        <div class="main"> 
        <a href = "store.php" class = "btn btn-danger" style = " box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Back to list of Store</a>
           
        <!-- Modal for shop creation -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#putItemToChosenStore" style = "">
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


            <div class="itemsInTheShop" id = "itemsInTheShop" style = "margin-top: 20px; margin-left: 25px; overflow-x: hidden;">
                <!-- automatically regenrated kay naa tay code sa seller ajax -->
            </div>

             <div class  = "container-fluid" style = "margin-top: 30px; font-size: 30px; color: rgb(133, 129, 129);">
                
                <div class = "store" style = "margin-left: 33%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(133, 129, 129)" class="bi bi-search" viewBox="0 0 16 16" style = "margin-left: 30px;">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                         Search More Product
                </div>

                <div class = "info" style = "width: 97vw; border:rgb(133, 129, 129) solid 1px; margin-top: 10px; "></div>
                <div class = "info" style = "width: 97vw;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 30px; border-radius: 10px; font-size: 16px; height: 200px; padding: 28px; display:flex;">
                        

                    <div class = "t1">
                                     Project: E Cloth All in Shopper Management System<br>
                                    Programmer: Ejie Cabales Florida<br>
                                    Course: Bachelor of Science in Information Technology<br>
                                    Year: 2nd Year<br>
                                    Section: BSIT-201<br>   
                                    School: Southern Leyte State University<br>
                            </div>

                            <div class = "t2" style = "margin-left: 300px;">
                                    Gmail: ejieflorida128@gmail.com or ejieflorida000@gmail.com<br>
                                    Contact Number: 09125081976 <br>
                                    GIthub: https://github/ejieflorida128<br>
                                    Facebook: https://facebook/ejieflorida14<br>
                                    Instagram: https://instagram/Code-ejiePrimaryKeysDupss<br>
                                    Online Database: sql6.freesqldatabase.com<br>

                            </div>
                        
            </div>
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
                                            seller:'<?php
                                                    $username = $_SESSION['username'];

                                                    $sql = "SELECT fullname FROM seller_account WHERE username = '$username'";
                                                    $query = mysqli_query($connForMyDatabase,$sql);

                                                    $call = mysqli_fetch_assoc($query);

                                                    if($call){
                                                        echo $call['fullname'];
                                                    }
                                                 ?>',
                                             SellerId:'<?php
                                                    $username = $_SESSION['username'];

                                                    $sql = "SELECT id FROM seller_account WHERE username = '$username'";
                                                    $query = mysqli_query($connForMyDatabase,$sql);

                                                    $call = mysqli_fetch_assoc($query);

                                                    if($call){
                                                        echo $call['id'];
                                                    }
                                            ?>',
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