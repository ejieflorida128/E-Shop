<?php

include("../connection/conn.php");
session_start();

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
                $itemPrice = $get['item_price'];
                $itemName = $get['item_name'];
                

                $div.='
                <div class="col-md-3">
                <div class="card" style="width: 15rem; height: 23rem;  margin:10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                <img src='.$picInDb.' class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title" style = "display:flex; justify-content: center; font-size: 30px;">'.$itemPrice.'</h5>
                  <p class="card-text" style = "display:flex; justify-content: center;">'.$itemName.'</p>
                  
                  
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
              $itemPrice = $get['item_price'];
              $itemName = $get['item_name'];

              $div.='
              <div class="col-md-3">
              <div class="card" style="width: 15rem; height: 23rem;  margin:10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
              <img src='.$picInDb.' class="card-img-top">
              <div class="card-body">
                <h5 class="card-title" style = "display:flex; justify-content: center; font-size: 30px;">'.$itemPrice.'</h5>
                <p class="card-text" style = "display:flex; justify-content: center;">'.$itemName.'</p>
                
                
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


        if(isset($_POST['ListOfShop'])){

                $shopCreator =  $_SESSION['username'];
                
                $queryToGetAllCreatedStore = "SELECT * FROM shop WHERE shop_creator = '$shopCreator'";
                $query = mysqli_query($connForMyDatabase,$queryToGetAllCreatedStore);


                $counToRow = 0;

                $div = '<div class = "row">';

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
                            <a href="../Seller/shopDetail.php?shopName='.$shopname.'" class="btn btn-primary" style = "width:200px;">Visit Store</a>
                          
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
                <a href = "ViewItem.php?ItemId='.$itemId.'" class = "btn btn-primary" style = "position: absolute; bottom: 10px;width: 200px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Show Item</a>
                
                
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
                <a href = "ViewItem.php?ItemId='.$itemId.'" class = "btn btn-primary" style = "position: absolute; bottom: 10px;width: 200px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Show Item</a>
                
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



  if(isset($_POST['item_image']) && isset($_POST['item_price']) && isset($_POST['item_name'])){
             $Pic = $_POST['item_image'];  
            
            $ItemName = $_POST['item_name'];
            $ItemPrice = $_POST['item_price'];
            $ItemImage = "../items/"  . $Pic;
            $ItemSource = $_POST['SelectedShop'];
            $Seller = $_POST['seller'];
            $SellerId = $_POST['SellerId'];
           

            $insertItemToDb = "INSERT INTO items (img,item_name,item_price,item_source,seller,SellerId) VALUES ('$ItemImage','$ItemName','$ItemPrice','$ItemSource','$Seller','$SellerId')";
            mysqli_query($connForMyDatabase,$insertItemToDb);
  }

    // deletion sa selected item sa ViewItem page
  if(isset($_POST['clickForDelete'])){

      $ItemToBeDeleted = $_POST['deleteThisItem'];

      $sqlForDelete = "DELETE FROM items WHERE id = $ItemToBeDeleted";
      mysqli_query($connForMyDatabase,$sqlForDelete);

     

    }


    // para ma butanagan ang input sa edit sa ViewItem page
    if(isset($_POST['editIdForTheSelectedItem'])){
            $item_id = $_POST['editIdForTheSelectedItem'];

            $sql = "SELECT * FROM items WHERE id = $item_id";
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



  // para ma edit natu ang data sa SelectedItem sa ViewItem na page
  if(isset($_POST['clickForEdit'])){

    $ItemToBeEdited = $_POST['EditThisItem'];
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];

    $sqlForEdit = "UPDATE items SET item_name = '$itemName', item_price = '$itemPrice' WHERE id = $ItemToBeEdited";
    mysqli_query($connForMyDatabase,$sqlForEdit);

   

  }


  // para ma butangan ug information ang mga inputs sa profile php
  if(isset($_POST['EditInformationOfTheSaidProfileAccount'])){
    $sellerUsername = $_POST['EditInformationOfTheSaidProfileAccount'];

    $sql = "SELECT * FROM seller_account WHERE username = '$sellerUsername' ";
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
      
  $SellerFullname = $_POST['SellerFullname'];
  $SellerAge = $_POST['SellerAge'];
  $SellerBio = $_POST['SellerBio'];
  if(empty($_POST['SellerPic']) || $_POST['SellerPic'] == null){
    $SellerPic = "../profile_picture/default.jpg";
  }else{
    
    $SellerPic = "../profile_picture/".$_POST['SellerPic'];
  }
  $SelectedUserNameTObeEdited = $_POST['SelectedUserNameTObeEdited'];

  $sql = "UPDATE seller_account SET fullname = '$SellerFullname', age = '$SellerAge', bio = '$SellerBio', profile_pic = '$SellerPic' WHERE username = '$SelectedUserNameTObeEdited'";
  mysqli_query($connForMyDatabase, $sql);
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

          $SellerId =  $_SESSION['id'];
          $sql = "SELECT * FROM order_pending WHERE SellerId = $SellerId ORDER BY id DESC";

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
                    <td scope="row" class="text-center align-middle">W a i t i n g   f o r   a p p r o v a l</td>         
                    <td class="text-center align-middle">
                        <button class="btn btn-outline-success" style="box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick="Approve('.$Cartid.','.$BuyerID.','.$SellerId.',\''.$itemName.'\',\''.$itemPrice.'\',\''.$itemSource.'\',\''.$BuyerFullname.'\',\''.$BuyerLocation.'\',\''.$BuyerAge.'\',\''.$Seller.'\')">Approve Order</button>             
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


if(isset($_POST['approveOrder']) && $_POST['approveOrder'] == true){
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


  $cancel = "INSERT INTO confirmedorder (cartPendingId,BuyerId,SellerId,item_name,item_price,item_source,buyer_fullname,buyer_location,buyer_age,seller) VALUES ('$cartId','$BuyerId','$SellerId','$itemName','$itemPrice','$itemSource','$buyerFullname','$buyerLocation','$buyerAge','$Seller')";
  mysqli_query($connForMyDatabase,$cancel);

  $cancelData = "DELETE FROM order_pending WHERE id = $cartId";
  mysqli_query($connForMyDatabase,$cancelData);


  header("Location: ../Buyer/cancel_order.php");
}




?>      