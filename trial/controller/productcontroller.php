

<?php 
/*
@author:Faith Kilonzi

*/

 require_once((dirname(__FILE__)).'/../model/productclass.php');


//Adding the products into the database 
 if(isset($_POST['submit']))
   {

  $productName=$_POST['productName'];
  $category=$_POST['category'];
  $brand=$_POST['brand'];
  $description=$_POST['description'];
  $price=$_POST['price'];
  $keyword=$_POST['keyword'];


  $target = "../images/";  //This is the directory where images will be saved//

   $target = $target . basename( $_FILES['productImage']['name']);  
    move_uploaded_file($_FILES['productImage']['tmp_name'], $target);

    uploadProduct($category,$brand,$productName,$price,$description,$target,$keyword);

}

//function to upload the products into the database table

function uploadProduct($category,$brand,$productName,$price,$description,$target,$keyword){

	$prod_obj = new ProductClass();
    $prod_obj->addProduct($category,$brand,$productName,$price,$description,$target,$keyword);

	
}


//function to display the featured Products
function displayFeaturedProducts(){
    $prod_obj = new ProductClass();
    $products = $prod_obj->getFeaturedProducts();
    if($products){
        while ($product = $prod_obj->fetch()) {
            $prod_image = substr($product["product_image"], 1);
            $viewPage = './view/product_details';
            $prod_id = $product["product_id"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];

            echo '
                <div class="product-thumb">
                  
                  <div class="product-label">
                    <span style="background-color:lightblue;">Offer</span>
                    <span class="sale" style="color: red;">-20%</span>
                  </div>
                  <a href="'.$viewPage.'.php?key='.$prod_id.'"><img src="'.$prod_image.'" alt='.$prod_title.' alt="" width="200" height="200" "></a>
                  <h5>'.$prod_title.'   $'.$prod_price.'</h5>
                  <h4><a href="'.$viewPage.'.php?key='.$prod_id.'" style="color:#fff; text-decoration:none;"><button class="primary-btn add-to-cart" style="background-color: #338AFF;border-radius: 4px;height: 40px; width: 140px; font-style: 40px; color: #fff;"><i class="fa fa-shopping-cart">🛒</i>VIEW</a> </button></h4>
                </div>';


              
            }

    }
}

//function to display all the Products in the products page
function displayAllProducts(){
    $prod_obj = new ProductClass();
    $products = $prod_obj->getAllProducts();
    if($products){
        while ($product = $prod_obj->fetch()) {
            $prod_image = $product["product_image"];
            $viewPage = './product_details';
            $prod_id = $product["product_id"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];

            echo '
            <div class="column" >
          <div class="product product-single">
                <div class="product-thumb">
                  
                  <div class="product-label">
                    <span style="background-color:lightblue;">Offer</span>
                    <span class="sale" style="color: red;">-20%</span>
                  </div>
                  <a href="'.$viewPage.'.php?key='.$prod_id.'"><img src="'.$prod_image.'" alt='.$prod_title.' alt="" width="200" height="200" "></a>
                  <h5>'.$prod_title.'   $'.$prod_price.'</h5>
                  <h4><a href="'.$viewPage.'.php?key='.$prod_id.'" style="color:#fff; text-decoration:none;"><button class="primary-btn add-to-cart" style="background-color: #338AFF;border-radius: 4px;height: 40px; width: 140px; font-style: 40px; color: #fff;"><i class="fa fa-shopping-cart">🛒</i>VIEW</a> </button></h4>
                </div>
                 </div>
        </div>'

                ;


              
            }

    }
}

//function to display a single product on details page
function displaySingleProduct($prod_id){
     $prod_obj = new ProductClass();
    $products = $prod_obj->getProductById($prod_id);
    if($products){
        $product = $prod_obj->fetch();
            $prod_id = $product["product_id"];
            $prod_image = $product["product_image"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
            $prod_cat_id = $product["product_cat"];
            $prod_desc = $product["product_desc"];
            $prod_keyword = $product["product_keywords"];

            $resp = $prod_obj->getCategoryName($prod_cat_id);
            $prod_category = ($resp == true) ? $prod_obj->fetch() : "None";

            echo '<div class="imgvw" style="float:left">
                <h3>'.$prod_title.'</h3>
                <img src="'.$prod_image.'" alt='.$prod_title.' width="300px" style="padding-right:20px;">
              </div>
              <div id="abtProd">
              <h3 class="product-price"> $ '.$prod_price.'</h3>
                <p>⭐⭐⭐⭐✰</p>
                <a href="#">3 Review(s) / Add Review</a>
              <p><strong>Availability:</strong> In Stock</p>
              <p><small>'.$prod_category["cat_name"].'</small></p>
              <p>'.$prod_desc.'</p>
              <div class="product-btns"style="display: inline-block;">
                  <span class="text-uppercase">QTY: </span>
                  <input class="input" type="number" min="0" placeholder="1" style="border-color:#338AFF;border-radius: 4px;height: 40px; width: 100px; font-style: 40px; color:black;">
              
                <button style="background-color: #338AFF;border-radius: 4px;height: 40px; width: 140px; font-style: 40px; color: #fff;" value = "'.$prod_id.'" onclick="addItemToCart(this.value, 1)" > 🛒Add to Cart</button>        
                  <button id="cart" style="border-color:#338AFF;border-radius: 4px;height: 40px; width: 100px; font-style: 40px; color: #000000;"><a href="cart.php">View Cart🛒 </a> </button>

               </div> </div>';

    }

} 

//function to get the category of all the Products 

function getAllCategories(){
  $obj = new ProductClass();
  $result = $obj->getCategories();
  while ($row = $obj->fetch()) {
    echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
  }
}


//search function per keyword
function displaySearchProduct($keyword){
    $prod_obj = new ProductClass();
    $products = $prod_obj->searchProduct($keyword);
    if($products){
        while ($product = $prod_obj->fetch()) {
            $prod_image = $product["product_image"];
            $viewPage = "./product_details";
            $prod_id = $product["product_id"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
             $prod_cat_id = $product["product_cat"];
            $prod_desc = $product["product_desc"];
            $resp = $prod_obj->getCategoryName($prod_cat_id);
            $prod_category = ($resp == true) ? $prod_obj->fetch() : "None";

            echo '
                            <div class="product-thumb">
                              
                              <div class="product-label">
                                <span style="background-color:lightblue;">Offer</span>
                                <span class="sale" style="color: red;">-20%</span>
                              </div>
                              <a href="'.$viewPage.'.php?key='.$prod_id.'"><img src="'.$prod_image.'" alt='.$prod_title.' alt="" width="200" height="200" "></a>
                              <h5>'.$prod_title.'   $'.$prod_price.'</h5>
                              <h4><a href="'.$viewPage.'.php?key='.$prod_id.'" style="color:#fff; text-decoration:none;"><button class="primary-btn add-to-cart" style="background-color: #338AFF;border-radius: 4px;height: 40px; width: 140px; font-style: 40px; color: #fff;"><i class="fa fa-shopping-cart">🛒</i>VIEW</a> </button></h4>
                            </div>';

        }
    } else{
        echo '<div class="thumbnail">
               <h3 style="text-align:center;color:red;">Oops! your search did not match any product</h3>
                <p style="text-align:center;">Try again...</p>
                <img src="../images/noImage.jpeg" alt="The Prouct is not Available At The Moment" />
            </div>' ;
    }

}


  
   


?>