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

          $getAllItems = "SELECT * FROM items WHERE item_source = '$currentlySelectedShop' ";
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

        $getAllItems = "SELECT * FROM items WHERE item_name LIKE '%$value%' AND item_source = '$currentlySelectedShop' ";
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
            <div class="card" style="width: 15rem; height: 23rem; margin: 10px;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
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



  if(isset($_POST['item_image']) && isset($_POST['item_price']) && isset($_POST['item_name'])){
           $Pic = $_POST['item_image'];  
            
            $ItemName = $_POST['item_name'];
            $ItemPrice = $_POST['item_price'];
            $ItemImage = "../items/"  . $Pic;
            $ItemSource = $_POST['SelectedShop'];

           

            $insertItemToDb = "INSERT INTO items (img,item_name,item_price,item_source) VALUES ('$ItemImage','$ItemName','$ItemPrice','$ItemSource')";
            mysqli_query($connForMyDatabase,$insertItemToDb);
  }



?>      