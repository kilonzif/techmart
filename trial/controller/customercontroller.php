<?php 

/*
@author:Faith Kilonzi

*/





require_once((dirname(__FILE__)).'/../model/customerclass.php');
require_once((dirname(__FILE__)).'/../database/config_db.php');
require_once((dirname(__FILE__)).'/../database/connectdbclass.php');

/****Registration ***/

$connect =mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

/* Form Required Field Validation */
foreach($_POST as $key=>$value) {
    if(empty($_POST[$key])) {
    $error_message = "All Fields are required";
    break;
    }
}

if(isset($_POST['register'])){

/* Validation to check if contact is selected */
if(!isset($error_message)) {
if(!isset($_POST["contact"])) {
$error_message = " All Fields are required";
}
}

/* Validation to check if Terms and Conditions are accepted */
if(!isset($error_message)) {
    if(!isset($_POST["address"])) {
    $error_message = "Address Required";
    }
}


if(!isset($error_message)) {
      $ip_add = get_client_ip();
      $name=$_POST['name'];
      $pass=md5($_POST['password']);
      $email=$_POST['email'];
      $country=$_POST['country'];
      $city=$_POST['city'];
      $contact=$_POST['contact'];
      $image=$_POST['customerImg'];
      $address=$_POST['address'];

      // require_once("dbcontroller.php");
    
      $myQuery = "INSERT INTO customer(customer_ip,customer_name, customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) VALUES('$ip_add','$name', '$email', '$pass', '$country','$city','$contact','$image', '$address')";
    $res=mysqli_query($connect,$myQuery);
    if($res === TRUE) {
        $error_message = "";
        $success_message = "You have registered successfully!"; 
        unset($_POST);
        header("Refresh:1; URL=login.php");

    } else {
        $error_message = "Problem in registration. Try Again!"; 

    }
}
}

/****Login ***/

if(isset($_POST["login_user"])){
      // $myusername = mysqli_real_escape_string($connect,$_POST['name']);
      $useremail = mysqli_real_escape_string($connect,$_POST['email']);
      $mypassword =md5(mysqli_real_escape_string($connect,$_POST['password'])); 
      
      $sql = "SELECT customer_id,customer_name,customer_email,customer_pass FROM customer WHERE customer_email = '$useremail' and customer_pass = '$mypassword'";

      if ($result = $connect->query($sql)) {

          /* fetch associative array */
          while ($row = $result->fetch_assoc()) {

            
            $count = mysqli_num_rows($result);
              
            if($count == 1) {

                $_SESSION['SESS_LOGGEDIN'] = TRUE;
         
                $_SESSION['SESS_USERID'] = $row['customer_id'];
                $_SESSION['SESS_USEREMAIL'] = $_POST["email"];
                $_SESSION['SESS_USERNAME'] = $row["customer_name"];

                echo "You are successfully authenticated!";
                header('location: ../index.php');
            }else {
               $error_message = "Your Login Credentials are invalid";
            }
          }

          /* free result set */
          // $result->free();
      }else{
         $error_message = "Your Login Credentials are invalid";
      }






 


}

/****Get the User Details Summary ***/
  function getCustomerDetails(){
        $customer_id=$_SESSION['SESS_USERID'];
        $customer_email=$_SESSION['SESS_USEREMAIL'];

        $customerObj = new Customer();
        $customer = $customerObj->getCustomerDetails($customer_id,$customer_email);
         if($customer){
            echo '<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Contact</th>
                    </tr>
                  </thead>';
              
        while ($customer = $customerObj->fetch()) {
            $cust_name = $customer["customer_name"];
            $cust_email = $customer["customer_email"];
            $cust_address = $customer["customer_city"] .'  , '.$customer["customer_country"] ;
            $cust_contact = $customer["customer_contact"];

            echo '
              <tbody>
                <tr>
                  <td> <span> '.$cust_name.'</span></td>
                  <td>'.$cust_email.'</td>
                                  
                  <td> '.$cust_address.'</td>
                  <td> '.$cust_contact.'</td>
                </tr>';
        }
        echo '
                 </tbody>
                </table>';

    } else{
      echo '<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Contact</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <p>--------------------------------------------------</p>
                  </table>
                  ';

    }
}



  





?>