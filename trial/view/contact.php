<?php
  require_once('../controller/productcontroller.php');
  require_once('../controller/shoppingcartcontroller.php');

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

input[type=text], select, textarea {
    width: 100%;
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
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
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
    <a href="./account.php">Account</a>
    <a href="./cart.php">ShoppingCart</a>
    <a class="active" href="./contact.php">Contact Us</a>
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
                                  echo "<span style='float: left;color: #fff;text-indent:5em;'><a href='./view/logout.php'  style='color: #FFF; text-decoration: none;'>Logout </a></span>";
                                }else{
                                  echo "<a>Welcome, Guest</a>";
                                  echo "<span style='float: left;color: #fff;'><a href='./view/login.php'  style='color: #FFF;'>Login 🛒</a></span>";
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
  <h3>Contact Form</h3>

  <div class="container">
    <form action="/action_page.php">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name..">

      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">

      <label for="country">Country</label>
      <select id="country" name="country">
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
      </select>

      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

      <center><input type="submit" value="Submit"></center>
    </form>
  </div>
    <p></p><br>
  
</div>



<!-- FOOTER -->
<footer id="footer">

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
<script type="text/javascript" src="js/techjs.js"></script>


</body>
</html>
