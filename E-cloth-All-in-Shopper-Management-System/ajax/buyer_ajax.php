<?php
session_start();
include("../connection/conn.php");





    // mao ne ang mag pa display sa items sa home php kung unsay ge search
    if (isset($_POST['searchItems']) && $_POST['searchItems'] == true){

        $value = $_POST['searchValue'];

        if($value == null){
          // if walay value ang search bar

            $getAllItems = "SELECT * FROM items ORDER BY id DESC";
            $queryForItems = mysqli_query($connForMyDatabase,$getAllItems);

            $counToRow = 0;

            $div = '<div class = "row">';

            while($get = mysqli_fetch_assoc($queryForItems)){

              $counToRow ++;

                $picInDb = $get['img'];
                $itemId = $get['id'];
                $itemName = $get['item_name'];
                $itemPrice = $get['item_price'];

                $div.='
                <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 25rem; margin: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                <img src='.$picInDb.' class="card-img-top">
                <div class="card-body">
                <h5 class="card-title" style = "display: flex; justify-content: center; color: rgb(114, 111, 111);">'.$itemPrice.'</h5>
                <h6 class="card-text"  style = "display: flex; justify-content: center; color: rgb(114, 111, 111);"> '.$itemName.' </h6>
                <a href="../Buyer/cartInfo.php?id='.$itemId.'" class="btn btn-primary" style = "width:220px; position: absolute; bottom: 10px;">
                <div style = "margin-left: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart2" viewBox="0 0 16 16" style = "position: absolute; left: 30px; top: 2px;">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>
                  Add To Cart 
                </div>
                
                </a>
              
                  </div>
              </div>
              </div>
                
                
                ';

              
                if($counToRow % 4 == 0){
                  $div .= '</div>'; // Close current row
                  $div .= '<div class="row">'; // Start new row
                }
            }


            
            $div.='</div>';
            echo $div;
    
            
        }else{

          // if naay value ang search bar

          $getAllItems = "SELECT * FROM items WHERE item_name LIKE '%$value%'";
          $queryForItems = mysqli_query($connForMyDatabase,$getAllItems);

          $counToRow = 0;

          $div = '<div class = "row">';

          while($get = mysqli_fetch_assoc($queryForItems)){

            $counToRow ++;

                $picInDb = $get['img'];
                $itemId = $get['id'];
                $itemName = $get['item_name'];
                $itemPrice = $get['item_price'];

                $div.='
                <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 25rem; margin: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                <img src='.$picInDb.' class="card-img-top">
                <div class="card-body">
                <h5 class="card-title" style = "display: flex; justify-content: center; color: rgb(114, 111, 111);">'.$itemPrice.'</h5>
                <h6 class="card-text"  style = "display: flex; justify-content: center; color: rgb(114, 111, 111);"> '.$itemName.' </h6>
                <a href="../Buyer/cartInfo.php?id='.$itemId.'" class="btn btn-primary" style = "width:220px; position: absolute; bottom: 10px;">
                <div style = "margin-left: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart2" viewBox="0 0 16 16" style = "position: absolute; left: 30px; top: 2px;">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>
                  Add To Cart 
                </div>
                
                </a>
              
                  </div>
              </div>
              </div>
                
                
                ';

              
                if($counToRow % 4 == 0){
                  $div .= '</div>'; // Close current row
                  $div .= '<div class="row">'; // Start new row
                }
          }


          
          $div.='</div>';
          echo $div;
        }


     

      

    }



    // para ma butangan ug information ang mga inputs sa profile php
  if(isset($_POST['EditInformationOfTheSaidProfileAccount'])){
    $buyerUsername = $_POST['EditInformationOfTheSaidProfileAccount'];

    $sql = "SELECT * FROM buyer_account WHERE username = '$buyerUsername' ";
    $result = mysqli_query($connForMyDatabase,$sql);
    $response = array();

    while($row = mysqli_fetch_assoc($result)){
        $response = $row;
    }

    echo json_encode($response);
}else{
    $response['status'] =   200;
    $response['message'] = "Invalid or Data Information!";
}



