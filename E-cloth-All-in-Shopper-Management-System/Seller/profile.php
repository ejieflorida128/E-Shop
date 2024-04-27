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
                <div class="containerS" style=" height: 100vh; margin-top: 50px;">
                    <a href="LoadToSellerDashboard.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">DASHBOARD</a>
                    <a href="LoadToHome.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 70px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">HOME</a>
                    <a href="LoadToStore.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 140px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">MY STORE</a>
                    <a href="LoadToPending.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 210px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PENDING</a>
                    <a href="LoadToProfile.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 280px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PROFILE</a>
                    <a href="LoadToLogout.php" style="color: black; background-color: red; color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; bottom: 10px; margin-top: 350px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">LOGOUT</a>
                </div>
                </div>

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 80px;" >
                    <div class = "contain">
                                <div class="cover">
                                    <img src="../images/seller.jpg" style="width: 100vw; height: 200px; border: 2px solid grey;">
                                        <div class="pROFILE" style="display:flex; justify-content:center;">
                                        <img src="<?php
                $LogInedUsername =  $_SESSION['username'];
                $sql = "SELECT profile_pic FROM seller_account WHERE username = '$LogInedUsername' ";
                $query = mysqli_query($connForMyDatabase, $sql);
                while($check = mysqli_fetch_assoc($query)) {
                    echo $check['profile_pic'];
                }
            ?>" style="height: 150px; width: 150px; border-radius: 50%; border: 4px solid black;margin-top: -70px;" id = "profileImageM">
                                        </div>
                                </div>

                                <div class="informations" style="border: 2px solid grey; margin: 10px; margin-top: -10px; font-size: 14px; padding: 10px; border-radius: 20px;" >
                                <label for="SellerFullname"> Fullname:</label>
                                <input type="text" id="SellerFullname" class="form-control" style="width: 300px">
                                <label for="SellerAge">Age:</label>
                                <input type="number" id="SellerAge" class="form-control" style="width: 100px">
                                <label for="SellerBio">Bio:</label>
                                <textarea class="form-control" rows="6" style="width: 315px" id = "SellerBio"></textarea>
                                </div>

                                <div class="buttons" style = "margin-top: -24px; margin-bottom: 10px; margin-left: 40px;">
                                <label class="btn btn-primary" style="margin-left: 10px; margin-top: 20px; padding: 10px;" for="selectProfilePicture" id = "chooseBtnForPic" >Choose Profile Pic</label>
                                <input type="file" id="selectProfilePicture" hidden onchange="displaySelectedImageM(event)">
                                <button class="btn btn-success" style="margin-left: 10px; margin-top: 20px; padding: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick = "EditDataFromTheProfile()">Save Edit</button>
                                </div>

                               
                                
                    </div>
        </div>
    </div>   

<div class="container" style="display: flex;">
    <div class="leftside">
        <div class="profilePic">
            <img style = "height: 450px; width: 400px;" src="<?php
                $LogInedUsername =  $_SESSION['username'];
                $sql = "SELECT profile_pic FROM seller_account WHERE username = '$LogInedUsername' ";
                $query = mysqli_query($connForMyDatabase, $sql);
                while($check = mysqli_fetch_assoc($query)) {
                    echo $check['profile_pic'];
                }
            ?>" alt="Profile Picture" style="width: 450px;" id = "profileImageD">
        </div>
    </div>
    <div class="rightside">
        <div class="sellerInformation">
                <label for="SellerFullname"> Fullname:</label>
            <input type="text" id="SellerFullnameD" class="form-control" style="width: 300px">
            <label for="SellerAgeD">Age:</label>
            <input type="number" id="SellerAgeD" class="form-control" style="width: 100px">
            <label for="SellerBio">Bio:</label>
            <textarea class="form-control" rows="6" style="width: 500px" id = "SellerBioD"></textarea>


            <label class="btn btn-primary" style="margin-left: 10px; margin-top: 20px;" for="selectProfilePicture" id = "chooseBtnForPic">Choose Profile Pic</label>
            <input type="file" id="selectProfilePicture" hidden onchange="displaySelectedImageD(eventD)">
            <button class="btn btn-success" style="margin-left: 10px; margin-top: 20px;" onclick = "EditDataFromTheProfileD()">Save Edit</button>
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

