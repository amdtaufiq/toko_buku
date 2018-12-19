<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
	
	
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = md5($_POST['password']);
	$gambar = $_POST['gambar'];
	$button = $_POST['button'];
	
	
	if($button == "update"){
		$user_id = $_GET['user_id'];
		
        $status=mysqli_query ($koneksi, "UPDATE user SET nama='$nama', email='$email', phone='$phone', alamat='$alamat', gambar='$gambar' WHERE user_id=$user_id");
        if($status){
            header("location: ".BASE_URL."index.php?page=my_profile&module=profile&action=list");
        }else{
            header("location: ".BASE_URL."index.php?page=my_profile&module=profile&action=action");
        }
        
	}
	