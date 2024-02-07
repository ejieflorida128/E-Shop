<?php
include("../connection/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Buyer_Design/dashboard.css">
</head>
<body>  

    <div class="header">
        <div class="logo">
            <img src="../images/logo.png">
        </div>
        <div class="searchbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            <input type="text" name="searchhBar">
        </div>
        <div class="cart">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
            </svg>
        </div>
    </div>

    <div class="main">
        <div class="content">
            <?php
            $getPic = "SELECT * FROM items";
            $sqlForGetPic = mysqli_query($connForMyDatabase, $getPic);
            $cardCount = 0;

            while ($checkPicFromItemTable = mysqli_fetch_assoc($sqlForGetPic)) {
                
                $item = $checkPicFromItemTable['img'];
                echo "
                <div class='card' style='width: 30rem; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);'>
                    <img src='$item'' class='card-img-top'>
                    <div class='card-body'>
                         <h4 class='card-title' style = 'display: flex; justify-content: center;'>12.8$</h4>
                         <h6 class='card-title' style = 'display: flex; justify-content: center;'>Example Product</h6>
                        <div class = 'buynow' style = 'display: flex; justify-content: center; margin-top: 10px;'>
                        <a href='#' class='btn btn-primary' style = 'width: 300px;'>Add To Cart</a>
                        </div>
                      
                    </div>
                </div>
                ";
                $cardCount += 1;
                
                
                 if ($cardCount % 2 == 0) {
                    echo "</div><div class='row mt-5' style = 'style = 30rem; display: flex; justify-content: space-around;'>";
                }

                
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
