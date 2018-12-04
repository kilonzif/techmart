<?php 
require_once('../controller/productcontroller.php');
 require_once('../database/config_db.php');


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Faith Kilonzi">
<link rel="stylesheet" type="text/css" href="../css/techstyle.css">
  <title>&#128187;TechMart</title>
  <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
<style type="text/css">
  .container form{
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
    <a class="active" href="./products.php">Products</a>
    <a href="./shop.html">Shop </a>
    <a href="../account.php">Account</a>
    <a href="../offers.php">Offers</a>
    <a href="../contact.php">Contact Us</a>
  <div class="search-container">
    <form action="/action_page.php">
     <p> <input type="text" placeholder="Search.." name="search" required="required">
      <button type="submit">🔍<i class="fa fa-search"></i></button></p>
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
        <ul class="menu-list">
          <li><a href="#">Welcome Guest</a></li>
          <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">My Account 👤 <i class="fa fa-caret-down"></i></a></li>
          <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Wishlist ❤ <i class="fa fa-caret-down"></i></a></li>
          <li><a href="#">Checkout✔</a></li>
          <li><a href="./addproduct.php">➕ Add New product </a></li>
          <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Go to Cart 🛒 <i class="fa fa-caret-down"></i></a></li>
        </ul>
      </div>
      <!-- menu nav -->


    </div>

  </div>
  <!-- /container -->
 </div>
 <!-- /NAVIGATION -->
<div id="home">
  <div class="container">
   <form action="" method="POST" enctype="multipart/form-data" name="UploadForm" onsubmit="return validateUpload()">

      <label for="fname">Product Name</label>
      <input type="text" id="pname" name="productName" placeholder="Product.." required="required">

      <div class="catbrand">
        <label for="category">Category</label>
          <select id="category" name="category" required>
            <option value="none">Please Select Category</option>
              <?php 
              $connect=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
               $sql ="SELECT * FROM categories";
              $resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
              while( $rows = mysqli_fetch_assoc($resultset) ) {
              ?>
              <option value="<?php echo $rows["cat_id"]; ?>"><?php echo $rows["cat_name"]; ?></option>
              <?php } ?> 
           </select> 
          <label for="brand">Brand</label>
         <select id="brand" name="brand" required="required">
          <option value="none">Please Select Brand</option>
            <?php 
            $connect=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
             $sql ="SELECT * FROM brands";
            $resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
            while( $rows = mysqli_fetch_assoc($resultset) ) {
            ?>
            <option value="<?php echo $rows["brand_id"]; ?>"><?php echo $rows["brand_name"]; ?></option>
            <?php } ?> 
       </select>
        
      </div>
      <label for="description">Description</label>
      <textarea id="description" name="description" placeholder="Write something.." style="height:100px" required="required"></textarea>
      <div class="imgprice">
          <label for="fname">Price</label>
        <input type="number" id="price" name="price" placeholder='$0.00' min="0" required="required">

            <label for="keyword">Keywords</label>
          <input type="text" id="keyword" name="keyword" placeholder='keyworda' required="required"> <br><br>

        </div>

        <div class="chooseimg">
              <label for="image">Product Image</label>
          <input type="file" id="productImage" name="productImage" placeholder="" required="required">
              <label for="image">Other images</label>
          <input type="file" id="productImage2" name="productImage2" placeholder="Product.."> <br><br>
        </div>

           

       
      <center>
        <input type="submit" value="Submit" name="submit">
      </center>
      <p></p><br><br>

    </form>
  </div>
  
</div>



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
<script type="text/javascript" src="../js/techjs.js"></script>


</body>
</html>
