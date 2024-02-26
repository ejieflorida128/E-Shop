<?php
        session_start();
        include("../connection/conn.php");
        include("../includes/footer.php");
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel = "stylesheet" href = "../Buyer_Design/home.css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div id="top" style = "position: absolute; top: 0;"></div>
    
<div class="header" >
            <div class="menu">

                <div class="home">
                        <a href="dashboard.php">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                    </svg>
                         </a>  
                </div>
                <div class="stores">
                    <a href="store.php">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-shop" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                    </svg>

                         </a>
                </div>
                <div class="cart">
                    <a href="cart.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-cart2" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                    </svg>
                        </a>
                </div>

                <div class="about">
                    <a href="profile.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                    </svg>

                        </a>
                </div>
            </div>

            <div class="count" style = "background-color: red; height: 20px; width: 20px; border-radius: 50%; position: absolute; left: 256px; top: 13px;">
                            
                            <?php

                                include("../connection/conn.php");

                                $id = $_SESSION['id'];



                                $sql = "SELECT * FROM cart_pending WHERE BuyerId = $id";
                                $query = mysqli_query($connForMyDatabase,$sql);

                                $count = 0;

                                while($check = mysqli_fetch_assoc($query)){
                                    $count++;
                                }


                                echo '
                                        <h4 style = "position: absolute; color: white; font-size: 17px; left: 5px; bottom: -7px;">'.$count.'</h4>
                                    ';

                            ?>
                        
                </div>
            
            <div class = "searchBar">
                <input type = "text" name = "searchData" id = "searchData" class = "form-control">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
            </div>    
            
            <div class="logout">
                <a href="../index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-door-closed" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                        </svg>

                        <h6>LOGOUT</h6>

                        </a>    
            </div>
          
</div>



<div class="main" style = "margin-top: 10%; margin-bottom: 5%; margin-left: -60px; overflow-x: hidden;">

    <div class="container">
        <div class="searchItems" id = "searchItems">
                <!-- search items from the database -->
        </div>

        
    </div>

    <div class  = "container-fluid" style = "margin-top: 30px; margin-bottom: 1px; font-size: 30px; color: rgb(133, 129, 129);">
                
                <div class = "store" style = "margin-left: 33%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(133, 129, 129)" class="bi bi-search" viewBox="0 0 16 16" style = "margin-left: 30px;">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                         Search More Product
                </div>

                <div class = "info" style = "width: 97vw; border:rgb(133, 129, 129) solid 1px; margin-top: 10px; margin-left: 63px;"></div>
                <div class = "info" style = "width: 97vw;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 10px; margin-left: 63px; border-radius: 10px; font-size: 16px; height: 200px; padding: 28px; display:flex;">
                        

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

<div class="functions">
        <a href="#top">
                <div class="returnTop">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
                <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0"/>
                </svg>
                </div>
        </a>

        <a href="SellerList.php">
            <div class="mess">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>
            </div>
        </a>
</div>


<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<!-- start of the ajax code or implementing ajax codes   -ejie -->
<script>

        $(document).ready(function () {
            DisplayItems(null);
                $("#searchData").on('input', function () {
                    var value = $(this).val();

                    DisplayItems(value);

                });         
            });


            function DisplayItems(searchValue) {
                    $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                            searchItems: true,
                            searchValue: searchValue
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#searchItems').html(data);                       
                        }
                    });
                }


            

</script>
</body>
</html>