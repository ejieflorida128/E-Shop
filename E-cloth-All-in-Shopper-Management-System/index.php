<?php
    // start sa php code

    include("connection/conn.php");
    session_start();

    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

              
               

                    $sqlCheckForBuyerAccount = "SELECT * FROM buyer_account";
                    $sqlBuyer = mysqli_query($connForMyDatabase,$sqlCheckForBuyerAccount);

                    while($buyer = mysqli_fetch_assoc($sqlBuyer)){
                        if($buyer['username'] == $username && $buyer['password'] == $password){
                            // code for redirecting to the buyer dashboard
                           
                            header('Location: Buyer/dashboard.php');
                        }
                    }
                   



                    // check for the seller account
                    $sqlCheckForSellerAccount = "SELECT * FROM seller_account";
                    $sqlSeller = mysqli_query($connForMyDatabase,$sqlCheckForSellerAccount);

                    while($seller = mysqli_fetch_assoc($sqlSeller)){
                        if($seller['username'] == $username && $seller['password'] == $password){
                            // code for redirecting to the buyer dashboard
                            
                            $_SESSION['username'] = $username; 
                            header('Location: Seller/dashboard.php');
                        }
                    }


                    // para mo notif if wala juy existed account sa seller ug buyer

                    echo "
                    <script>
                        alert('Account Didn't Exist in the Database!!');
                    </script>
                     ";

                

        }else{
            echo "
            <script>
                alert('Please Input the needed Information!');
            </script>
        ";

        }
    }
    // end sa php code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel = "stylesheet" href = "index.css">
   
</head>
<body>
        <div class = "header">

            <!-- start sa header section -->

            <div class = "logo">
                <img src = "images/logo.png">
            </div>
            
            <div class = "loginText">
                LOG IN
            </div>

            
            <!-- end sa header section -->

        </div>
        <div class = "main">
           <!-- start sa main na section -->

            <div class = "part1">
                <div class = "picStorage1">
                    <div class = "firstPicture"></div>
                    <div class = "ShopNaText">
                       <b>Shop na!</b>
                       <div class = "line1"></div>
                       <div class = "line2"></div>
                       <div class = "SecondPicture"></div>
                    </div>
                </div>
                <div class = "picStorage2">
                    <div class = "line3"></div>
                    <div class = "ThirdPicture"></div>
                    <div class = "storage3">
                        <p class = "paragraph1">
                            "E-Cloth All-In Shopper Management System" stands as a sophisticated and 
                            forward-thinking digital solution poised to redefine the landscape of retail 
                            operations. This comprehensive platform is meticulously designed to address the
                             multifaceted needs of both retailers and consumers, ushering in a new era of efficiency 
                             and convenience.
                        </p>
                        <a href = "register.php" class = "linkToRegister">CREATE ACCOUNT</a>
                    </div>
                  
                </div>
            </div>
            
            <div class="part2">
                <form action = "index.php" method = "post">

                    <div class="storageForLogIn">
                        <img src = "images/bag.png" class = "bagImage">
                        
                    </div>

                    <div class="user">
                        <img src="images/profile_icon.png">
                        <input type = "username" name = "username">
                    </div>

                    <div class="password">
                        <img src="images/password_icon.png">
                        <input type = "password" name = "password">
                    </div>


                    <div class="forLoginButton">
                        <input type = "submit" value = "LOG IN">
                    </div>


                </form>
                   

                   
            </div>
         
          
                
            <!-- end sa main na section -->

        </div>
        <?php
    include("includes/footer.php");
        ?>
</body>
</html>