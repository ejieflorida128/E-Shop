<?php
include("connection/conn.php");
include("footer.php");


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

                  
                    echo "
                        <script>
                            alert('Account already existed in the Seller Account Database!');
                        </script>
                    ";

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
                        echo "
                        <script>
                            alert('Account exist in Buyer Account List!');
                        </script>
                    ";

                    }else{
                        $store = "none";
                        $sql = "INSERT INTO seller_account (store,username,password) VALUES ('$store','$username','$password')";
                        mysqli_query($connForMyDatabase,$sql);
        
                        echo "
                            <script>
                                alert('Seller Account Created Successfully!');
                            </script>
                        ";
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

                   
                    echo "
                    <script>
                        alert('Account is Already in the Buyer Account Database!');
                    </script>
                ";


                    
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
                        echo "
                        <script>
                            alert('Account exist in Seller Account List!');
                        </script>
                    ";

                    }else{
                        
                        $sql = "INSERT INTO buyer_account (username,password) VALUES ('$username','$password')";
                        mysqli_query($connForMyDatabase,$sql);
        
                        echo "
                            <script>
                                alert('User Account Created Successfully!');
                            </script>
                        ";
                    }
                    
                  
    
                    
                }
            }
        }else{
            echo "
            <script>
                alert('Please Select User Type!');
            </script>
        ";
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
                    <a href = "index.php" class = "linkToRegister">LOG IN</a>
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
   
</body>
</html>
