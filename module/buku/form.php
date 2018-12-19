<?php

	$buku_id = isset ($_GET['buku_id']) ? $_GET['buku_id'] : false;
	
	$nama_buku = "";
	$kategori_id = "";
	$spesifikasi = "";
	$gambar = "";
	$stok = "";
	$harga = "";
	// $link = "";
	$status = "";
	$keterangan_gambar = "";
	$button = "Add";
	
	if($buku_id) {
		$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id='$buku_id'");
		$row = mysqli_fetch_assoc($query);
		
		$nama_buku = $row['nama_buku'];
		$kategori_id = $row['kategori_id'];
		$spesifikasi = $row['spesifikasi'];
		$gambar = $row['gambar'];
		$harga = $row['harga'];
		$stok = $row['stok'];
		// $link = $row['link'];
		$status = $row['status'];
		$button = "update";
		
		$keterangan_gambar = "(klik pilih gambar jika ingin mengganti gambar disamping)";
		$gambar= "<img src='".BASE_URL."images/buku/$gambar' style='width: 200px;vertical-align: middle;'/>";
	}

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL. "module/buku/action.php?buku_id=$buku_id"; ?>" method="POST" enctype="multipart/form-data">


	<div class="element-form">
			<label>kategori</label>
			<span>
			
				<select name="kategori_id">
					<?php
						$query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
						while($row=mysqli_fetch_assoc($query)){
							if($kategori_id == $row['kategori_id']){
								echo "<option value='$row[kategori_id]' selected 'true'>$row[kategori]</option>";
							}
							echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
						}
					?>
				</select>
			
			</span>
	</div>
	
	<div class="element-form">
			<label>Nama buku</label>
			<span><input type="text" name="nama_buku" value="<?php echo $nama_buku; ?>" /></span>
	</div>
	
	<div style="margin-bottom:20px";>
			<label style="font-weight:bold">Spesifikasi</label>
			<span><textarea name="spesifikasi" id="editor"><?php echo $spesifikasi; ?> </textarea></span>
	</div>
	
	<div class="element-form">
			<label>Stok</label>
			<span><input type="text" name="stok" value="<?php echo $stok; ?>" /></span>
	</div>
	
	<div class="element-form">
			<label>Harga</label>
			<span><input type="text" name="harga" value="<?php echo $harga; ?>" /></span>
	</div>

	<!-- <div class="element-form">
			<label>Link</label>
			<span><input type="text" name="link" value="<?php echo $link; ?>" /></span>
	</div> -->
	
	<div class="element-form">
			<label>Gambar Produk<?php echo $keterangan_gambar;?></label>
			<span>
			<input type="file" name="file" /> <?php echo $gambar; ?>
			</span>
	</div>
	
	
	<div class="element-form">
			<label>status</label>
			<span>
				<input type="radio" name="status" value="on" <?php if($status == "on") {echo "checked='true'";} ?> /> On
				<input type="radio" name="status" value="off" <?php if($status == "off") {echo "checked='true'";} ?> /> Off
			</span>
	</div>	
	
	<div class="element-form">
			<span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
	</div>

</form>

<script>
	CKEDITOR.replace("editor");
</script>