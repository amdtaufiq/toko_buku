<?php
    // $user_id = $_SESSION["user_id"];
    // $queryProfile = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$user_id");
    // $row = mysqli_fetch_assoc($queryProfile);
    // $_SESSION['dataUser']=$row;
    

    //menampilkan data
    echo $row['nama'];
    echo "<br>";
    echo $row['email'];
    echo "<br>";
    echo $row['alamat'];
    echo "<br>";
    echo $row['phone'];
    echo "<br>";
    echo "<img src='images/barang/$row[gambar]' />";

?>

<div id="frame-tambah">
	<a href="<?php echo BASE_URL. "index.php?page=my_profile&module=profile&action=form"; ?>" class="tombol-action">EDIT </a>
</div>