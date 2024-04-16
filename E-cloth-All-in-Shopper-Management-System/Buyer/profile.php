<?php
session_start();    
include("../includes/buyer_header.php");
include("../includes/footer.php");
include("../connection/conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../Buyer_Design/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>

<div class = "mobileView">
    <div class="sidebar">
            <div class="menu" style = "position:fixed; z-index: 20;">
                <input type="checkbox" id = "menu" hidden>
                <label for="menu"><i class='bx bx-menu'></i></label>
                        <label for = "searchDataForMobile"><i class='bx bx-search-alt'style="position:absolute; left: 150px;z-index: 10; font-size: 35px; color:black; top: 11px;"></i></label>
                        <input type = "text" id = "searchDataForMobile" name = "searchDataForMobile" class = "form-control" style="width: 200px; height: 40px; position: absolute; right: 10px; top:8px; padding-left: 30px;">
                <div class="contentForSidebar">
                        <div class="mlogo"><img src="../images/Screenshot 2024-04-13 141001.png"></div>
                        
                        <div class="forHome">
                            <a href="LoadToHome.php"><i class='bx bx-home-smile'><span>Home</span></i></a>
                        </div>

                        <div class="forStore">
                            <a href="LoadToStore.php"><i class='bx bx-store'><span>Store</span></i></a>
                        </div>

                        <div class="forCart">
                            <a href="LoadToMyCart.php"><i class='bx bx-cart-alt' ><span>My cart</span></i></a>
                        </div>

                        <div class="forProfile">
                            <a href="LoadToMyProfile.php"><i class='bx bx-user' ><span>Buyer Profile</span></i></a>
                        </div>

                        <div class="forLogout">
                            <a href="LoadToLogout.php"><i class='bx bx-door-open'><span>Logout</span></i></a>
                        </div>
                </div>

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 80px;" >
                    <div class = "contain">
                                <div class="cover">
                                    <img src="../images/buyer.jpg" style="width: 100vw; height: 200px; border: 2px solid grey;">
                                        <div class="pROFILE" style="display:flex; justify-content:center;">
                                        <img src="<?php
                $LogInedUsername =  $_SESSION['username'];
                $sql = "SELECT profile_pic FROM buyer_account WHERE username = '$LogInedUsername' ";
                $query = mysqli_query($connForMyDatabase, $sql);
                while($check = mysqli_fetch_assoc($query)) {
                    echo $check['profile_pic'];
                }
            ?>" style="height: 150px; width: 150px; border-radius: 50%; border: 4px solid black;margin-top: -70px;">
                                        </div>
                                </div>

                                <div class="informations" style="border: 2px solid grey; margin: 10px; margin-top: -10px; font-size: 14px; padding: 10px; border-radius: 20px;" >
                                <label for="BuyerFullname"> Fullname:</label>
                                <input type="text" id="BuyerFullname" class="form-control" style="width: 300px">
                                <label for="BuyerAge">Age:</label>
                                <input type="number" id="BuyerAge" class="form-control" style="width: 100px">
                                <label for="BuyerNumber">Gcash Number:</label>
                                <input type="number" id="BuyerNumber" class="form-control" style="width: 200px">
                                <label for="BuyerLocation">Location:</label>
                                <textarea class="form-control" rows="3" style="width: 300px" id = "BuyerLocation"></textarea>
                                </div>

                                <div class="buttons" style = "margin-top: -5px;">
                                <label class="btn btn-primary" style="margin-left: 10px; margin-top: 0px; padding: 16px;" for="selectProfilePicture" id = "chooseBtnForPic">Choose Profile Pic</label>
                                <input type="file" id="selectProfilePicture" hidden onchange="displaySelectedImage(event)">
                                <button class="btn btn-success" style="margin-left: 10px; margin-top: 0px; padding: 16px;" onclick = "EditDataFromTheProfile()">Saved Information</button>
                                </div>

                               
                                
                    </div>
        </div>
    </div>      


<div class="container" style="display: flex;" id = "desktop">
    <div class="leftside">
        <div class="profilePic">
            <img id="profileImage" src="<?php
                $LogInedUsername =  $_SESSION['username'];
                $sql = "SELECT profile_pic FROM buyer_account WHERE username = '$LogInedUsername' ";
                $query = mysqli_query($connForMyDatabase, $sql);
                while($check = mysqli_fetch_assoc($query)) {
                    echo $check['profile_pic'];
                }
            ?>" alt="Profile Picture" style="width: 450px; height: 450px;">
        </div>
    </div>
    <div class="rightside">
        <div class="buyerInformation">
                <label for="BuyerFullname"> Fullname:</label>
            <input type="text" id="BuyerFullname" class="form-control" style="width: 300px">
            <label for="BuyerAge">Age:</label>
            <input type="number" id="BuyerAge" class="form-control" style="width: 100px">
            <label for="BuyerNumber">Gcash Number:</label>
            <input type="number" id="BuyerNumber" class="form-control" style="width: 200px">
            <label for="BuyerLocation">Location:</label>
            <textarea class="form-control" rows="3" style="width: 500px" id = "BuyerLocation"></textarea>


            <label class="btn btn-primary" style="margin-left: 10px; margin-top: 20px;" for="selectProfilePicture" id = "chooseBtnForPic">Choose Profile Pic</label>
            <input type="file" id="selectProfilePicture" hidden onchange="displaySelectedImage(event)">
            <button class="btn btn-success" style="margin-left: 10px; margin-top: 20px;" onclick = "EditDataFromTheProfile()">Save Edit</button>
        </div>
    </div>
</div>




<!-- modal -->
<div class="modal" tabindex="-1" id = "SuccesfullEdit" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Edited Successfully!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>


<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script>
    window.onload = function() {
      
        DisplayAllDataOfTheSaidAccount();

       
        setTimeout(function() {
            location.reload();
        }, 1000000); // Refresh the page every 60 seconds
    };

    function refreshIfClose() {
        $(document).ready(function() {
            location.reload();
        });
    }

    function displaySelectedImage(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();
        
        reader.onload = function(event) {
            var imgElement = document.getElementById('profileImage');
            imgElement.src = event.target.result;
        };
        
        reader.readAsDataURL(selectedFile);
    }


//     para ma display ang current na data sa usa ka seller account 
    function DisplayAllDataOfTheSaidAccount() {
        var username = '<?php echo $_SESSION['username']; ?>';
      
        $.post("../ajax/buyer_ajax.php", { EditInformationOfTheSaidProfileAccount: username }, function(data, status) {
            console.log(data); // Log the raw response to the console

            var SelectedProfileDatas = JSON.parse(data);

            $('#BuyerFullname').val(SelectedProfileDatas.fullname);
            $('#BuyerAge').val(SelectedProfileDatas.age);
            $('#BuyerNumber').val(SelectedProfileDatas.number);
            $('#BuyerLocation').val(SelectedProfileDatas.location);
        });
    }


    function EditDataFromTheProfile(){
                var EditClicked = true;
                var BuyerFullname = $('#BuyerFullname').val();
                var BuyerAge = $('#BuyerAge').val();
                var BuyerNumber = $('#BuyerNumber').val();
                var BuyerLocation = $('#BuyerLocation').val();
                var Username = '<?php echo $_SESSION['username']; ?>';
                var SelectedProfilePicture = $('#selectProfilePicture').val();
                var BuyerPic = SelectedProfilePicture.replace(/C:\\fakepath\\/i, '');
        

                          $.ajax({
                                        url: "../ajax/buyer_ajax.php",
                                        type: 'post',
                                        data: {
                                           
                                            BuyerFullname: BuyerFullname,
                                            BuyerAge: BuyerAge,
                                            BuyerNumber:BuyerNumber,
                                            BuyerLocation: BuyerLocation,
                                            BuyerPic:BuyerPic,
                                            EditClicked:EditClicked,
                                            SelectedUserNameTObeEdited:Username
                                        },
                                        success: function (data, status) {
                                                        
                                            $('#SuccesfullEdit').modal('show');
                                        }
                                    });
                      
                }

                
</script>

<script>
                            function toggleSidebar() {
                                    var sidebarContent = document.getElementById('sidebarContent');
                                        if (sidebarContent) {
                                            if (sidebarContent.style.right === '0px') {
                                                sidebarContent.style.right = '-360px'; // Adjust the value based on the width of your sidebar
                                            } else {
                                                sidebarContent.style.right = '200px';
                                            }
                                        }
                                }



                                                        document.addEventListener('DOMContentLoaded', function () {
                            const menuCheckbox = document.getElementById('menu');

                            menuCheckbox.addEventListener('change', function () {
                                const contentForSidebar = document.querySelector('.contentForSidebar');

                                if (menuCheckbox.checked) {
                                    contentForSidebar.style.left = '0';
                                } else {
                                    contentForSidebar.style.left = '-360px';
                                }
                            });
                        });

                    </script>   
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>
</html>
