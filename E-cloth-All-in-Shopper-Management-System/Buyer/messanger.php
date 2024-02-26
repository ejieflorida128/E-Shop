<?php
session_start();
include("../connection/conn.php");
include("../includes/buyer_header.php");
include("../includes/footer.php");



    
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="../Buyer_Design/messanger.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        
            <div class="messTop">
                <div class="pic">
                    <img id="profileImage" src="<?php
                                                    $LogInedUsername =  $_SESSION['username'];
                                                    $sql = "SELECT profile_pic FROM buyer_account WHERE username = '$LogInedUsername' ";
                                                    $query = mysqli_query($connForMyDatabase, $sql);
                                                    while ($check = mysqli_fetch_assoc($query)) {
                                                        echo $check['profile_pic'];
                                                    }
                                                    ?>" alt="Profile Picture" style="width: 50px; height: 50px;">
                </div>
            </div>

            <div class="messMain">

                <div class="messageScreen" id="messageScreen">
                    <!-- see message -->
                </div>

            </div>

            <div class="messBot">
                
                <input type="text" name="sendText" id = "ChatText" class="form-control">
                <button hidden id="submit" onclick = "messageSent()"></button>


                <label for="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-send-arrow-up-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54L13.026 8.03A4.5 4.5 0 0 0 8 12.5c0 .5 0 1.5-.773.36l-1.59-2.498L.644 7.184l-.002-.001-.41-.261a.5.5 0 0 1 .083-.886l.452-.18.001-.001L15.314.035a.5.5 0 0 1 .54.111M6.637 10.07l7.494-7.494.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154z" />
                        <path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354a.5.5 0 0 0-.722.016l-1.149 1.25a.5.5 0 1 0 .737.676l.28-.305V14a.5.5 0 0 0 1 0v-1.793l.396.397a.5.5 0 0 0 .708-.708z" />
                    </svg>
                </label>

            </div>

    
    </div>

    <div class="modal" tabindex="-1" id = "MessageSent" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Selected Item Succesfully Delivered! </p>
      </div>
      <div class="modal-footer">
        <a href= "messanger.php?seller_id=<?php echo $_GET['seller_id']; ?>" class="btn btn-danger">Close</a>
      </div>
    </div>
  </div>
</div> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        var messageScreen = document.getElementById("messageScreen");
        messageScreen.scrollTop = messageScreen.scrollHeight;

        
    </script>


    <script>
        $(document).ready(function() {
            displayMessage();
        });

        function displayMessage() {
            $.ajax({
                    url: "../ajax/buyer_ajax.php",
                    type: 'post',
                    data: {
                        
                        seller_id:<?php echo $_GET['seller_id']; ?>,
                        seeMessage: true
                    },
                    success: function(data, status) {
                        console.log(data); // Check the data in the console
                        $('#messageScreen').html(data);
                    }
                });
        }


        function messageSent(){
                var message = $('#ChatText').val();
                
                $.ajax({
                    url: "../ajax/buyer_ajax.php",
                    type: 'post',
                    data: {
                        message: message,
                        messageSent: true, // Corrected parameter name
                        seller_id: <?php echo $_GET['seller_id']; ?>
                    },
                    success: function(data, status) {
                        console.log(data); // Check the data in the console
                        $('#MessageSent').modal('show');
                    }
                });
            }


    </script>

</body>

</html>
