<?php

	include_once("function/helper.php");

	$kategori_id = $_GET['kategori_id'];


	if ($kategori_id) {
		$queryKategori = mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
	}
	header("location:index.php?page=my_profile&module=kategori&action=list");