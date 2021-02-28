<?php  
session_start();

if( !isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'function.php';

$kdmov = $_GET["kdmov"];

if( hapus($kdmov) > 0){
		echo "
			<script>
				alert('Data berhasil dihapus!');
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
?>