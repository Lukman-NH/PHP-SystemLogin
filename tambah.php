<?php 
session_start();

if( !isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'function.php';

if( isset ($_POST ["submit"])	) {

	//cek keberhasilan
	if( tambah($_POST) > 0){
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href ='index.php';
			</script>
			";
	} else
		echo"
			<script>
				alert('Gagal');
				document.location.href ='index.php';
			</script>
			";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	
	<style type="text/css">
		label {
			display: block;
		}
	</style>
</head>
<body>
	<h1>Tambah Data Film</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="kdmov">Kode Film :</label>
				<input type="text" name="kdmov" id="kdmov" required>
			</li>
			<li>
				<label for="judul">Judul :</label>
				<input type="text" name="judul" id="judul" required>
			</li>
			<li>
				<label for="series">Series :</label>
				<input type="text" name="series" id="series">
			</li>
			<li>
				<label for="kdgenre">Kode Genre :</label>
				<input type="text" name="kdgenre" id="kdgenre">
			</li>
			<li>
				<label for="tahun">Tahun :</label>
				<input type="text" name="tahun" id="tahun">
			</li>
			<li>
				<label for="negara">Negara :</label>
				<input type="text" name="negara" id="negara">
			</li>
			<li>
				<label for="director">Director :</label>
				<input type="text" name="director" id="director">
			</li>
			<li>
				<label for="rating">Rating :</label>
				<input type="text" name="rating" id="rating">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>	
		
	</form>
</body>
</html>