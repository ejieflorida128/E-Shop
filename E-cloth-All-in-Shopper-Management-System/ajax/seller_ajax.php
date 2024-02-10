<?php

include("../connection/conn.php");
session_start();


        // start sa query if ahu ge click ang Create Shop
        if(isset($_POST['shopName'])){
                $shopCreator =  $_SESSION['username'];
                $shopName = $_POST['shopName'];
                $shopContactNo = $_POST['shopContactNo'];
                $shopEmail = $_POST['shopEmail'];
                $shop_pic = "../Store_Pic/defaultPic.jpg";

                $insertCreatedShopInDb = "INSERT INTO shop (shop_name,shop_pic,shop_creator,shop_contactNo,shop_email) VALUES ('$shopName','$shop_pic','$shopCreator','$shopContactNo','$shopEmail')";
                mysqli_query($connForMyDatabase,$insertCreatedShopInDb);
        }



?>