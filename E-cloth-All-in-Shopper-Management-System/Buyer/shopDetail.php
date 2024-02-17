<?php
session_start();
    include("../connection/conn.php");
    include("../includes/buyer_header.php");
    include("../includes/footer.php");
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    <link rel="stylesheet" href="../Buyer_Design/shopDetail.css">
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
        

        

        <!-- end sa notification sa add items -->


            <div class="itemsInTheShop" id = "itemsInTheShop" style = "margin-top: 20px; margin-bottom: 170px; margin-left: 25px;">
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



                    



        
             function DisplayAllItemsInTheShops(ItemSearchValue) {
                    $.ajax({
                        url: "../ajax/buyer_ajax.php",
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