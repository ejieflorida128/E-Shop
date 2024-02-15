<?php
    include("../includes/buyer_header.php");
    include("../includes/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="../Buyer_Design/store.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="shopList" id="ListOfShop">
            <!-- This will be populated with shop data -->
        </div>
    



        <script>
             // Call displayMyStoresList function on page load para makita every refersh
        $(document).ready(function(){
            displayMyStoresList();
        });


        // Function to refresh the page if modal is closed
        function refreshIfClose(){
            $(document).ready(function(){
            displayMyStoresList();
              });
        }


          // Function to display list of shops
          function displayMyStoresList() {
            $.ajax({
                url: "../ajax/buyer_ajax.php",
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
        </script>
</body>
</html>