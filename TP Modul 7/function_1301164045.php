<!DOCTYPE html>
<html>
<head>
	<title>TPMod7</title>
</head>
<body>
	<?php
		$servername_1301164045 = "localhost";
		$username_1301164045 = "root";
		$password_1301164045 = "";
		$dbname_1301164045 = "akademik";

		//Create Connection
		$conn_1301164045 = new mysqli($servername_1301164045, $username_1301164045, $password_1301164045, $dbname_1301164045);

		//Check Connection
		if($conn_1301164045->connect_error){
			die("Koneksi Gagal: " . $conn_1301164045->connect_error);
		}
	?>

	<h1>Cari mahasiswa berdasarkan nim</h1>
	<form action='function_1301164045.php' method="post">
		<tr>
				<td>NIM:</td>
				<td><input type="text" name="nimcari"></td>
		</tr>
		<input type="submit" name="cari" value="Cari">
		<?php
			if(isset($_POST['cari'])){
				$nim_1301164045 = $_POST['nimcari'];
				view_1301164045($conn_1301164045, $nim_1301164045);
			}
		?>
	</form>

	<h1>Tambah mahasiswa</h1>
	<form action="function_1301164045.php" method="post">
		<table>
			<tr>
				<td>Nama:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>NIM:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<?php
				if(isset($_POST['submit'])){
					if(empty($_POST['nama']) || empty($_POST['nim'])){
						echo "Ada data yang belum di input";
					}else{
						$mname_1301164045 = $_POST['nama'];
						$mnim_1301164045 = $_POST['nim'];
						insert_1301164045($conn_1301164045, $mname_1301164045, $mnim_1301164045);
					}
					
				}

				if(isset($_GET['nim'])){
					$nim_1301164045 = $_GET['nim'];
					update_1301164045($conn_1301164045, $nim_1301164045);
				}
				
			?>
		</table>
		<input type="submit" name="submit">
	</form>

	<table border="1">
		<tr>
			<td>NIM</td>
			<td>Nama</td>
		</tr>
		<tr>
			<?php index_1301164045($conn_1301164045); ?>
		</tr>
	</table>

		
</body>
</html>

<?php
	function index_1301164045($conn_1301164045){
		$sql_1301164045 = "SELECT * FROM mahasiswa";
		$res_1301164045 = $conn_1301164045->query($sql_1301164045);

		if($res_1301164045->num_rows > 0){
			while($row_1301164045 = $res_1301164045->fetch_assoc()){
				echo '<tr><td>' . $row_1301164045['nama']. '</td>'. '<td>'. $row_1301164045['nim']. '</td>'
				. '<td><a href="function_1301164045.php?nim='. $row_1301164045['nim']. '">hapus</a></td></tr>';
			}
		}
	}

	function insert_1301164045($conn_1301164045, $nama_1301164045, $nim_1301164045){
		$sql_1301164045 = "INSERT INTO mahasiswa (nim, nama) VALUES". " ('". $nim_1301164045. "', '". $nama_1301164045. "')";

		if($conn_1301164045->query($sql_1301164045) === TRUE){
			echo "Berhasil disimpan";
		} else {
			echo "Error: ". $sql_1301164045. "<br>". $conn_1301164045->error;
		}

		unset($nama_1301164045);
		unset($nim_1301164045);
	}

	function view_1301164045($conn_1301164045, $nim_1301164045){
		$sql_1301164045 = "SELECT * FROM mahasiswa WHERE nim = '$nim_1301164045'";
		$res_1301164045 = $conn_1301164045->query($sql_1301164045);

		if($res_1301164045->num_rows > 0){
			while($row_1301164045 = $res_1301164045->fetch_assoc()){
				echo '<table border="1"><tr><td>' . $row_1301164045['nama']. '</td>'. '<td>'. $row_1301164045['nim']. '</td></tr></table>';
			}
		} else {
			echo '</br>' . $nim_1301164045 . ' tidak ditemukan';
		}
	}

	function update_1301164045($conn_1301164045, $nim_1301164045){
		$sql_1301164045 = "DELETE FROM mahasiswa WHERE nim = '$nim_1301164045'";

		if($conn_1301164045->query($sql_1301164045) === TRUE){
			echo "Berhasil dihapus";
		} else {
			echo "Gagal menghapus: " . $conn_1301164045->error;
		}
	}
?>