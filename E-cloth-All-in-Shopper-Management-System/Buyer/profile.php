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
</head>
<body>

<div class="container" style="display: flex;">
    <div class="leftside">
        <div class="profilePic">
            <img id="profileImage" src="<?php
                $LogInedUsername =  $_SESSION['username'];
                $sql = "SELECT profile_pic FROM buyer_account WHERE username = '$LogInedUsername' ";
                $query = mysqli_query($connForMyDatabase, $sql);
                while($check = mysqli_fetch_assoc($query)) {
                    echo $check['profile_pic'];
                }
            ?>" alt="Profile Picture" style="width: 450px;">
        </div>
    </div>
    <div class="rightside">
        <div class="buyerInformation">
                <label for="BuyerFullname"> Fullname:</label>
            <input type="text" id="BuyerFullname" class="form-control" style="width: 300px">
            <label for="BuyerAge">Age:</label>
            <input type="number" id="BuyerAge" class="form-control" style="width: 100px">
            <label for="BuyerLocation">Location:</label>
            <textarea class="form-control" rows="6" style="width: 500px" id = "BuyerLocation"></textarea>


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

<script>
    window.onload = function() {
      
        DisplayAllDataOfTheSaidAccount();

       
        setTimeout(function() {
            location.reload();
        }, 60000); // Refresh the page every 60 seconds
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
            $('#BuyerLocation').val(SelectedProfileDatas.location);
        });
    }


    function EditDataFromTheProfile(){
                var EditClicked = true;
                var BuyerFullname = $('#BuyerFullname').val();
                var BuyerAge = $('#BuyerAge').val();
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

</body>
</html>
