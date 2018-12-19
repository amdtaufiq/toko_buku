<?php

	if($user_id){
		$module = isset($_GET['module']) ? $_GET['module'] : false;
		$action = isset($_GET['action']) ? $_GET['action'] : false;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
	}else{
		header("location:".BASE_URL."index.php?page=login");
	}

	admin_only($module, $level);
?>




<div id="bg-page-profile">

	<div id="menu-profile">
	
		<ul>
			<li>
				<input type="name" placeholder="search" size="31" onkeyup="showResult(this.value)" >
				<div id="livesearch"> </div>
			</li>
			<li>
				<a <?php if ($module == "profile"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=profile&action=list"; ?>">Profile</a>
			</li>
			<?php
				if ($level =="superadmin"){
			?>
			<li>
				<a <?php if ($module == "kategori"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a>
			</li>
			<li>
				<a <?php if ($module == "buku"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=buku&action=list"; ?>">Buku</a>
			</li>
			<li>
				<a <?php if ($module == "user"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=user&action=list"; ?>">User</a>
			</li>
			<?php
			}
				if ($level =="admin"){
			?>
			<li>
				<a <?php if ($module == "kategori"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a>
			</li>
			<li>
				<a <?php if ($module == "buku"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=buku&action=list"; ?>">Buku</a>
			</li>
			<?php
				}
			?>
			<li>
				<a <?php if ($module == "pesanan"){echo "class='active'";} ?> href="<?php echo BASE_URL. "index.php?page=my_profile&module=pesanan&action=list"; ?>">Pesanan</a>
			</li>
		</ul>
	
	</div>
	
	<div id="profile-content">
		<?php
		
			$file= "module/$module/$action.php";
			if(file_exists($file)){
				include_once($file);
			}else{
				echo "<h3>maaf, halaman tersebut tidak ditemukan</h3>";
			}
			
		?>
	</div>
	
</div>