// mao ne query for editing profile information sa profile.php
if(isset($_POST['EditClicked'])){
      
  $BuyerFullname = $_POST['BuyerFullname'];
  $BuyerAge = $_POST['BuyerAge'];
  $BuyerLocation = $_POST['BuyerLocation'];
  if(empty($_POST['BuyerPic']) || $_POST['BuyerPic'] == null){
    $BuyerPic = "../profile_picture/default.jpg";
  }else{
    
    $BuyerPic = "../profile_picture/".$_POST['BuyerPic'];
  }
  $SelectedUserNameTObeEdited = $_POST['SelectedUserNameTObeEdited'];

  $sql = "UPDATE buyer_account SET fullname = '$BuyerFullname', age = '$BuyerAge', location = '$BuyerLocation', profile_pic = '$BuyerPic' WHERE username = '$SelectedUserNameTObeEdited'";
  mysqli_query($connForMyDatabase, $sql);
}




// list of shop sa Buyer
if(isset($_POST['ListOfShop'])){

 
  
  $queryToGetAllCreatedStore = "SELECT * FROM shop ";
  $query = mysqli_query($connForMyDatabase,$queryToGetAllCreatedStore);


  $counToRow = 0;

  $div = '<div class = "row" style = "margin-left: 40px;">';

  while($get = mysqli_fetch_assoc($query)){

          $counToRow ++;

            $picInDb = $get['shop_pic'];
            $shopname = $get['shop_name'];
            $shop_contact = $get['shop_contactNo'];

            $div.='
            <div class="col-md-3">
            <div class="card" style="width: 15rem; margin: 10px;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
            <img src='.$picInDb.' class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" style = "display: flex; justify-content: center; color: rgb(114, 111, 111);">'.$shopname.'</h5>
              <h6 class="card-text"  style = "display: flex; justify-content: center; color: rgb(114, 111, 111);"> '.$shop_contact.' </h6>
              <a href="../Buyer/shopDetail.php?shopName='.$shopname.'" class="btn btn-primary" style = "width:200px;">Visit Store</a>
            
              </div>
          </div>
          </div>
            
            
            ';

          
            if($counToRow % 4 == 0){
              $div .= '</div>'; // Close current row
              $div .= '<div class="row" style = "margin-left: 40px;">'; // Start new row
            }
        }


        
        $div.='</div>';
        echo $div;


}

