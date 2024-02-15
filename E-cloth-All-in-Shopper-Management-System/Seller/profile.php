<?php
session_start();    
    include("../includes/seller_header.php");
    include("../includes/footer.php");
    include("../connection/conn.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../Seller_Design/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container" style = "display: flex;">
        <div class="leftside">

                <div class="profilePic">
                            <img src="
                                    <?php
                                            $LogInedUsername =  $_SESSION['username'];

                                            $sql = "SELECT profile_pic FROM seller_account WHERE username = '$LogInedUsername' ";
                                            $query = mysqli_query($connForMyDatabase,$sql);



                                            while($check = mysqli_fetch_assoc($query)){
                                                    echo $check['profile_pic'];
                                            }
                                    ?>
                            " alt="error" style = "width: 400px;">
                </div>

        </div>
        <div class="rightside">

                            <div class="sellerInformation">
                                     <input type="text" id = "SellerUsername" class = "form-control" style = "width: 300px">
                                     <input type="number" id = "SellerAge" class = "form-control" style = "width: 100px">
                                     <textarea class="form-control" id="Bio" rows="6" style = "width: 500px"></textarea>
                                     <label class = "btn btn-primary" style = "margin-left: 10px; margin-top: 20px; " for = "selectProfilePicture">Choose Profile Pic</label>
                                     <input type="file" id = "selectProfilePicture" hidden>
                                     <button class = "btn btn-success" style = "margin-left: 10px; margin-top: 20px; ">Confirm Edit</button>
                                      
                                    </div>
        </div>
</div>



    
</body>
</html>