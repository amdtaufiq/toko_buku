<?php
	
	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
	
	session_start();
	
	$pesanan_id =$_GET['pesanan_id'];
	$button = $_POST['button'];
	
	if($button == "Konfirmasi"){
		
		$user_id = $_SESSION["user_id"];
		$nomor_rekening = $_POST['nomor_rekening'];
		$nama_account = $_POST['nama_account'];
		$tangggal_transfer = $_POST['tanggal_transfer'];
		
		$queryPembayaran = mysqli_query($koneksi, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES('$pesanan_id','$nomor_rekening','$nama_account','$tangggal_transfer')");
	
		if($queryPembayaran){
			mysqli_query($koneksi, "UPDATE pesanan SET status='1' WHERE pesanan_id='$pesanan_id'");
		}
		
	}else if($button == "Edit Status"){
			$status = $_POST["status"];
			
			mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id'");
			
			if($status == "2"){
				$query = mysqli_query($koneksi, "SELECT * FROM pesanan_detail WHERE pesanan_id='$pesanan_id'");
				while($row=mysqli_fetch_assoc($query)){
					$buku_id = $row["buku_id"];
					$quantity = $row["quantity"];
					
					mysqli_query($koneksi, "UPDATE buku SET stok=stok-$quantity WHERE buku_id='$buku_id'");
				}
			}
		}
		
		header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
?>