if(isset($_POST['addtoCart']) && $_POST['addtoCart'] == true){

  $itemName = $_POST['itemName'];
  $itemPrice = $_POST['itemPrice'];
  $itemShop = $_POST['itemShop'];
  $itemSeller = $_POST['itemSeller'];
  $BuyerFullname = $_POST['BuyerFullname'];
  $BuyerLocation = $_POST['BuyerLocation'];
  $BuyerAge = $_POST['BuyerAge'];
  $BuyerId = $_POST['BuyerId'];
  $SellerId = $_POST['SellerId'];

  $sql = "INSERT INTO cart_pending (item_name,item_price,item_source,buyer_fullname,buyer_location,buyer_age,seller,BuyerId,SellerId) VALUES ('$itemName','$itemPrice','$itemShop','$BuyerFullname','$BuyerLocation','$BuyerAge','$itemSeller','$BuyerId','$SellerId')";
  mysqli_query($connForMyDatabase,$sql);

}



   // mao ne ang mag pa display sa items sa shopDetail php kung unsay ge search
   if (isset($_POST['ItemsSearchInTheCurrentShop']) && $_POST['ItemsSearchInTheCurrentShop'] == true){

    $value = $_POST['ItemSearchValue'];
    $currentlySelectedShop = $_POST['SelectedShop'];


    if($value == null){
      // if walay value ang search bar

        $getAllItems = "SELECT * FROM items WHERE item_source = '$currentlySelectedShop' ORDER BY id DESC";
        $queryForItems = mysqli_query($connForMyDatabase,$getAllItems);

        $counToRow = 0;

        $div = '<div class = "row">';

        while($get = mysqli_fetch_assoc($queryForItems)){

          $counToRow ++;

            $picInDb = $get['img'];
            $itemPrice = $get['item_price'];
            $itemName = $get['item_name'];

            $itemId = $get['id'];
           

            $div.='
            <div class="col-md-3">
            <div class="card" style="width: 15rem; height:25rem; margin: 10px;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
            <img src='.$picInDb.' class="card-img-top">
            <div class="card-body">
              <h5 class="card-title" style = "display:flex; justify-content: center; font-size: 30px;">'.$itemPrice.'</h5>
              <p class="card-text" style = "display:flex; justify-content: center;">'.$itemName.'</p>
              <a href = "../Buyer/cartInfo.php?id='.$itemId.'" class = "btn btn-danger" style = "position: absolute; bottom: 10px;width: 200px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Show Item</a>
              
              
            </div>
          </div>
          </div>
            
            
            ';

          
            if($counToRow % 4 == 0){
              $div .= '</div>'; // Close current row
              $div .= '<div class="row">'; // Start new row
            }
        }


        
        $div.='</div>';
        echo $div;

        
    }else{

      // if naay value ang search bar

      $getAllItems = "SELECT * FROM items WHERE item_name LIKE '%$value%' AND item_source = '$currentlySelectedShop' ";
      $queryForItems = mysqli_query($connForMyDatabase,$getAllItems);

      $counToRow = 0;

      $div = '<div class = "row">';

      while($get = mysqli_fetch_assoc($queryForItems)){

        $counToRow ++;

          $picInDb = $get['img'];
          $itemPrice = $get['item_price'];
          $itemName = $get['item_name'];

          $itemId = $get['id'];
         

          $div.='
          <div class="col-md-3">
          <div class="card" style="width: 15rem; height:25rem; margin: 10px;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
          <img src='.$picInDb.' class="card-img-top">
          <div class="card-body">
              <h5 class="card-title" style = "display:flex; justify-content: center; font-size: 30px;">'.$itemPrice.'</h5>
              <p class="card-text" style = "display:flex; justify-content: center;">'.$itemName.'</p>
              <a href = "cartInfo.php?id='.$itemId.'" class = "btn btn-danger" style = "position: absolute; bottom: 10px;width: 200px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Show Item</a>
              
          </div>
        </div>
        </div>
          
          
          ';

        
          if($counToRow % 4 == 0){
            $div .= '</div>'; // Close current row
            $div .= '<div class="row">'; // Start new row
          }
      }


      
      $div.='</div>';
      echo $div;
    }


}




  // para ni sa cart para ma display

    if(isset($_POST['displayCart']) && $_POST['displayCart'] == true){

        echo '<div style="max-height: 300px; max-width: 1200px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; " class="table">';
        $table = '<table class="table table-bordered table-hover">
                <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
                <tr> 
                    <th scope="col" class="text-center align-middle">Item Name</th>
                    <th scope="col" class="text-center align-middle">Item Price</th>
                    <th scope="col" class="text-center align-middle">Item Source</th>
                    <th scope="col" class="text-center align-middle">Action</th>
                </tr>
                </thead>
                <tbody>';

                $BuyerId =  $_SESSION['id'];
                $sql = "SELECT * FROM cart_pending WHERE BuyerId = $BuyerId ORDER BY id DESC";

                $result = mysqli_query($connForMyDatabase,$sql);
                $number = 1;

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {

                      $Cartid = $row['id'];
                      $BuyerID = $row['BuyerId'];
                      $SellerId = $row['SellerId'];
                      $itemName = $row['item_name'];
                      $itemPrice = $row['item_price'];
                      $itemSource = $row['item_source'];
                      $BuyerFullname = $row['buyer_fullname'];
                      $BuyerLocation = $row['buyer_location'];
                      $BuyerAge = $row['buyer_age'];
                      $Seller = $row['seller'];
                      
                      
                     
                    
              
                      $table .= '<tr>
                          <td scope="row" class="text-center align-middle">' . $itemName . '</td>
                          <td scope="row" class="text-center align-middle">' . $itemPrice . '</td>
                          <td scope="row" class="text-center align-middle">' . $itemSource . '</td>
                          <td class="text-center align-middle">
                          <button class="btn btn-outline-success" style="box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick="AddToOrderPending('.$Cartid.','.$BuyerID.','.$SellerId.',\''.$itemName.'\',\''.$itemPrice.'\',\''.$itemSource.'\',\''.$BuyerFullname.'\',\''.$BuyerLocation.'\',\''.$BuyerAge.'\',\''.$Seller.'\')">Buy Product</button>
                              <button class = "btn btn-outline-danger"  style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick = "DeleteCart('. $Cartid .')">Delete</button>
                          </td
                          
                      </tr>';
              
                      $number++;
              
              
                  }
              } else {
                  // If no data, display a row with "No Data Information"
                  $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
              }
              
                  $table .= '</tbody></table>';
                  echo $table;
                  echo '</div>';
    }


    if(isset($_POST['toDeleteCart']) && $_POST['toDeleteCart'] == true){

            $cartIdToDelete = $_POST['CartId'];

            $delete = "DELETE FROM cart_pending WHERE id = $cartIdToDelete";
            mysqli_query($connForMyDatabase,$delete);
    }

    if(isset($_POST['AddToOrderPending']) && $_POST['AddToOrderPending'] == true){

            $cartId = $_POST['cartId'];
            $BuyerId = $_POST['BuyerId'];
            $SellerId = $_POST['SellerId'];
            $itemName = $_POST['itemName'];
            $itemPrice = $_POST['itemPrice'];
            $itemSource = $_POST['itemSource'];
            $buyerFullname = $_POST['buyerFullname'];
            $buyerLocation = $_POST['buyerLocation'];
            $buyerAge = $_POST['buyerAge'];
            $Seller = $_POST['Seller'];


            $insertToOrderPennding = "INSERT INTO order_pending (cartPendingId,BuyerId,SellerId,item_name,item_price,item_source,buyer_fullname,buyer_location,	buyer_age,seller) VALUES ('$cartId','$BuyerId','$SellerId','$itemName','$itemPrice','$itemSource','$buyerFullname','$buyerLocation','$buyerAge','$Seller')";
            mysqli_query($connForMyDatabase,$insertToOrderPennding);

            $deleteFromcartPending = "DELETE FROM cart_pending WHERE id = $cartId";
            mysqli_query($connForMyDatabase,$deleteFromcartPending);


            header("Location: ../Buyer/pending_order.php");
    }


    if(isset($_POST['DisplayPendingOrder']) && $_POST['DisplayPendingOrder'] == true){

      echo '<div style="max-height: 300px; max-width: 1200px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; " class="table">';
      $table = '<table class="table table-bordered table-hover">
              <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
              <tr> 
                  <th scope="col" class="text-center align-middle">Item Name</th>
                  <th scope="col" class="text-center align-middle">Item Price</th>
                  <th scope="col" class="text-center align-middle">Item Source</th>
                  <th scope="col" class="text-center align-middle">Delivery Status</th>
                  <th scope="col" class="text-center align-middle">Action</th>
              </tr>
              </thead>
              <tbody>';

              $BuyerId =  $_SESSION['id'];
              $sql = "SELECT * FROM order_pending WHERE BuyerId = $BuyerId ORDER BY id DESC";

              $result = mysqli_query($connForMyDatabase,$sql);
              $number = 1;

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $Cartid = $row['id'];
                    $BuyerID = $row['BuyerId'];
                    $SellerId = $row['SellerId'];
                    $itemName = $row['item_name'];
                    $itemPrice = $row['item_price'];
                    $itemSource = $row['item_source'];
                    $BuyerFullname = $row['buyer_fullname'];
                    $BuyerLocation = $row['buyer_location'];
                    $BuyerAge = $row['buyer_age'];
                    $Seller = $row['seller'];
                    
                    
                   
                  
            
                    $table .= '<tr>
                        <td scope="row" class="text-center align-middle">' . $itemName . '</td>
                        <td scope="row" class="text-center align-middle">' . $itemPrice . '</td>
                        <td scope="row" class="text-center align-middle">' . $itemSource . '</td>
                        <td scope="row" class="text-center align-middle">P E N D I N G</td>         
                        <td class="text-center align-middle">
                            <button class="btn btn-outline-danger" style="box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick="Cancel('.$Cartid.','.$BuyerID.','.$SellerId.',\''.$itemName.'\',\''.$itemPrice.'\',\''.$itemSource.'\',\''.$BuyerFullname.'\',\''.$BuyerLocation.'\',\''.$BuyerAge.'\',\''.$Seller.'\')">Cancel</button>
                           
                        </td
                        
                    </tr>';
            
                    $number++;
            
            
                }
            } else {
                // If no data, display a row with "No Data Information"
                $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
            }
            
                $table .= '</tbody></table>';
                echo $table;
                echo '</div>';

    }


    // PARA NE SA CANCELLATION SA ORDER SA PENDINNG ORDER
    if(isset($_POST['CancelOrder']) && $_POST['CancelOrder'] == true){

      $cartId = $_POST['cartId'];
      $BuyerId = $_POST['BuyerId'];
      $SellerId = $_POST['SellerId'];
      $itemName = $_POST['itemName'];
      $itemPrice = $_POST['itemPrice'];
      $itemSource = $_POST['itemSource'];
      $buyerFullname = $_POST['buyerFullname'];
      $buyerLocation = $_POST['buyerLocation'];
      $buyerAge = $_POST['buyerAge'];
      $Seller = $_POST['Seller'];


      $cancel = "INSERT INTO cancelled (cartPendingId,BuyerId,SellerId,item_name,item_price,item_source,buyer_fullname,buyer_location,buyer_age,seller) VALUES ('$cartId','$BuyerId','$SellerId','$itemName','$itemPrice','$itemSource','$buyerFullname','$buyerLocation','$buyerAge','$Seller')";
      mysqli_query($connForMyDatabase,$cancel);

      $cancelData = "DELETE FROM order_pending WHERE id = $cartId";
      mysqli_query($connForMyDatabase,$cancelData);


      header("Location: ../Buyer/cancel_order.php");
}



