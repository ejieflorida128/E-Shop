<?php
    include("../includes/footer.php");
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

            <a href = "LoadToLogout.php" id = "logout">
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

          <div class="section1">
                
                    <div class="box">
                        <a href = "LoadToHome.php">
                                <div class="title"> 
                                    Home
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                    
                                is the main or introductory webpage of a website, typically serving as the starting point for users to navigate through the site. It often includes essential information, navigation links.
                                    </div>
                        </a>
                    </div>

                    <div class="box">
                            <a href="LoadToStore.php">
                                <div class="title">
                                 Store
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-shop" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                A store is a retail establishment or business where goods or services are sold to customers in exchange for money or other forms of payment.
                                
                            </div>
                                </a>
                    </div>
          </div>
          <div class="section2">
            
                    <div class="box">
                        <a href="LoadToMyCart.php">
                                <div class="title">
                                    My cart
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-cart2" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                refers to the virtual container where users can add items they wish to purchase while browsing the platform's marketplace.
                                </div>
                        </a>
                    </div>

                    <div class="box">
                        <a href="LoadToMyProfile.php">
                                 <div class="title">
                                   Buyer Profile
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                provides concise information about the organization, company, or individuals behind the products or services offered, including details such as its history, mission, values.
                                </div>
                        </a>
                    </div>
          </div>

      </div>    
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
