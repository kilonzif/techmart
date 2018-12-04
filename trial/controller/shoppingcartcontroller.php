<?php 
/*
@author:Faith Kilonzi

*/

include_once((dirname(__FILE__)).'/../model/cartclass.php');

session_start(); //start the session

$operation_status = '';

//updating items in the cart function

if(isset($_POST["update_qty"]) && !empty($_POST["update_qty"])){
   $prod_id = $_POST["update_qty"];
    $qty = $_POST["qty"];
    updateCartQty($prod_id, $qty, 1);
}

if(isset($_GET["type"])){
    $type=$_GET["type"];
    switch ($type) {
        case 'add':
            $prod_id = $_GET["prod_id"];
            $qty = $_GET["qty"];
            addItemToCart($prod_id, $qty);
            $insidecart=$_SESSION['cart'];
            break;

        case 'delete':
            $prod_id = $_GET["prod_id"];
            removeItemFromCart($prod_id);
            break;

        case 'update':
            $prod_id = $_GET["prod_id"];
            $qty = $_GET["qty"];
            updateCartQty($prod_id, $qty, 2);
            break;    
        
        default:
            # code...
            break;
    }
    
}

//getting all the cart items 

function getTotalItemsInCart(){
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();
    $response = $cartObj->getCartItemQty($ip_add);
    if($response){

        $row = $cartObj->getRow();
        //session_start();
        $_SESSION['cart']=TRUE;
        $_SESSION['cart']=$row;
        return ($row != null) ? $row : "0";
    }  else{
        return "0";
    }   
}

// getTotalItemAmountInCart function gets the total price of items inside the cart
function getTotalItemAmountInCart(){
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();
    $response = $cartObj->getCartItemsAmount($ip_add);
    if($response){
        $row = $cartObj->fetch();
        return ($row['amount'] != null) ? $row['amount'] : "0";
    }  else{
        return "0";
    }  
}


//function to add item to cart
function addItemToCart($prod_id, $qty){
    $toReturn = array();
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();

    //check for duplicates
    $check = $cartObj->validateCart($ip_add, $prod_id);
    if($check){
        $toReturn[] = array(
            'status' => 'failed',
            'message' => 'Duplicate: item already added to cart'
        );
        echo json_encode($toReturn);
    } else{ 
            $response = $cartObj->addToCart($prod_id, $ip_add, $qty);
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item successfully added to cart'
            );
            $_SESSION['cart'] = TRUE;

                $_SESSION['cart'] = $cartObj;
                $_SESSION['ip'] = $ip_add;

            echo json_encode($toReturn);
            
        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not add item to cart'
            );
            echo json_encode($toReturn);
        }

    }

}
//function to remove item from cart
function removeItemFromCart($prod_id){
    $toReturn = array();
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();

    $response = $cartObj->removeCartItem($prod_id, $ip_add);
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item successfully removed from cart'
            );
            echo json_encode($toReturn);
            
        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not delete item from cart'
            );
            echo json_encode($toReturn);
        }

}

//function to update item in cart
function updateCartQty($prod_id, $qty, $which_method){
    $toReturn = array();
    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();

    $response = $cartObj->updateCartQuantity($prod_id, $qty, $ip_add);

    if($which_method == 1){
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item quantity successfully updated'
            );
            //echo json_encode($toReturn);
            
        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not update cart item quantity'
            );
            //echo json_encode($toReturn);
        }

    } else{
        if($response){
            $toReturn[] = array(
                'status' => 'success',
                'message' => 'item quantity successfully updated'
            );
            echo json_encode($toReturn);
            
        } else{
            $toReturn[] = array(
                'status' => 'failed',
                'message' => 'Could not update cart item quantity'
            );
            echo json_encode($toReturn);
        }
    }

}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//clearing the cart after the order is made
function deleteCart(){
    $ip_address=get_client_ip();
    $obj=new ShoppingCart();
    $del=$obj->deletecart($ip_address);
}

//display the products in the cart as per the current IP address

function displayCartProducts(){

    $ip_add = get_client_ip();
    $cartObj = new ShoppingCart();
    $cartProducts = $cartObj->getCartItems($ip_add);
    if($cartProducts){
        echo '<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Quantity/Update</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
              </thead>';
              
        while ($product = $cartObj->fetch()) {
            $prod_id = $product["product_id"];
            $prod_image = $product["product_image"];
            $prod_title = $product["product_title"];
            $prod_price = $product["product_price"];
            $qty = $product["qty"];
            $total_price = $prod_price * $qty;

            echo '
              <tbody>
                <tr>
                  <td> <img width="100" height="50" src="'.$prod_image.'" alt="'.$prod_title.'" class="img-responsive" /></td>
                  <td>'.$prod_title.'</td>
                  <td>
                    <form action="" method="POST">
                    <input id="qty" name="qty" min="1" style="width:50px" size="16" type="number" value = "'.$qty.'"> <span id="qty_span" style="color:red"></span>
                    <button type= "submit" name="update_qty" value = "'.$prod_id.'" class="btn btn-info" style="color:blue">Update</button>
                    
                    <button type= "button" value = "'.$prod_id.'" class="btn btn-danger" onclick="removeCartItem(this.value)" style="color:red">Remove</button>
                    </form>
                  </td>
                  <td>$ '.$prod_price.'</td>
                  <td>$ '.$total_price.'</td>
                </tr>';
        }
        echo '
                <tr>
                  <td colspan="4" style="text-align:right"><strong>Total Price:</strong> </td>
                  <td> <strong>$ '.getTotalItemAmountInCart().'</strong></td>
                </tr>
                
                </tbody>
                </table>
                <button style="background-color:grey;border-radius: 4px;height: 30px; width: 140px; font-style: 40px; color: #fff;"><a href="products.php" style="text-decoration:none; color:#fff"> Continue Shopping </a></button>
                <button style="background-color: #38Afed;border-radius: 4px;height: 30px; width: 140px; font-style: 40px; color: #fff;float:right"><a href="checkout_payment.php" style="text-decoration:none; color:#fff">Checkout ⏩</a></button>';

    } else{
        echo '<div class="thumbnail">
               <h3 style="text-align:center; margin:10px">Oops! it seems you dont have any product in cart</h3>
                <p style="text-align:center; margin:10px">Try adding one</p>
                <img src="../themes/images/sorry.jpg" alt="No Prouct Added to Cart" class="img-responsive">
                    <p style="text-align:center; margin:10px"> 
                    <a href="./products.php" class="btn btn-warning">Back to Home</a>
                    </p>
            </div>' ;
    }
}


 ?>
