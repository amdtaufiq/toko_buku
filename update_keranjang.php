<?php 
	
	session_start();
	
	$keranjang = $_SESSION["keranjang"];
	$buku_id = $_POST["buku_id"];
	$value = $_POST["value"];
	
	$keranjang[$buku_id]["quantity"] = $value;
	
	$_SESSION["keranjang"] = $keranjang; 
	
?>