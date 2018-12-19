<?php 

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$q = $_GET["q"];

	$query = mysqli_query($koneksi, "SELECT *FROM buku WHERE status='on' AND nama_buku LIKE '%$q%'");

	while($row = mysqli_fetch_assoc($query)){
		
		echo "
						<div class='card detail-barang'>
				         
				        <a href='".BASE_URL."index.php?page=detail&buku_id=$row[buku_id]'> 
				         <img src='".BASE_URL."images/barang/$row[gambar]' /> 
				        </a> 
				        <p class='price'>".rupiah($row['harga'])."</p>
				        <div class='keterangan-gambar'> 
				         <p><a href='".BASE_URL."index.php?page=detail&buku_id=$row[buku_id]'>$row[nama_buku]</a></p> 
				         <span>stok : $row[stok]</span> 
				        </div> 
				        <div class='button-add-cart'> 
				         <a href='".BASE_URL."tambah_keranjang.php?buku_id=$row[buku_id]'>Add to cart</a> 
				        </div>
				        </div>
				        </div>"; 
	}
?>