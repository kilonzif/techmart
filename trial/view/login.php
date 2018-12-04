<?php
  require_once('../controller/productcontroller.php');
  require_once('../controller/shoppingcartcontroller.php');
  require_once('../controller/customercontroller.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Faith Kilonzi">
<link rel="stylesheet" type="text/css" href="../css/techstyle.css">
  <title>&#128187;TechMart</title>
  <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>


  <style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}
  .error-message {
    padding: 7px 10px;
    background: #fff1f2;
    border: #ffd5da 1px solid;
    color: #d6001c;
    border-radius: 4px;
  }
  .success-message {
    padding: 7px 10px;
    background: #cae0c4;
    border: #c3d0b5 1px solid;
    color: #027506;
    border-radius: 4px;
  }
   input[type=email] {
      width: 45%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
  }
   input[type=password] {
      width: 45%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
  }
  input[type=submit] {
    background-color: #338AFF;;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
  }

  input[type=submit]:hover {
      background-color: #45a049;
  }

  .container form {
    margin-left: 280px;
  }
  </style>
</head>
<body>
  <header>
  <div id="topheader">
    <h1 style="font-family:comic sans ms">&#128435;&#128241;<img src="../images/logo.png" alt="TechMart" height="80" width="220">&#428;&#283;ch &#9420;ith &#663;onvenience</h1>    
  </div>

  <div class="topnav">
     <a href="../index.php">Home</a>
     <a href="./products.php">Products</a>
     <a  class="active" href="./account.php">Account</a>
     <a  href="./cart.php">ShoppingCart</a>
     <a href="./contact.php">Contact Us</a>
   <div class="search-container">
     <form action="/action_page.php">
      <p> <input type="text" placeholder="Search.." name="search" required="required">
       <button type="#">🔍<i class="fa fa-search"></i></button></p>
     </form>
   </div>
     <!-- Search -->
    
  </div>
  </header>

  <!-- NAVIGATION -->
  <div id="navigation">
    <!-- container -->
    <div class="container">
      <div id="responsive-nav">
       <!-- category nav -->
              <div class="category-nav">
                <span class="category-header">Categories <i class="fa fa-list"></i></span>
                <ul class="category-list">
                   <li class="dropdown">
                      <a href="javascript:void(0)" class="dropbtn">Phones &#707;</a>
                      <div class="dropdown-content">
                        <a href="#">Infinix</a>
                        <a href="#">Samsung</a>
                        <a href="#">Nokia</a>
                        <a href="#">Tecno</a>
                        <a href="#">Itel</a>
                        <a href="#">Iphone</a>
                      </div>
                    </li>
                  <li><a href="#">Laptop</a></li> 
                  <li><a href="#">Desktop</a></li>    
                  <li><a href="#">Video Games & Consoles</a></li> 
                  <li><a href="#">TV & Audio</a></li> 
                  <li><a href="#">Car Electronics </a></li>
                      <li class="dropdown">
                      <a href="javascript:void(0)" class="dropbtn">Tablets &#707;</a>
                      <div class="dropdown-content">
                        <a href="#">Infinix</a>
                        <a href="#">Samsung</a>
                        <a href="#">Nokia</a>
                        <a href="#">Tecno</a>
                        <a href="#">Itel</a>
                        <a href="#">Iphone</a>
                      </div>
                    </li>
                  <li><a href="#">Hardware</a></li> 
                  <li><a href="#">Accesories</a></li> 
                  <p></p><br>
                  <span class="category-header">Brands <i class="fa fa-list"></i></span>
                  <ul>
                    <li><a href="hgdsh">Apple</a></li>
                    <li><a href="hgdsh">Samsung</a></li>
                    <li><a href="hgdsh">Infinix</a></li>
                    <li><a href="hgdsh">HP</a></li>
                    <li><a href="hgdsh">Dell</a></li>
                    <li><a href="hgdsh">Sony</a></li>

                  </ul>
                </ul>
              
              </div>

              <!-- /category nav -->

          <!-- menu nav -->
          <div class="menu-nav">
            <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                      <div id="welcomeLine" class="row">
                          <p></p><br>
                             <span style="float: left;color: #fff;text-indent:5em;"> <?php 

                          if(isset($_SESSION['SESS_LOGGEDIN'])==TRUE){
                            echo "Welcome ".$_SESSION['SESS_USERNAME'];
                            echo "<span style='float: left;color: #fff;text-indent:5em;'><a href='./logout.php'  style='color: #FFF; text-decoration: none;'>Logout </a></span>";
                          }else{
                            echo "<a>Welcome, Guest</a>";
                            echo "<span style='float: left;color: #fff;'><a href='./login.php'  style='color: #FFF;'>Login 🛒</a></span>";
                          }

                         ?></span>
                          <span style="float: left;color: #fff;text-indent:5em;">Total Price :  $ <?php echo getTotalItemAmountInCart(); ?></span>
                          <span style="text-indent:5em;"><a href="./cart.php" style="color: #FFF; text-decoration: none;"></span>
                          <span style="float: left;color: #fff;text-indent:5em;">     Total Items [  <?php echo getTotalItemsInCart(); ?> ]  </span> </a> 
                          <span style="float: left;color: #fff;text-indent:5em;"><a href="./cart.php"  style="color: #FFF; text-decoration: none;">Go to Cart 🛒</a></span>
                        <!-- </div> -->
                      </div>
          </div>
          <!-- menu nav -->


      </div>

    </div>
    <!-- /container -->
  </div>
  <!-- /NAVIGATION -->
<div id="home">
  <div class="container">
   <h3> Customer Login</h3>

  <center>
    <form action="" method="POST" name="myForm" onsubmit="return validateLogin();" >
           Email:<input type="email" id="email" name="email" placeholder="example@email.com"><br>
           <span id="email_error" class="text-warning"></span>  
           Password: <input type="password" id="password" name="password" placeholder="password"><br>
           <span id="password_error" class="text-warning"></span>  
          
           <center><input type="submit" name="login_user" value="Login"></center>
           <span id="success_message" class="text-success"></span>  
                           <br/>
            <p>Do Not have an account <a href="./signup.php">Sign Up</a></p>
     </form>          
  </center>
  </div>
  
</div>



<footer id="footer" style="margin-top: 550px">

      <h3>TechMart</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

    <hr>
    <div class="row">
        <center><div class="footer-copyright">
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |by 🔥 <a href="https://github.com/kilonzif" target="_blank">kilonziIT</a>
        </div></center>
    </div>
</footer> 
<!-- /FOOTER -->

<!-- scripts -->
<script type="text/javascript" src="../js/techjs.js"></script>


</body>
</html>
