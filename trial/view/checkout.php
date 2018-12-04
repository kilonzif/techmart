<?php

session_start();
if (isset($_SESSION['SESS_LOGGEDIN'])==TRUE) {
	header("location: ./payment.php");
}else{
	header("location: ./login.php");
}


?>