if(isset($_POST['displayTableForCancelledOrderList']) && $_POST['displayTableForCancelledOrderList'] == true){

  echo '<div style="max-height: 300px; max-width: 1200px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; " class="table">';
  $table = '<table class="table table-bordered table-hover">
          <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
          <tr> 
              <th scope="col" class="text-center align-middle">Item Name</th>
              <th scope="col" class="text-center align-middle">Item Price</th>
              <th scope="col" class="text-center align-middle">Item Source</th>
              <th scope="col" class="text-center align-middle">Buyer Fullname</th>
              <th scope="col" class="text-center align-middle">Buyer Location</th>
              <th scope="col" class="text-center align-middle">Buyer Age</th>
              <th scope="col" class="text-center align-middle">Item Seller</th>
              <th scope="col" class="text-center align-middle">Time Cancelled</th>
              <th scope="col" class="text-center align-middle">Delivery Status</th>
              
          </tr>
          </thead>
          <tbody>';

          $BuyerId =  $_SESSION['id'];
          $sql = "SELECT * FROM cancelled WHERE BuyerId = $BuyerId ORDER BY id DESC";

          $result = mysqli_query($connForMyDatabase,$sql);
          $number = 1;

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $Cartid = $row['id'];
                $BuyerID = $row['BuyerId'];
                $SellerId = $row['SellerId'];
                $itemName = $row['item_name'];
                $itemPrice = $row['item_price'];
                $itemSource = $row['item_source'];
                $BuyerFullname = $row['buyer_fullname'];
                $BuyerLocation = $row['buyer_location'];
                $BuyerAge = $row['buyer_age'];
                $cancelled = $row['time'];
                $Seller = $row['seller'];
                
                
               
              
        
                $table .= '<tr>
                    <td scope="row" class="text-center align-middle">' . $itemName . '</td>
                    <td scope="row" class="text-center align-middle">' . $itemPrice . '</td>
                    <td scope="row" class="text-center align-middle">' . $itemSource . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerFullname . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerLocation . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerAge . '</td>
                    <td scope="row" class="text-center align-middle">' . $Seller . '</td>
                    <td scope="row" class="text-center align-middle">' . $cancelled . '</td>
                    <td scope="row" class="text-center align-middle"><h6 style = "border: 2px solid red; padding: 5px;">Cancelled</h6></td>         
                   
                    
                </tr>';
        
                $number++;
        
        
            }
        } else {
            // If no data, display a row with "No Data Information"
            $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
        }
        
            $table .= '</tbody></table>';
            echo $table;
            echo '</div>';
}


