<?php

	define ("BASE_URL", "http://localhost/toko/");
	
	$arrayStatusPesanan[0] = "menunggu pembayaran";
	$arrayStatusPesanan[1] = "pembayaran sedang diValidasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "barang dikirim";
	$arrayStatusPesanan[4] = "Pesanan di Tolak";
	
	function rupiah($nilai = 0){
		$string = "Rp." .number_format($nilai);
		return $string;
	}
	//new modify 3
	function kategori($kategori_id = false){
		global $koneksi;
		
		$string = "<div id='menu-kategori'>";
			
				$string .="<ul>";
				
						$query = mysqli_query($koneksi, "SELECT * FROM kategori");
						
						
						while($row=mysqli_fetch_assoc($query)){
							if($kategori_id == $row['kategori_id']){
							$string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
							}else{
							$string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
							}	
						}
				$string .="</ul>";
			$string .="</div>";
			
			return $string;
	}
	
	function admin_only($module, $level){
		if($level != "superadmin"){
		$admin_pages = array("kategori","barang","kota","user","banner");
			if(in_array($module, $admin_pages)){
				header("location: ".BASE_URL);
			}
		}
	}