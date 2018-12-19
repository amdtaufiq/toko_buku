<!-- javascriot untuk search -->


<div id="kiri">
	<!-- search menu -->
	<input type="name" placeholder="search" size="31" onkeyup="showResult(this.value)" >
	<div id="livesearch"> </div>
	<?php
	
		echo kategori($kategori_id);
	
	?>
	
</div>

<div id="kanan">
	<div id="barang">
		<ul>
		<?php
			if($kategori_id){
				
				$kategori_id = "AND kategori_id='$kategori_id'";
			
			}	

			$query = mysqli_query($koneksi, "SELECT *FROM buku WHERE status='on' $kategori_id ORDER BY rand() DESC LIMIT 15");
			
			$no=1;
			while($row=mysqli_fetch_assoc($query)){
				
				$style=false;
				if($no == 3){
					$style="style='margin-right:0px'";
					$no=0;
				}
				
				echo "<li $style>
						<p class='price'>".rupiah($row['harga'])."</p>
						<a href='".BASE_URL."index.php?page=detail&buku_id=$row[buku_id]'>
							<img src='".BASE_URL."images/barang/$row[gambar]' />
						</a>
						<div class='keterangan-gambar'>
							<p><a href='".BASE_URL."index.php?page=detail&buku_id=$row[buku_id]'>$row[nama_buku]</a></p>
							<span>stok : $row[stok]</span>
						</div>
						<div class='button-add-cart'>
							<a href='".BASE_URL."tambah_keranjang.php?buku_id=$row[buku_id]'>+ add to cart</a>
						</div>";	
				$no++;
			}
		?>
		</ul>
	</div>
</div>
	