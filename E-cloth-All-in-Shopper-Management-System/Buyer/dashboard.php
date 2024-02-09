<?php
    include("../footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel = "stylesheet" href = "../Buyer_Design/dashboard.css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
      <div class="header">
            <div class="logo">
                <img src="../images/logo.png" alt="logo of the shop">
            </div>
            <div class="list">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#">Shops</a></li>
                    <li><a href="#">Delivery Status</a></li>
                    <li><a href="#">About Us</a></li>

                </ul>
            </div>

            <a href = "../index.php" id = "logout">
            <div class="logoutBtn">
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="white" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg>
                    <h5>LOGOUT</h5>
                
            </div>
            </a>    
      </div>
      <div class="main">

            <div class="textForDashboard">
                <div class = "text">
                      <span>Introducing<span> the E Cloth All-In Management System: a comprehensive solution designed to streamline and optimize various facets of organizational operations. This innovative platform combines cutting-edge technology with user-friendly interfaces to offer a seamless experience for businesses seeking enhanced efficiency and productivity. From inventory management to customer relations, financial tracking, and beyond, E Cloth provides a centralized hub for managing diverse tasks with ease. With customizable features tailored to meet specific business needs, this system empowers users to make informed decisions, improve collaboration, and drive sustainable growth. Welcome to the future of management solutions with E Cloth.
                </div>
                <div class="redirectToAboutUs">
                    <a href="#">
                        MORE DETAILS
                    </a>
                </div>
            </div>

      </div>    
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