if(isset($_POST['displayOrderStatus']) && $_POST['displayOrderStatus'] == true){

  echo '<div style="max-height: 300px; max-width: 1200px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; " class="table">';
  $table = '<table class="table table-bordered table-hover">
          <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
          <tr> 
              <th scope="col" class="text-center align-middle">Item Name</th>
              <th scope="col" class="text-center align-middle">Item Price</th>
              <th scope="col" class="text-center align-middle">Item Source</th>
              <th scope="col" class="text-center align-middle">Buyer Fullname</th>
              <th scope="col" class="text-center align-middle">Buyer Location</th>
              <th scope="col" class="text-center align-middle">Buyer Age</th>
              <th scope="col" class="text-center align-middle">Item Seller</th>
              <th scope="col" class="text-center align-middle">Delivery Status</th>
              
          </tr>
          </thead>
          <tbody>';

          $BuyerId =  $_SESSION['id'];
          $sql = "SELECT * FROM confirmedorder WHERE BuyerId = $BuyerId ORDER BY id DESC";

          $result = mysqli_query($connForMyDatabase,$sql);
          $number = 1;

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $Cartid = $row['id'];
                $BuyerID = $row['BuyerId'];
                $SellerId = $row['SellerId'];
                $itemName = $row['item_name'];
                $itemPrice = $row['item_price'];
                $itemSource = $row['item_source'];
                $BuyerFullname = $row['buyer_fullname'];
                $BuyerLocation = $row['buyer_location'];
                $BuyerAge = $row['buyer_age'];
                $Seller = $row['seller'];
                
                
               
              
        
                $table .= '<tr>
                    <td scope="row" class="text-center align-middle">' . $itemName . '</td>
                    <td scope="row" class="text-center align-middle">' . $itemPrice . '</td>
                    <td scope="row" class="text-center align-middle">' . $itemSource . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerFullname . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerLocation . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerAge . '</td>
                    <td scope="row" class="text-center align-middle">' . $Seller . '</td>
                    <td scope="row" class="text-center align-middle">
                    
                    <button class="btn btn-outline-success" style="box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick="Approved('.$Cartid.','.$BuyerID.','.$SellerId.',\''.$itemName.'\',\''.$itemPrice.'\',\''.$itemSource.'\',\''.$BuyerFullname.'\',\''.$BuyerLocation.'\',\''.$BuyerAge.'\',\''.$Seller.'\')">Item Recieved</button>
                           
                          
                    
                    </td>         
                   
                    
                </tr>';
        
                $number++;
        
        
            }
        } else {
            // If no data, display a row with "No Data Information"
            $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
        }
        
            $table .= '</tbody></table>';
            echo $table;
            echo '</div>';
}


