<?php

	if($totalBarang == 0){
		echo "<h3>saat ini belum ada yang anda pilih</h3>";
	}else{
	
		$no=1;
		
		echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='tengah'>No</th>
					<th class='kiri'>Image</th>
					<th class='kiri'>Nama Buku</th>
					<th class='tengah'>Qty</th>
					<th class='kanan'>Harga Satuan</th>
					<th class='kanan'>Total</th>
				</tr>";

		$subtotal = 0;
		foreach($keranjang AS $key => $value){
			$buku_id = $key;
			
			$nama_buku = $value["nama_buku"];
			$quantity = $value["quantity"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];
			
			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;
			
			echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='".BASE_URL."images/barang/$gambar' height='100px' /></td>
					<td class='kiri'>$nama_buku</td>
					<td class='kiri'><input type='text' name='$buku_id' value='$quantity' class='update-quantity' /></td>
					<td class='kanan'>".rupiah($harga)."</td>
					<td class='kanan hapus_item'>".rupiah($total)."<a href='".BASE_URL."hapus_item.php?buku_id=$buku_id'>X</a></td>
			</tr>";
			$no++;
		}
		
		echo "<tr>
				<td colspan='5' class='kanan'><b>sub Total</b></td>
				<td class='kanan'><b>".rupiah($subtotal)."</b></td>";
		
		echo "</table>";
		
		echo "<div id='frame-button-keranjang'>
				<a id='lanjut-belanja' href='".BASE_URL."index.php'> << LANJUTKAN BELANJA</a>
				<a id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesan'> LANJUTKAN PEMESANAN >></a>
			  </div>";
	}

?>

<script>
	$(".update-quantity").on("input", function(e){
		var buku_id = $(this).attr("name");
		var value = $(this).val();

	//	console.log(buku_id+"-"+value);
		
		$. ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "buku_id="+buku_id+"&value="+value
		})
		.done(function(data){
			location.reload();
		});
	});
	
</script>