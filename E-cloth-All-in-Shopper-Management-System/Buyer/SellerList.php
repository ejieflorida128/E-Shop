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
    <link rel="stylesheet" href="../Buyer_Design/sellerList.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <form action="messanger.php" method="post">
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

                <div class="messageScreen" id="ToMessage">
                    <!-- see message -->
                </div>

            </div>

            <div class="messBot">
            
            </div>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script>
        $(document).ready(function() {
            DisplayToMessage();
        });

        function DisplayToMessage() {
            $.ajax({
                url: "../ajax/buyer_ajax.php",
                type: 'post',
                data: {
                    ToMessage: true
                },
                success: function(data, status) {
                    console.log(data); // Check the data in the console
                    $('#ToMessage').html(data);
                }
            });
        }
    </script>

</body>

</html>