if(isset($_POST['ApproveOrder'])   && $_POST['ApproveOrder'] == true){
  $cartId = $_POST['cartId'];
  $BuyerId = $_POST['BuyerId'];
  $SellerId = $_POST['SellerId'];
  $itemName = $_POST['itemName'];
  $itemPrice = $_POST['itemPrice'];
  $itemSource = $_POST['itemSource'];
  $buyerFullname = $_POST['buyerFullname'];
  $buyerLocation = $_POST['buyerLocation'];
  $buyerAge = $_POST['buyerAge'];
  $Seller = $_POST['Seller'];


  $cancel = "INSERT INTO complete_order (cartPendingId,BuyerId,SellerId,item_name,item_price,item_source,buyer_fullname,buyer_location,buyer_age,seller) VALUES ('$cartId','$BuyerId','$SellerId','$itemName','$itemPrice','$itemSource','$buyerFullname','$buyerLocation','$buyerAge','$Seller')";
  mysqli_query($connForMyDatabase,$cancel);

  $cancelData = "DELETE FROM confirmedorder WHERE id = $cartId";
  mysqli_query($connForMyDatabase,$cancelData);


  header("Location: ../Buyer/success_order.php");
}



if(isset($_POST['tableForCompleteDeliveries']) && $_POST['tableForCompleteDeliveries'] == true){
  echo '<div style="max-height: 300px; max-width: 1200px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; " class="table">';
  $table = '<table class="table table-bordered table-hover">
          <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
          <tr> 
              <th scope="col" class="text-center align-middle">Item Name</th>
              <th scope="col" class="text-center align-middle">Item Price</th>
              <th scope="col" class="text-center align-middle">Item Source</th>
              <th scope="col" class="text-center align-middle">Buyer Fullname</th>
              <th scope="col" class="text-center align-middle">Buyer Location</th>
              <th scope="col" class="text-center align-middle">Buyer Age</th>
              <th scope="col" class="text-center align-middle">Item Seller</th>
              <th scope="col" class="text-center align-middle">Delivery Success Date</th>
              <th scope="col" class="text-center align-middle">Delivery Status</th>
              
          </tr>
          </thead>
          <tbody>';

          $BuyerId =  $_SESSION['id'];
          $sql = "SELECT * FROM complete_order WHERE BuyerId = $BuyerId ORDER BY id DESC";

          $result = mysqli_query($connForMyDatabase,$sql);
          $number = 1;

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $Cartid = $row['id'];
                $BuyerID = $row['BuyerId'];
                $SellerId = $row['SellerId'];
                $itemName = $row['item_name'];
                $itemPrice = $row['item_price'];
                $itemSource = $row['item_source'];
                $BuyerFullname = $row['buyer_fullname'];
                $BuyerLocation = $row['buyer_location'];
                $BuyerAge = $row['buyer_age'];
                $Seller = $row['seller'];
                $complete = $row['time'];
                
                
               
              
        
                $table .= '<tr>
                    <td scope="row" class="text-center align-middle">' . $itemName . '</td>
                    <td scope="row" class="text-center align-middle">' . $itemPrice . '</td>
                    <td scope="row" class="text-center align-middle">' . $itemSource . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerFullname . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerLocation . '</td>
                    <td scope="row" class="text-center align-middle">' . $BuyerAge . '</td>
                    <td scope="row" class="text-center align-middle">' . $Seller . '</td>
                    <td scope="row" class="text-center align-middle">' . $complete . '</td>
                    <td scope="row" class="text-center align-middle"><h6 style = "border: 2px solid green; padding: 5px;">Delivery Complete</h6></td>         
                   
                    
                </tr>';
        
                $number++;
        
        
            }
        } else {
            // If no data, display a row with "No Data Information"
            $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
        }
        
            $table .= '</tbody></table>';
            echo $table;
            echo '</div>';
}

