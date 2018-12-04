<?php
require_once((dirname(__FILE__)).'/../model/paymentclass.php');
require_once((dirname(__FILE__)).'/../database/config_db.php');
include_once((dirname(__FILE__)).'/../model/cartclass.php');

/*
@author:Faith Kilonzi

*/

//send email with order details to the user

function sendEmail(){
	  $toEmail=$_SESSION['SESS_USEREMAIL'];
	  $paymentObj=new Payment();
	    while ($product = $paymentObj->fetch()) {
            $invoice = $product["invoice_no"];
            $amount = $product["total_price"];

		    $body = '<p>Hi '. $_SESSION['SESS_USERNAME'].'\n 
		    Thank you for shopping with TechMart. Please find below your transaction details:</p>
		    <p> Transaction Id:'.$invoice.'\n
		        Date: '.date('Y-m-d').'\n
		        Total Price: '.$amount.'
		    </p>';
		    $subject = 'TechMart Transaction Details';
		    $header = 'from: faith@techmart.com';

	  

	
	  mail($toEmail, $subject, $body, $header);
	}
	
}

//insert the order details into order table

function insertOrder(){
	$ip_add=get_client_ip();
	$user_id=$_SESSION['SESS_USERID'];
	$invoice=mt_rand();
	        if(sendEmail()==TRUE){
	        	 $status="Completed";
	        }else{
	        	$status="In Progress";
	        }
	
	$cartObj = new ShoppingCart();
	$orderObj=new Payment();
	$cartProducts = $cartObj->getCartItems($ip_add);
	if($cartProducts){	    
	    $cartItems = $cartObj->fetchall();        

	    foreach ($cartItems as $item =>$value) {
	        $prod_id = $value[0];
	        $qty = $value[10];
	       $orderObj->insertorder($prod_id,$user_id,$invoice,$qty,$status);

	}
}
}



//display the order summary
function displayOrderDetails(){
	$cust_id=$_SESSION['SESS_USERID'];
	$paymentObj=new Payment();
	$order=$paymentObj->getOrderDetails($cust_id);
	if($order){
	        echo '<table class="table table-bordered">
	              <thead>
	                <tr>
	                  <th>Order ID</th>
	                  <th>Product Name</th>
	                  <th>Quantity</th>
	                  <th>Order Status</th>
	                  <th>Price</th>
	                  
	                </tr>
	              </thead>';
	              
	        while ($product = $paymentObj->fetch()) {
	            $prod_id = $product["order_id"];
	            $prod_invoice = $product["invoice_no"];
	            $prod_title = $product["product_title"];
	            $prod_price = $product["product_price"];
	            $status = $product["status"];
	            $qty = $product["qty"];
	            $total_price = $prod_price * $qty;

	            echo '
	              <tbody>
	                <tr>
	                  <td> #'.$prod_invoice.'</td>
	                  <td>'.$prod_title.'</td>
	                  <td>
	                     <span id="qty_span" style="font-style:Bold">'.$qty. '</span>                   
	                  </td>
	                  <td> '.$status.'</td>
	                  <td>$ '.$total_price.'</td>
	                  
	                </tr>';
	        }
	        echo '	                
	                </tbody>
	                </table>';
	            

	    } else{
	        echo '<div class="thumbnail">
	               <h3 style="text-align:center; margin:10px">Oops! Your order was not successful</h3>
	                <p style="text-align:center; margin:10px">Please Try Again </p>
	                <img src="../images/sorry.jpg" alt="No Prouct Added to Cart" class="img-responsive">
	                    <p style="text-align:center; margin:10px"> 
	                    <a href="./products.php" class="btn btn-warning">Continue Shopping</a>
	                    </p>
	            </div>' ;
	    }

}

//insert the payment of the order completed

function insertpayment(){
	 $user_id=$_SESSION['SESS_USERID'];
	 $paymentObj=new Payment();
	 $order=$paymentObj->getOrderDetails($user_id);
	 $currency = '$';

	 if($order){
	 	while ($product = $paymentObj->fetch()) {
	             $prod_id = $product["product_id"];
	             $prod_price = $product["product_price"];
	            $qty = $product["qty"];
	            $total_price = $prod_price * $qty;

	 	$paymentObj->insertpayment($total_price,$user_id,$prod_id,$currency);
	 }
	 

}
}



?>