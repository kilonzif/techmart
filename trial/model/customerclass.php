<?php 

require_once((dirname(__FILE__)).'/../database/config_db.php');
require_once((dirname(__FILE__)).'/../database/connectdbclass.php');

/**
* *author: Faith Kilonzi
*/



/*** Class Model of the Customer ***/
class Customer extends Dbconnection
{

   //regristration

	function registercustomer($ip,$name, $email, $pass, $country,$city,$contact,$image, $address){
		 $myQuery = "INSERT INTO customer(customer_ip,customer_name, customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) VALUES($'ip','$name', '$email,' '$pass', '$country','$city','$contact','$image', '$address')";

        return $this->query($myQuery);
	}


     //login validation
	function checkDuplicateCustomer($ip_address, $email){
		$sql = "SELECT * FROM customer WHERE customer_ip='$ip_address' AND customer_email='$email'";
		return $this->query($sql);
	}

	//login function
 
	function loginCustomer($email,$pass){
		$sql = "SELECT * FROM customer WHERE email='$email' AND customer_pass='$pass' LIMIT 1";
		 return $this->query($sql);
	}
	//customer details summary
	function getCustomerDetails($customer_id,$email){
		$sql=$sql = "SELECT * FROM customer WHERE customer_id='$customer_id' AND customer_email='$email'";
			return $this->query($sql);

	}

}

 ?>