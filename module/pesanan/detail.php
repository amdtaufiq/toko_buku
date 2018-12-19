<?php

	$pesanan_id= $_GET["pesanan_id"];
	
	$query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.pesanan_id='$pesanan_id'");
	
	$row = mysqli_fetch_assoc($query);
	
	$tanggal_pemesanan = $row['tanggal_pemesanan'];
	$nama_penerima = $row['nama_penerima'];
	$nomor_telepon = $row['nomor_telepon'];
	$alamat = $row['alamat'];
	$nama = $row['nama'];

?>

<div id="frame-faktur">

	<h3><center>Detail Pesanan</center></h3>
	
	<hr/>
	
	<table>
	
		<tr>
			<td>Nomor Faktur</td>
			<td>:</td>
			<td><?php echo $pesanan_id; ?></td>
		</tr>
		<tr>
			<td>Nama Pemesan</td>
			<td>:</td>
			<td><?php echo $nama; ?></td>
		</tr>
		<tr>
			<td>Nama Penerima</td>
			<td>:</td>
			<td><?php echo $nama_penerima; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $alamat; ?></td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td><?php echo $nomor_telepon; ?></td>
		</tr>
		<tr>
			<td>Tanggal Pemesanan</td>
			<td>:</td>
			<td><?php echo $tanggal_pemesanan; ?></td>
		</tr>
	
	</table>

</div>

<table class="table-list">

	<tr class="baris-title">
		<th class="no">No</th>
		<th class="kiri">Nama buku</th>
		<th class="tengah">Qty</th>
		<th class="kanan">Harga Satuan</th>
		<th class="kanan">Total</th>
	</tr>
	
	<?php
		
		$queryDetail = mysqli_query($koneksi, "SELECT * FROM pesanan_detail JOIN buku ON pesanan_detail.buku_id=buku.buku_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
		
		$no = 1;


		$subTotal = (int) $_SESSION["subtotal"];
		if (isset($_SESSION['jmlTotal'])) {
			$subTotal = $_SESSION['jmlTotal'];
			unset($_SESSION["jmlTotal"]);
		}



		// var_dump($subTotal);
		// exit();
		// var_dump($_SESSION);
		// exit();

		while($rowDetail=mysqli_fetch_assoc($queryDetail)){
			
			$total = $rowDetail["harga"] * $rowDetail["quantity"];
			
			echo "
					<tr>
						<td class='no'>$no</td>
						<td class='kiri'>$rowDetail[nama_buku]</td>
						<td class='tengah'>$rowDetail[quantity]</td>
						<td class='kanan'>".rupiah($rowDetail["harga"])."</td>
						<td class='kanan'>".rupiah($subTotal)."</td>
					</tr>
			";
			
			$no++;
			
		}
		$tarif = 0;
	
		$subTotal = $subTotal + $tarif;		
	?>
	<tr>
		<td class="kanan" colspan="4">Biaya Pengiriman</td>
		<td class="kanan"><?php echo rupiah($tarif); ?></td>
	</tr>

	<tr>
		<td class="kanan" colspan="4">Sub Total</td>
		<td class="kanan"><?php echo rupiah($subTotal); ?></td>
	</tr>

</table>

<div id="frame-keterangan-pembayaran">

	<p> silahkan melakukan pembayaran ke BANK ABD<br/>
		namor account : 0000-9999-8888 (A/N taufiq).<br/>
		setelah melakukan pembayaran silahkan konfirmasi pembayaran
		<a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>">Disini</a></p>
</div>