<?php
    // start sa php code
    session_start();
    
    include("connection/connection.php");
  

    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

              
               

                    $sqlCheckForBuyerAccount = "SELECT * FROM buyer_account";
                    $sqlBuyer = mysqli_query($connForMyDatabase,$sqlCheckForBuyerAccount);

                    while($buyer = mysqli_fetch_assoc($sqlBuyer)){
                        if($buyer['username'] == $username && $buyer['password'] == $password){
                            // code for redirecting to the buyer dashboard
                           
                            $_SESSION['username'] = $username;
                            $_SESSION['id'] = $buyer['id'];
                            $_SESSION['fullname'] = $buyer['fullname'];
                            $_SESSION['profile_pic'] = $buyer['profile_pic'];
                            header('Location: Buyer/LoadToUserDashboard.php');
                        }
                    }
                   



                    // check for the seller account
                    $sqlCheckForSellerAccount = "SELECT * FROM seller_account";
                    $sqlSeller = mysqli_query($connForMyDatabase,$sqlCheckForSellerAccount);

                    while($seller = mysqli_fetch_assoc($sqlSeller)){
                        if($seller['username'] == $username && $seller['password'] == $password){
                            // code for redirecting to the buyer dashboard
                            
                            $_SESSION['username'] = $username;
                            $_SESSION['sellerID'] = $seller['id']; 
                            header('Location: Seller/LoadToSellerDashboard.php');
                        }
                    }


                    // para mo notif if wala juy existed account sa seller ug buyer

                  $modalFForAccountExisted = true;

                

        }else{
            $modalPutCredintials = true;

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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

   
</head>
<body>
        <div class = "header">

            <!-- start sa header section -->

            <div class = "logo">
                <img src = "images/logo.png">
             
            </div>

            <div class="xml">
            <a href="xml/pages/export.php" class = "btn btn-primary" style = "box-shadow: 0px 4px 10px 1px rgba(14, 205, 75, 0.1); position: relative; top: 40px; left: 30px;">Offline Mode</a>
            </div>
            
            
            <div class = "loginText">
                LOG IN
            </div>

            
            <!-- end sa header section -->

        </div>
        <form action="index.php" method = "post">
                        <div class="container" id = "mobileView">
                                <div class="wrapper" style = "margin-top:50%;">
                                    <div class="title"><span>Login Form</span></div>
                                    <form action="#">
                                        
                                        <div class="row" style = "display: flex; justify-content: center; margin-top: 30px;">
                                            <input type="text" class = "form-control" style = "width: 70%;" name = "username" placeholder = "Username">
                                        </div>

                                        <div class="row" style = "display: flex; justify-content: center; margin-top: 20px;">
                                            <input type="text" class = "form-control" style = "width: 70%;" name = "password" placeholder = "Password">
                                        </div>
                                    
                                    <div class="row button" style = "display:flex; justify-content:center; margin-top: 30px;">
                                        <input type="submit" value="Login" class = "btn btn-success" style = "width: 50%;">
                                    </div>
                                    <div class="signup-link" style = "display:flex; justify-content:center; margin-top:10px; margin-bottom: 100px; padding: 10px;">Not a member? <a href="register.php">Signup now</a></div>
                                    </form>
                                </div>
                                </div>
                        </form>
                    
  <div class="desktop">
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
                        <a href = "LoadRegister.php" class = "linkToRegister">CREATE ACCOUNT</a>
                    </div>
                  
                </div>
            </div>
            
            <div class="part2">
                <form action = "index.php" method = "post" >

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
  </div>

        <?php
    if (isset($modalPutCredintials)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Please put all credentials needed!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' id = "close" data-bs-dismiss='modal'>Close</button>
                       
                    </div>
                </div>
            </div>
        </div>


        <script>
    // Use JavaScript to show the modal after the page is loaded
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelector('.modal'));
        myModal.show();

        // Close modal when close button or outside modal area is clicked
        var closeModalButton = document.querySelector('.modal #close');
        closeModalButton.addEventListener('click', function () {
            myModal.hide();
        });
    });
</script>


       
    <?php
    }
    ?>



<?php
    if (isset($modalFForAccountExisted)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Account is not registered in the database!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' id = "close" data-bs-dismiss='modal'>Close</button>
                       
                    </div>
                </div>
            </div>
        </div>


        <script>
    // Use JavaScript to show the modal after the page is loaded
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.querySelector('.modal'));
        myModal.show();

        // Close modal when close button or outside modal area is clicked
        var closeModalButton = document.querySelector('.modal #close');
        closeModalButton.addEventListener('click', function () {
            myModal.hide();
        });
    });
</script>


       
    <?php
    }
    ?>

       
        
</body>
</html>