if(isset($_POST['ToMessage']) && $_POST['ToMessage'] == true){

  echo '<div style="max-height: 300px; max-width: 1200px; font-size: 11px; position: relative; left: 0px; top: 0px; overflow-y: auto; " class="table">';
  $table = '<table class="table table-bordered table-hover">
          <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
          <tr> 
              <th scope="col" class="text-center align-middle">Seller No.</th>
              <th scope="col" class="text-center align-middle">Seller Picture</th>
              <th scope="col" class="text-center align-middle">Seller Name</th>
              <th scope="col" class="text-center align-middle">Seller Age</th>
              <th scope="col" class="text-center align-middle">Action</th>
          </tr>
          </thead>
          <tbody>';

          $sql = "SELECT * FROM seller_account";

          $result = mysqli_query($connForMyDatabase,$sql);
          $number = 1;

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

              $seller_id = $row['id'];

                $table .= '<tr>
                    <td scope="row" class="text-center align-middle">' . $number . '</td>
                    <td scope="row" class="text-center align-middle">
                      <img src = '.$row['profile_pic'].' style = "height: 50px; width: 50px; border-radius: 10px; border: 1ps solid black; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                    </td>
                    <td scope="row" class="text-center align-middle">' . $row['fullname'] . '</td>
                    <td scope="row" class="text-center align-middle">' . $row['age'] . '</td>
                    <td scope="row" class="text-center align-middle">
                      <a href = "../Buyer/messanger.php?seller_id='.$seller_id.'" class = "btn btn-success">Message Seller</a>
                    </td>
                                        
                </tr>';
        
                $number++;
        
        
            }
        } else {
            // If no data, display a row with "No Data Information"
            $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
        }
        
            $table .= '</tbody></table>';
            echo $table;
            echo '</div>';

}

