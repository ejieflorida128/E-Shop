<?php
include("connection/connection.php");



if($_SERVER['REQUEST_METHOD'] == "POST"){



    
    $choosedType = $_POST['choose_settings'];

    if(isset($choosedType)){

        if($choosedType == "SELLER"){
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $checkCredentials = "SELECT * FROM seller_account";
                $checksql = mysqli_query($connForMyDatabase,$checkCredentials);
                $checkerNumber = 0;
                while($check = mysqli_fetch_assoc($checksql)){
                    if($check['username'] == $username || $check['password'] == $password){
                        $checkerNumber = 1;
                    }
                }
                if($checkerNumber == 1){

                  
                    $Existedinselleraccount = true;

                    $checkerNumber = 0;

                    
                }else{

                    $checkAccountInfoFromBuyer = "SELECT * FROM buyer_account";
                    $checkForSameAccount = mysqli_query($connForMyDatabase,$checkAccountInfoFromBuyer);

                    $sellerChecker = 0;

                    while($checkSameAccountBuyer = mysqli_fetch_assoc($checkForSameAccount)){
                        if($checkSameAccountBuyer['username'] == $username || $checkSameAccountBuyer['password'] == $password){
                            $sellerChecker = 1;
                        }
                    } 

                    if($sellerChecker == 1){
                        $Existedinbuyeraccount = true;

                    }else{

                        $DefaultProfilePic = "../profile_picture/default.jpg";
                        $age = 0;
                        $bio = " bio is a way to give people a quick glimpse into who you are.";
                        $fullname = "Please input information";

                        $sql = "INSERT INTO seller_account (username,password,profile_pic,fullname,age,bio) VALUES ('$username','$password','$DefaultProfilePic','$fullname','$age','$bio')";
                        mysqli_query($connForMyDatabase,$sql);
        
                       $SellerAccountCreatedSuccessfully = true;
                    }
                    
    
                    
                }
            }
        }else if ($choosedType == "BUYER"){
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $checkCredentials = "SELECT * FROM buyer_account";
                $checksql = mysqli_query($connForMyDatabase,$checkCredentials);

                $checkerNumber = 0;
                while($check = mysqli_fetch_assoc($checksql)){
                    if($check['username'] == $username || $check['password'] == $password){
                        $checkerNumber = 1;
                    }
                }
                if($checkerNumber == 1){

                   
                  $Existedinbuyeraccount = true;


                    
                }else{

                    $checkAccountInfoFromSeller = "SELECT * FROM seller_account";
                    $checkForSameAccount = mysqli_query($connForMyDatabase,$checkAccountInfoFromSeller);

                    $sellerChecker = 0;

                    while($checkSameAccountSeller = mysqli_fetch_assoc($checkForSameAccount)){
                        if($checkSameAccountSeller['username'] == $username || $checkSameAccountSeller['password'] == $password){
                            $sellerChecker = 1;
                        }
                    } 

                    if($sellerChecker == 1){
                        $Existedinselleraccount = true;

                    }else{

                        $DefaultProfilePic = "../profile_picture/default.jpg";
                        $age = 0;
                        $location = "Please put your designated location for delivery!";
                        $fullname = "Please input information!";

                        $sql = "INSERT INTO buyer_account (username,password,profile_pic,fullname,age,location) VALUES ('$username','$password','$DefaultProfilePic','$fullname','$age','$location')";
                        mysqli_query($connForMyDatabase,$sql);
        
                          $BuyerAccountCreatedSuccessfully = true;
                    }
                    
                  
    
                    
                }
            }
        }else{
          $PleaseSelectUserType = true;
        }

       
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel = "stylesheet" href = "register.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    
</head>
<body>
    <div class = "header">
        <div class = "logo">
            <img src = "images/logo.png">
           
        </div>
        <div class = "loginText">
            CREATE ACCOUNT
        </div>
    </div>

    <form action="index.php" method = "post">
                        <div class="container" id = "mobileView">
                                <div class="wrapper" style = "margin-top:50%">
                                    <div class="title"><span>Register Form</span></div>
                                    <form action="#">

                                        <div class="row" style = "display: flex; justify-content: center; margin-top: 30px;">
                                                <select id="dropdown" name = "choose_settings" class = "form-control" style = "width: 70%;">
                                                <option value="None" name = "none">None</option>
                                                <option value="BUYER" name = "choose">Buyer</option>
                                                <option value="SELLER" name = "choose">Seller</option>                        
                                                </select>
                                        </div>  


                                        <div class="row" style = "display: flex; justify-content: center; margin-top: 20px;">
                                            <input type="text" class = "form-control" style = "width: 70%;" name = "username" placeholder = "Username">
                                        </div>

                                        <div class="row" style = "display: flex; justify-content: center; margin-top: 20px;">
                                            <input type="text" class = "form-control" style = "width: 70%;" name = "password" placeholder = "Password">
                                        </div>
                                    
                                    <div class="row button" style = "display:flex; justify-content:center; margin-top: 30px;">
                                        <input type="submit" value="Register" class = "btn btn-success" style = "width: 50%;">
                                    </div>
                                    <div class="signup-link" style = "display:flex; justify-content:center; margin-top:10px; margin-bottom: 100px; padding: 10px;">Already a member? <a href="index.php">Login now</a></div>
                                    
                                    </form>
                                </div>
                        </div>
     </form>
    
  <div class="desktop">
  <div class = "main">
   

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
               <a href = "LoadIndex.php" class = "linkToRegister">LOG IN</a>
           </div>
       </div>
   </div>
   <div class="part2">
       <form action = "register.php" method = "post">
           <div class="storageForLogIn">
               <img src = "images/bag.png" class = "bagImage">
           </div>
           <div class="option">
               <img src="images/option_icon.png">
               <select id="dropdown" name = "choose_settings">
                   <option value="None" name = "none">None</option>
                   <option value="BUYER" name = "choose">Buyer</option>
                   <option value="SELLER" name = "choose">Seller</option>                        
               </select>
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
               <input type = "submit" value = "SIGN UP" name = "signup_button">
           </div>
       </form>
   </div>
</div>

  </div>

    
<?php
    if (isset($PleaseSelectUserType)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Please Select User type!</p>
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
    if (isset($BuyerAccountCreatedSuccessfully)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Buyer Account Created Successfully!</p>
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
    if (isset($SellerAccountCreatedSuccessfully)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Seller Account Created Successfully!</p>
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
    if (isset($Existedinselleraccount)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Already Existed in the seller account Database!</p>
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
    if (isset($Existedinbuyeraccount)) {
    ?>
        <div class='modal' tabindex='-1' role='dialog' style = "margin-top: 190px;">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>SYSTEM</h5>
                        
                    </div>
                    <div class='modal-body'>
                        <p>Already Existed in the buyer account Database!</p>
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
