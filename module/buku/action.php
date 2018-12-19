<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
	
	admin_only("buku", $level);
	
	$nama_buku = $_POST['nama_buku'];
	$kategori_id = $_POST['kategori_id'];
	$spesifikasi = $_POST['spesifikasi'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$update_gambar ="";
	if(!empty($_FILES["file"]["name"])){
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"] ["tmp_name"], "../../images/buku/".$nama_file);
	
		$update_gambar = ", gambar='$nama_file'";
	}
	
	if($button == "Add"){
		mysqli_query($koneksi , "INSERT INTO buku (nama_buku, kategori_id, spesifikasi, gambar, harga, stok, status) 
											VALUES ('$nama_buku', '$kategori_id', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
	}
	else if($button == "update"){
		$buku_id = $_GET['buku_id'];
		
		mysqli_query ($koneksi, "UPDATE buku SET kategori_id='$kategori_id',
													nama_buku='$nama_buku',
													spesifikasi='$spesifikasi',
													harga='$harga',
													stok='$stok',
													status='$status' 
													$update_gambar WHERE buku_id='$buku_id'");
	}
	
	header("location: ".BASE_URL."index.php?page=my_profile&module=buku&action=list");