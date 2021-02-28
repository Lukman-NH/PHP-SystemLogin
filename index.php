<?php 
session_start();

if( !isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'function.php';

$film = query("SELECT * FROM film ORDER BY judul ASC");

//tombol cari ditekan
if (isset($_POST["cari"])) {
	$film = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Daftar Film</h1>

<a href="tambah.php">Tambah data Film</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
</form>
<br>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Kode Film</th>
			<th>Judul</th>
			<th>Series</th>
			<th>Kode Genre</th>
			<th>Tahun</th>
			<th>Negara</th>
			<th>Director</th>
			<th>Rating</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach( $film as $row) :?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="ubah.php?kdmov=<?= $row["kdmov"]; ?>">Ubah</a> |
				<a href="hapus.php?kdmov=<?= $row["kdmov"]; ?>" onclick="return confirm('Anda yakin untuk menghapus?');">Hapus</a>
			</td>
			<td><?php echo $row["kdmov"]; ?></td>
			<td><?php echo $row["judul"]; ?></td>
			<td><?php echo $row["series"]; ?></td>
			<td><?php echo $row["kdgenre"]; ?></td>
			<td><?php echo $row["tahun"]; ?></td>
			<td><?php echo $row["negara"]; ?></td>
			<td><?php echo $row["director"]; ?></td>
			<td><?php echo $row["rating"]; ?></td>

		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</body>
</html>