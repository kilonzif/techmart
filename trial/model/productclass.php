<?php 

require_once((dirname(__FILE__)).'/../database/config_db.php');
require_once((dirname(__FILE__)).'/../database/connectdbclass.php');
/*
@author:Faith Kilonzi

*/


/***
*Modelling the Prooduct Class
@setters and getters methods
@method:addProduct,getProduct,getProductId


***/
class ProductClass extends Dbconnection
{


	function addProduct($category,$brand,$productName,$price,$description,$target,$keyword){
		$insertQuery="INSERT INTO products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES ('$category','$brand','$productName','$price','$description','$target','$keyword')";
        return $this->query($insertQuery);
	}

	function getProducts(){
		$sql = 'SELECT * FROM products ORDER BY RAND()';
		return $this->query($sql);
	}
	function getProductById($prod_id){
			$sql = "SELECT * FROM products WHERE product_id = '$prod_id'";
			return $this->query($sql);
		}

		function getProductsByCategory($cat_id){
		$sql = "SELECT * FROM products WHERE product_cat = '$cat_id'";
		return $this->query($sql);
	}
	function getCategoryName($cat_id){
		$sql = 'SELECT cat_name FROM categories WHERE cat_id='.$cat_id;
		return $this->query($sql);
	}

	//search
	function searchProduct($keyword){
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%' OR product_title LIKE '%$keyword%'";
		return $this->query($sql);
	}
	
	function getFeaturedProducts(){
		$sql = 'SELECT * FROM products ORDER BY RAND() LIMIT 4';
		return $this->query($sql);
	}

	function getAllProducts(){
		$sql = 'SELECT * FROM products ORDER BY RAND()';
		return $this->query($sql);
	}

	function getCategories(){
		$sql = 'SELECT * FROM categories';
		return $this->query($sql);
	}

	function getBrands(){
		$sql = 'SELECT * FROM brands';
		return $this->query($sql);
	}



} 


 ?>