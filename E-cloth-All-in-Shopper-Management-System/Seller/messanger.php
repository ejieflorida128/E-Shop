<?php
 session_start();
 include("../connection/conn.php");
 include("../includes/seller_header.php");
 include("../includes/footer.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel = "stylesheet" href = "../Seller_Design/messanger.css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
        <form action="messanger.php">
                <div class="messTop">
                <div class="pic">
                    <img id="profileImage" src="<?php
                            $LogInedUsername =  $_SESSION['username'];
                            $sql = "SELECT profile_pic FROM seller_account WHERE username = '$LogInedUsername' ";
                            $query = mysqli_query($connForMyDatabase, $sql);
                            while($check = mysqli_fetch_assoc($query)) {
                                echo $check['profile_pic'];
                            }
                        ?>" alt="Profile Picture" style="width: 50px; height: 50px;">
                    </div>
                </div>

                <div class="messMain">
                        
                </div>

                <div class="messBot">
                        <input type="text" class = "form-control">
                        <input type="submit" hidden id = "submit">


                        <label for="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-send-arrow-up-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54L13.026 8.03A4.5 4.5 0 0 0 8 12.5c0 .5 0 1.5-.773.36l-1.59-2.498L.644 7.184l-.002-.001-.41-.261a.5.5 0 0 1 .083-.886l.452-.18.001-.001L15.314.035a.5.5 0 0 1 .54.111M6.637 10.07l7.494-7.494.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154z"/>
                        <path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354a.5.5 0 0 0-.722.016l-1.149 1.25a.5.5 0 1 0 .737.676l.28-.305V14a.5.5 0 0 0 1 0v-1.793l.396.397a.5.5 0 0 0 .708-.708z"/>
                        </svg>
                        </label>
                        
                </div>

        </form>
</div>
    
</body>
</html>