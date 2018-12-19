<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	$buku_id = $_GET['buku_id'];
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;
	
	$query = mysqli_query($koneksi, "SELECT nama_buku, gambar, harga FROM buku WHERE buku_id='$buku_id'");
	$row = mysqli_fetch_assoc($query);
	
	$keranjang[$buku_id] = array ("nama_buku" => $row["nama_buku"],
									"gambar" => $row["gambar"],
									"harga" => $row["harga"],
									"quantity" => 1);
									
	$_SESSION["keranjang"] = $keranjang;
	
	header("location:".BASE_URL);

?>