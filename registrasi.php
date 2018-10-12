<body bgcolor="pink" align="center">
	<h1>FORM REGISTRASI MAHASISWA TELKOM UNIVERSITY</h1>
	<hr>
<form method="POST">
<table>
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>NAMA :</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>KELAS:</td>
		<td><input type="radio" name="kelas" value="d3mi4101">D3MI-41-01<br>
  		<input type="radio" name="kelas" value="d3mi4102">D3MI-41-02<br>
  		<input type="radio" name="kelas" value="d3mi4103">D3MI-41-03<br>
  		<input type="radio" name="kelas" value="d3mi4104">D3MI-41-04<br>
  		</td>
	</tr>
	<tr>
		<td>Jenis Kelamin :</td>
		<td><input type="radio" name="jk" value="laki-laki" checked>Laki-laki<br></td>
  		<td><input type="radio" name="jk" value="perempuan">Perempuan<br></td>
	</tr>
		<tr>
		<td>Hobi : <br/>
			<input type="checkbox" name="hobi" value="berenang">Berenang<br/>
			<input type="checkbox" name="hobi" value="hiking">Hiking<br/>
			<input type="checkbox" name="hobi" value="diving">Diving<br/>
			<input type="checkbox" name="hobi" value="mancing">Mancing<br/>
			<input type="checkbox" name="hobi" value="nonton film">Nonton Film<br/><br/>
		</td>
	</tr>
	<tr>
		<td>Fakultas: <select name="fakultas" required>
 			<option value="fit">FAKULTAS ILMU TERAPAN</option>
  			<option value="fik">FAKULTAS INDUSTRI KREATIF</option>
  			<option value="feb">FAKULTAS EKONOMI BISNIS</option>
  			<option value="fkb">FAKULTAS KOMUNIKASI BISNIS</option>
		</td>
	</tr>
	<tr>
		<td>Alamat : <textarea name="alamat"></textarea>
		</td>
	</tr>
	<tr>
    <td>Password :</td>
    <td><input type="password" name="password"></td>
   </tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="DAFTAR"></td>
	</tr>
</table>
</form>
</body>

<?php 
	if(isset($_POST['submit'])){
		include 'koneksidb.php';
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$jk = $_POST['jk'];
		$hobi = $_POST['hobi'];
		$fakultas = $_POST['fakultas'];
		$alamat = $_POST['alamat'];
		$status=true;

		if (!is_int($nim) and (strlen($nim)<10) or (strlen($nim)>10)) {
			echo("NIM harus angka dan 10 karakter");
			$status=false;
		}

		if (!preg_match('/^[a-z A-Z]$/i', $nama) and strlen($nama)>35) {
			echo("Nama harus huruf dengan maksimal 35 karakter");
			$status=false;
		}

		if($status){
			$sql=mysqli_query($koneksi,"INSERT INTO mahasiswa
				VALUES ($nim, '$nama', '$kelas', '$jk', '$hobi', '$fakultas', '$alamat')");
		}
	}
 ?>