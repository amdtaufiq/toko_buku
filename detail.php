<!-- new modify 4 -->
<div id="kiri">

	<?php
	
		echo kategori($kategori_id);
	
	?>
			
</div>

<div id="kanan">
	<?php
	
		$buku_id = $_GET['buku_id'];
		
		$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id='$buku_id' AND status='on'");
		$row = mysqli_fetch_assoc($query);
		
		echo "<div id='detail-barang'>
				<h2>$row[nama_buku]</h2>
				<div id='frame-gambar'>
					<img src='".BASE_URL."images/barang/$row[gambar]' />
				</div>
				<div id='frame-harga'>
					<span>".rupiah($row['harga'])."</span>
					<a href='".BASE_URL."tambah_keranjang.php?buku_id=$row[buku_id]'>+ add to cart</a>
				</div>
				<div id='keterangan'>
					<b>keterangan</b> $row[spesifikasi]
				</div>
			</div>";
	
	?>
</div>
	