if(isset($_POST['seeMessage']) && $_POST['seeMessage'] == true) {

  if(isset($_SESSION['id']) && isset($_POST['seller_id'])) {

      $buyerId = $_SESSION['id'];
      $sellerId = $_POST['seller_id'];

      $query = "SELECT * FROM message WHERE (sender = $sellerId AND reciever = $buyerId) OR (sender = $buyerId AND reciever = $sellerId)";
      $sql = mysqli_query($connForMyDatabase, $query);

      if(!$sql) {
          echo "Error: " . mysqli_error($connForMyDatabase);
      } else {
          while($check = mysqli_fetch_assoc($sql)) {
              if($check['sender'] == $sellerId) {
                  echo '

                      <div class = "messageBubble" style = "width: 500px; background-color: rgb(68, 75, 80); color: white; padding: 10px; border-radius: 10px; position: relative; right: -570px; margin: 10px;">
                        '.$check['mess'].'
                      </div>

                      <div class = "row" ></div>
                  
                  ';
              } else {
                echo '

                <div class = "messageBubble" style = "width: 500px; background-color: rgb(63, 108, 170); color: white; padding: 10px; border-radius: 10px; position: relative; left:0px; margin: 10px;">
                  '.$check['mess'].'
                </div>

                <div class = "row" ></div>
            
            ';
              }
          }
      }
  }else{
    echo "failed";
  }
}

if(isset($_POST['messageSent']) && $_POST['messageSent'] == true){

    $sellerId = $_POST['seller_id'];
    $buyerId = $_SESSION['id'];
    $txt = $_POST['message'];

    $sql = "INSERT INTO `message`( `sender`, `reciever`, `mess`) VALUES ('$buyerId','$sellerId','$txt')";
    mysqli_query($connForMyDatabase,$sql);

}

?>