<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	// cek kondisi apakah ada laman yang akan diload jika ada akan di get 
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	// pengecekan nilai yang dibawa oleh session dari laman login
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION["user_id"];
	    $queryProfile = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$user_id");
	    $row = mysqli_fetch_assoc($queryProfile);
		$_SESSION['dataUser']=$row;
	}

	//menampung nilai jika keranjang terisi
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	//menjumlahkan total harga yang ada yang dikeranjang
	$totalBarang = count($keranjang);
	
?>

<!DOCTYPE html>
<html>

	<head>
		<title>BOOKSTORE</title>
	
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
	
		<script src="<?php echo BASE_URL."js/jquery-3.2.1.min.js"; ?>"></script>
		<script>
			function showResult(str) {
			  if (str.length==0) { 
			    document.getElementById("livesearch").innerHTML="";
			    document.getElementById("livesearch").style.border="0px";
			    return;
			  }
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else {  // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			    	document.getElementById("barang").innerHTML="";
			      document.getElementById("barang").innerHTML=this.responseText;
			      document.getElementById("barang").style.border="1px solid #A5ACB2";
			    }
			  }
			  xmlhttp.open("GET","search.php?q="+str,true);
			  xmlhttp.send();
			}
		</script>

	</head>
	
	<body>
	
		<div id="container">
			<div id="header">
				
				
				<div id="menu">
					<div id="user">
						<a href="<?php echo BASE_URL. "index.php"; ?>">HOME</a>
						<?php
							if(isset($user_id)){
								echo "<a href='".BASE_URL. "index.php?page=my_profile&module=pesanan&action=list'><b>$row[nama]</b></a>
													   <a href='".BASE_URL."logout.php'>Logout</a>";
							}else{
								echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
									  <a href='".BASE_URL."index.php?page=register'>Register</a>";
							}
						?>
						<a href="<?php echo BASE_URL."index.php?page=about"; ?>">About</a>
						<a href="<?php echo BASE_URL."index.php?page=pesan"; ?>">Message</a>
					</div>
					
					<a href="<?php echo BASE_URL. "index.php?page=keranjang"; ?>" id="button-keranjang">
						<img src="<?php echo BASE_URL. "images/cart.png"; ?>" />
						<?php
							if($totalBarang != 0){
								echo "<span class='total-barang'>$totalBarang</span>";
							}
						?>
					</a>	
				</div>
			</div>
			
			<div id="content">
				<?php
					$filename = "$page.php";
					
					if(file_exists($filename)){
						include_once($filename);
					}else{
						include_once("main.php");
					}
				?>
			</div>
			
			
			<div id="footer">
			<p>Copy Right 2018 by Taufiq</p>
			</div>
			
		</div>
		
	</body>
	
</html>