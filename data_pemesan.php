<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;

		header("location:".BASE_URL."index.php?page=login");
		exit;
	}
?>

<div id="frame-data-pengirim">
	
	<h3 class="label-data-pengirim">alamat pengirim buku</h3>
	
	<div id="frame-form-pengiriman">
		
		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
		
			<div class='element-form'>
				<label>nama penerima</label>
				<span><input type="text" name="nama_penerima" /></span> 
			</div>
			
			<div class='element-form'>
				<label>nomor telepon</label>
				<span><input type="text" name="nomor_telepon" /></span> 
			</div>
			
			<div class='element-form'>
				<label>alamat pengirim</label>
				<span><textarea name="alamat"></textarea></span> 
			</div>
			
			<div class='element-form'>
				<span><input type="submit" value="submit" /></span> 

			</div>
		</form>
		
	</div>
	
</div>

<div id="frame-data-detail">
	
	<h3 class="label-data-pengirim">Detail Order</h3>
	
	<div id="frame-detail-order">
		
		<table class="table-list">
			<tr>
				<th class='kiri'>nama buku</th>
				<th class='tengah'>Qty</th>
				<th class='kanan'>Total</th>
			<tr>
			
			<?php
				$subtotal = 0;
				foreach($keranjang AS $key => $value){
					$buku_id =$key;
					
					$nama_buku = $value['nama_buku'];
					$harga = $value['harga'];
					$quantity = $value['quantity'];
					
					$total = $quantity * $harga;
					$subtotal = $subtotal + $total ;

					
					echo "<tr>
							<td class='kiri'>$nama_buku</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						  </tr>";
				}

				$_SESSION['subtotal'] = $subtotal;
				//kalo ada kode diskon
				//$subtotal = $subtotal - 0; //kalo gak ada kode diskon
				echo "<tr>
							<td colspan='2' class='kanan'><b>sub Total</b></td>
							<td class='kanan'><strong><span id='total'>".$subtotal."</span></strong>
						</td>";	  
			?>
			
		</table>
		
	</div>
	
</div>

<!-- <script type="text/javascript">
		
	var cek = document.getElementById('cek')
	cek.addEventListener('click', cekDiskon)

	function cekDiskon(){
		var input = document.getElementById('kode').value
		
		var xhr = new XMLHttpRequest()
		xhr.open("GET","cek_diskon.php?kode="+input)
		xhr.onload = function(){
			var jmlDiskon = this.responseText
			console.log(this.responseText);
			if (jmlDiskon != "-1" && jmlDiskon != "0") {
				jmlDiskon = parseFloat(this.responseText)
				var subtotal = "<?php echo $subtotal; ?>"
				subtotal = parseFloat(subtotal);

				var total = subtotal - (subtotal * jmlDiskon);

				// SET SESSION
				setTotal(total);

				var totalText = document.getElementById('total').innerHTML = total;
			} else if (this.responseText == "0") {
				alert("Maaf, kode diskon sudah tidak berlaku");
			}	else  {
				alert("Maaf, kode diskon tidak ada");
			}	
		}

		xhr.send()

	}

	function setTotal(total) {

		var xhr2 = new XMLHttpRequest()
		xhr2.open("GET","set_total.php?total=" + total);
		xhr2.onload = function(){
				console.log(this.responseText);				
		}

		xhr2.send()

	}

</script> -->