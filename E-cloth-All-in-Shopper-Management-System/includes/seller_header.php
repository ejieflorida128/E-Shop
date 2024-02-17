<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

.header{
    background-color: #365D1E;
    height: 80px;
    display: flex;
    box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);
    position: fixed; 
    width: 100%; 
    top: 0; 
    z-index: 900; 
    
}



.searchBar input{
    margin-left: 10%;
    margin-top: 4%;
    padding: 5px;
    width: 600px;
    
}

.searchBar svg{
   position: relative;
    left: 600px;
     bottom: 33px; 
}

.menu{
    display: flex;
    justify-content: center;
}

.stores{
    margin-left: 60px;
    margin-top: 18px;
}

.cart{
    margin-left: 60px;
    margin-top: 18px;
}

.home{
    margin-left: 20px;
    margin-top: 18px;
}

.about{
    margin-left: 60px;
    margin-top: 18px;
}

.logout a{
    margin-left: 160px;
    margin-top: 18px;
    display: flex;
    text-decoration: none;

}

.logout h6{
    margin-top: 10px;
    color: white;
}

        </style>
</head>
<body>
<div class="header">
            <div class="menu">

                <div class="home">
                        <a href="../Seller/dashboard.php">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                    </svg>
                         </a>  
                </div>
                <div class="stores">
                    <a href="../Seller/store.php">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-shop" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                    </svg>

                         </a>
                </div>
                <div class="cart">
                    <a href="../Seller/pending.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-truck" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                </svg>
                        </a>
                </div>

                <div class="about">
                    <a href="../Seller/profile.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                    </svg>

                        </a>
                </div>
            </div>


            <div class="count" style = "background-color: red; height: 20px; width: 20px; border-radius: 50%; position: absolute; left: 256px; top: 13px;">
                            
                            <?php

                                include("../connection/conn.php");

                                $id = $_SESSION['id'];



                                $sql = "SELECT * FROM cart_pending WHERE SellerId = $id";
                                $query = mysqli_query($connForMyDatabase,$sql);

                                $count = 0;

                                while($check = mysqli_fetch_assoc($query)){
                                    $count++;
                                }


                                echo '
                                        <h4 id = "count" style = "position: absolute; color: white; font-size: 17px; left: 5px; bottom: -7px;" class = "countH">'.$count.'</h4>
                                    ';

                            ?>
                        
                </div>
            
            <div class = "searchBar">
                <input type = "text" name = "searchData" id = "searchData" class = "form-control">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
            </div>    
            
            <div class="logout">
                <a href="../index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-door-closed" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                        </svg>

                        <h6>LOGOUT</h6>

                        </a>    
            </div>
          
</div>
</body>
</html>