<?php
include("../connection/conn.php");
session_start();




    // mao ne ang mag pa display sa items sa home php kung unsay ge search
    if (isset($_POST['searchItems']) && $_POST['searchItems'] == true){

        $value = $_POST['searchValue'];

        if($value == null){
          // if walay value ang search bar

            $getAllItems = "SELECT * FROM items";
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
                <a href="../Buyer/cartInfo.php?itemSource='.$itemId.'" class="btn btn-primary" style = "width:220px; position: absolute; bottom: 10px;">
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

          $getAllItems = "SELECT * FROM items WHERE item_name LIKE '%$value%' ";
          $queryForItems = mysqli_query($connForMyDatabase,$getAllItems);

          $counToRow = 0;

          $div = '<div class = "row">';

          while($get = mysqli_fetch_assoc($queryForItems)){

            $counToRow ++;

                $picInDb = $get['img'];
                $itemSource = $get['item_source'];
                $itemName = $get['item_name'];
                $itemPrice = $get['item_price'];

                $div.='
                <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 25rem; margin: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                <img src='.$picInDb.' class="card-img-top">
                <div class="card-body">
                <h5 class="card-title" style = "display: flex; justify-content: center; color: rgb(114, 111, 111);">'.$itemPrice.'</h5>
                <h6 class="card-text"  style = "display: flex; justify-content: center; color: rgb(114, 111, 111);"> '.$itemName.' </h6>
                <a href="../Buyer/cartInfo.php?itemSource='.$itemSource.'" class="btn btn-primary" style = "width:220px; position: absolute; bottom: 10px;">
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

?>