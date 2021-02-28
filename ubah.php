<?php 
session_start();

if( !isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'function.php';

//ambil data di url
$kdmov = $_GET["kdmov"];

//query data film berdasarkan kmov
$mov = query("SELECT *FROM film WHERE kdmov= $kdmov")[0];


if( isset ($_POST ["submit"])	) {

	//cek keberhasilan
	if( ubah($_POST) > 0){
		echo "
			<script>
				alert('Data berhasil diubah!');
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
	<h1>Edit Data Film</h1>

	<form action="" method="post">
		<ul>
			<input type="hidden" name="kdmov"  value="<?php echo $mov["kdmov"]; ?>">
			<li>
				<label for="judul">Judul :</label>
				<input type="text" name="judul" id="judul" required value="<?php echo $mov["judul"]; ?>">
			</li>
			<li>
				<label for="series">Series :</label>
				<input type="text" name="series" id="series" value="<?php echo $mov["series"]; ?>" >
			</li>
			<li>
				<label for="kdgenre">Kode Genre :</label>
				<input type="text" name="kdgenre" id="kdgenre" value="<?php echo $mov["kdgenre"]; ?>">
			</li>
			<li>
				<label for="tahun">Tahun :</label>
				<input type="text" name="tahun" id="tahun" value="<?php echo $mov["tahun"]; ?>">
			</li>
			<li>
				<label for="negara">Negara :</label>
				<input type="text" name="negara" id="negara" value="<?php echo $mov["negara"]; ?>">
			</li>
			<li>
				<label for="director">Director :</label>
				<input type="text" name="director" id="director" value="<?php echo $mov["director"]; ?>">
			</li>
			<li>
				<label for="rating">Rating :</label>
				<input type="text" name="rating" id="rating" value="<?php echo $mov["rating"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>	
		
	</form>
</body>
</html>