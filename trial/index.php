<?php


 	require_once('./controller/productcontroller.php');
 	require_once('./controller/shoppingcartcontroller.php');
 	/*
@author:Faith Kilonzi

*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Faith Kilonzi">

	<title>&#128187;TechMart</title>
	<link rel="shortcut icon" type="image/png" href="./images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="./css/techstyle.css">
	<script type="text/javascript" src="./js/ajaxfunctions.js"></script>
</head>
<body>
	<header>
		<div id="topheader">
			<h1 style="font-family:comic sans ms">&#128435;&#128241;<img src="./images/logo.png" alt="TechMart" height="80" width="220">&#428;&#283;ch &#9420;ith &#663;onvenience</h1>			
		</div>
		<div class="topnav">
		   <a class="active" href="./index.php">Home</a>
		   <a href="./view/products.php">Products</a>
		   <a href="./view/account.php">Account</a>
		   <a href="./view/cart.php">ShoppingCart</a>
		   <a href="./view/contact.php">Contact Us</a>
		 <div class="search-container">
		   <form action="./view/product_details.php">
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

                    			if(!isset($_SESSION['SESS_LOGGEDIN'])==TRUE){
                    				echo "<a >Welcome, Guest \t \t \t \t \t</a>";
                    				
                    				echo "<span style='color: #fff;'><a href='./view/login.php'  style='color: #FFF;'>Login 🛒</a></span>";
                    			}else{
                    				echo "<a>Welcome ".$_SESSION['SESS_USERNAME']."\t \t \t \t \t <a>";
                    				echo "<span style='color: #fff;'><a href='./view/logout.php'  style='color: #FFF; text-decoration: none;'>Logout </a></span>";
                    				
                    			}

                    		 ?></span>
                    		<span style="float: left;color: #fff;text-indent:5em;">Total Price :  $ <?php echo getTotalItemAmountInCart(); ?></span>
                    		<span style="text-indent:5em;"><a href="./view/cart.php" style="color: #FFF; text-decoration: none;"></span>
                    		<span style="float: left;color: #fff;text-indent:5em;">     Total Items [  <?php echo getTotalItemsInCart(); ?> ]  </span> </a> 
                    		<span style="float: left;color: #fff;text-indent:5em;"><a href="./view/cart.php"  style="color: #FFF; text-decoration: none;">Go to Cart 🛒</a></span>
                    	<!-- </div> -->
                    </div>
				</div>
				<!-- menu nav -->


			</div>

		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">

			<!-- home wrap -->
			<div class="home-wrap">
				<div class="row" style="margin-left: 50px">
				  <div class="column" >
				  	<div class="product product-single">
				  		<?php displayFeaturedProducts() ?>
				  	</div>
				  </div>
				  <div class="column" style="">
				   <div class="product product-single">
				   		<?php displayFeaturedProducts() ?>
				   
				   	   </div>
				  </div>
				  <div class="column" style="">
				  	<div class="product product-single">
				  			<?php displayFeaturedProducts() ?>
				  	</div>
				  </div>
				  <div class="column" style="">
				    <div class="product product-single">
				    	<?php displayFeaturedProducts() ?>
				    </div>
				  </div>
				</div>		
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->
	<div class="row" style="margin-left: 50px">
	  <div class="column" >
	  	<div class="product product-single">
	  		<?php displayFeaturedProducts() ?>
	  	</div>
	  </div>
	  <div class="column" style="">
	   <div class="product product-single">
	   		<?php displayFeaturedProducts() ?>
	   
	   	   </div>
	  </div>
	  <div class="column" style="">
	  	<div class="product product-single">
	  			<?php displayFeaturedProducts() ?>
	  	</div>
	  </div>
	  <div class="column" style="">
	    <div class="product product-single">
	    	<?php displayFeaturedProducts() ?>
	    </div>
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
	<script type="text/javascript" src="./js/techjs.js"></script>
	<script type="text/javascript" src="./js/ajaxfunctions.js"></script>





</body>
</html>