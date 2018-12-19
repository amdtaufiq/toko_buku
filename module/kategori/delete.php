<?php

	$kategori_id = isset ($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	if ($kategori_id) {
		$queryKategori = mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
	}
	header("location: ".BASE_URL."index.php?page=my_profile&module=kategori&action=list");