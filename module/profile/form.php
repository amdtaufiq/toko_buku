<?php

	$user_id = isset ($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	
	$nama = "";
	$email = "";
	$phone = "";
    $alamat = "";
    $password= "";
    $gambar= "";
	$button = "Add";
	
	if($user_id) {
		$queryProfile = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
		$row = mysqli_fetch_assoc($queryProfile);
		
		$nama = $row['nama'];
		$email = $row['email'];
		$phone = $row['phone'];
		$alamat = $row['alamat'];
		$password = $row['password'];
		$gambar = $row['gambar'];
		$button = "update";
	}

?>

<form action="<?php echo BASE_URL. "module/profile/action.php?user_id=$user_id"; ?>" method="POST">


    <div class="element-form">
    <label>nama</label>
    <span><input type="text" name="nama" value="<?php echo $nama; ?>"/></span>
    </div>

	<div class="element-form">
			<label>email</label>
			<span><input type="text" name="email" value="<?php echo $email; ?>"/></span>
    </div>
    
	<div class="element-form">
			<label>phone</label>
			<span><input type="text" name="phone" value="<?php echo $phone; ?>"/></span>
    </div>
    
	<div class="element-form">
			<label>alamat</label>
			<span><input type="text" name="alamat" value="<?php echo $alamat; ?>"/></span>
    </div>
    
    <div class="element-form">
			<label>password</label>
			<span><input type="password" name="password" value="<?php echo $password; ?>"/></span>
    </div>
    
    <div class="element-form">
			<label>gambar</label>
			<span><input type="file" name="gambar" value="<?php echo $gambar; ?>"/></span>
	</div>
	
	<!-- <div class="element-form">
			<label>status</label>
			<span>
				<input type="radio" name="status" value="on" <?php if($status == "on") {echo "checked='true'";} ?> /> On
				<input type="radio" name="status" value="off" <?php if($status == "off") {echo "checked='true'";} ?> /> Off
			</span>
	</div>	 -->
	
	<div class="element-form">
			<span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
	</div>

</form>