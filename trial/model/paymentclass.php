<?php 



/**
*author:Faith Kilonzi
**/

require_once((dirname(__FILE__)).'/../database/connectdbclass.php');


//PAYMENT AND ORDER CLASS

class Payment extends Dbconnection{
	//Insert order
	function insertorder($prod_id,$user_id,$invoice,$qty,$status){
		     $sql="INSERT INTO orders(product_id, customer_id, invoice_no, qty, status) VALUES ('$prod_id', '$user_id','$invoice', '$qty','$status')";
		return $this->query($sql);
	}
   //insert payment
	function insertpayment($amount,$user_id,$product_id,$currency){
		
		$sql="INSERT INTO payment(amt, customer_id, product_id, currency) VALUES ('$amount','$user_id','$product_id',$currency')";
		return $this->query($sql);
	}

   //get order details summary
	function getOrderDetails($customer_id){
			$sql = "SELECT p.product_id, p.product_cat, p.product_brand, p.product_price, p.product_title, p.product_desc, p.product_image, p.product_keywords, o.customer_id,o.invoice_no,o.order_id,o.qty,o.status FROM products AS p JOIN orders AS o ON p.product_id = o.product_id AND o.customer_id='$customer_id'";
			return $this->query($sql);	}



}


?>
?>