<script>
    window.onload = function() {
      
        DisplayAllDataOfTheSaidAccount();
        DisplayAllDataOfTheSaidAccountD();

       
        setTimeout(function() {
            location.reload();
        }, 60000); // Refresh the page every 60 seconds
    };

    function refreshIfClose() {
        $(document).ready(function() {
            location.reload();
        });
    }

    // JavaScript for desktop version
function displaySelectedImageD(eventD) {
    var selectedFile = eventD.target.files[0];
    var reader = new FileReader();
    
    reader.onload = function(eventD) {
        var imgElement = document.getElementById('profileImageD');
        imgElement.src = eventD.target.result;
    };
    
    reader.readAsDataURL(selectedFile);
}

   // JavaScript for mobile version
function displaySelectedImageM(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();
    
    reader.onload = function(event) {
        var imgElement = document.getElementById('profileImageM');
        imgElement.src = event.target.result;
    };
    
    reader.readAsDataURL(selectedFile);
}




//     para ma display ang current na data sa usa ka seller account 
    function DisplayAllDataOfTheSaidAccount() {
        var username = '<?php echo $_SESSION['username']; ?>';
      
        $.post("../ajax/seller_ajax.php", { EditInformationOfTheSaidProfileAccount: username }, function(data, status) {
            console.log(data); // Log the raw response to the console

            var SelectedProfileDatas = JSON.parse(data);

            $('#SellerFullname').val(SelectedProfileDatas.fullname);
            $('#SellerAge').val(SelectedProfileDatas.age);
            $('#SellerBio').val(SelectedProfileDatas.bio);
        });
    }


    function DisplayAllDataOfTheSaidAccountD() {
        var username = '<?php echo $_SESSION['username']; ?>';
      
        $.post("../ajax/seller_ajax.php", { EditInformationOfTheSaidProfileAccount: username }, function(data, status) {
            console.log(data); // Log the raw response to the console

            var SelectedProfileDatas = JSON.parse(data);

            $('#SellerFullnameD').val(SelectedProfileDatas.fullname);
            $('#SellerAgeD').val(SelectedProfileDatas.age);
            $('#SellerBioD').val(SelectedProfileDatas.bio);
        });
    }


    function EditDataFromTheProfile(){
                var EditClicked = true;
                var SellerFullname = $('#SellerFullname').val();
                var SellerAge = $('#SellerAge').val();
                var SellerBio = $('#SellerBio').val();
                var Username = '<?php echo $_SESSION['username']; ?>';
                var SelectedProfilePicture = $('#selectProfilePicture').val();
                var SellerPic = SelectedProfilePicture.replace(/C:\\fakepath\\/i, '');
        

                          $.ajax({
                                        url: "../ajax/seller_ajax.php",
                                        type: 'post',
                                        data: {
                                           
                                            SellerFullname: SellerFullname,
                                            SellerAge: SellerAge,
                                            SellerBio: SellerBio,
                                            SellerPic:SellerPic,
                                            EditClicked:EditClicked,
                                            SelectedUserNameTObeEdited:Username
                                        },
                                        success: function (data, status) {
                                                        
                                            $('#SuccesfullEdit').modal('show');
                                        }
                                    });
                      
                }


                function EditDataFromTheProfileD(){
                var EditClicked = true;
                var SellerFullname = $('#SellerFullnameD').val();
                var SellerAge = $('#SellerAgeD').val();
                var SellerBio = $('#SellerBioD').val();
                var Username = '<?php echo $_SESSION['username']; ?>';
                var SelectedProfilePicture = $('#selectProfilePicture').val();
                var SellerPic = SelectedProfilePicture.replace(/C:\\fakepath\\/i, '');
        

                          $.ajax({
                                        url: "../ajax/seller_ajax.php",
                                        type: 'post',
                                        data: {
                                           
                                            SellerFullname: SellerFullname,
                                            SellerAge: SellerAge,
                                            SellerBio: SellerBio,
                                            SellerPic:SellerPic,
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
                                    contentForSidebar.style.left = '-150px';
                                } else {
                                    contentForSidebar.style.left = '-360px';
                                }
                            });
                        });

                    </script>   
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</body>
</html>
