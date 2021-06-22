<?php include('config.php'); ?>

		<center><font size="6">Tambah Data Mahasiswa</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Nim			= $_POST['Nim'];
			$Nama_Mhs			= $_POST['Nama_Mhs'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
			$Jurusan = $_POST['Jurusan'];
			$Program_Studi		= $_POST['Program_Studi'];

			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nim='$Nim'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(Nim, Nama_Mhs, Jenis_Kelamin, Jurusan, Program_Studi) VALUES('$Nim', '$Nama_Mhs', '$Jenis_Kelamin', '$Jurusan', '$Program_Studi')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_mhs" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIM</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Nim" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Mhs" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Jurusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jurusan" class="form-control" required>
						<option value="">Pilih Jurusan</option>
						<option value="Teknik Sipil">Teknik Sipil</option>
						<option value="Teknik Mesin">Teknik Mesin</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Akuntansi">Akuntansi</option>
						<option value="Administrasi Bisnis">Administrasi Bisnis</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="D3 - Konstruksi Gedung" <?php if($data['matkul'] == 'D3 - Konstruksi Gedung'){ echo 'selected'; } ?>>D3 - Konstruksi Gedung</option>
						<option value="D3 - Konstruksi Sipil" <?php if($data['matkul'] == 'D3 - Konstruksi Sipil'){ echo 'selected'; } ?>>D3 - Konstruksi Sipil</option>
						<option value="S.Tr - Peraancangan Jalan dan Jembatan" <?php if($data['matkul'] == 'S.Tr - Peraancangan Jalan dan Jembatan'){ echo 'selected'; } ?>>S.Tr - Peraancangan Jalan dan Jembatan</option>
						<option value="S.Tr - Teknik Perawatan dan Perbaikan Gedung" <?php if($data['matkul'] == 'S.Tr - Teknik Perawatan dan Perbaikan Gedung'){ echo 'selected'; } ?>>S.Tr - Teknik Perawatan dan Perbaikan Gedung</option>
						<option value="S.Tr. - Teknik Mesin Produksi dan Perawatan" <?php if($data['matkul'] == 'S.Tr. - Teknik Mesin Produksi dan Perawatan'){ echo 'selected'; } ?>>S.Tr. - Teknik Mesin Produksi dan Perawatan</option>
						<option value="D3 - Teknik Mesin" <?php if($data['matkul'] == 'D3 - Teknik Mesin'){ echo 'selected'; } ?>>D3 - Teknik Mesin</option>
						<option value="S.Tr. - Teknik Mesin Produksi dan Perawatan" <?php if($data['matkul'] == 'S.Tr. - Teknik Mesin Produksi dan Perawatan'){ echo 'selected'; } ?>>S.Tr. - Teknik Mesin Produksi dan Perawatan</option>
						<option value="S.Tr. - Teknologi Rekayasa Pembangkit  Energi" <?php if($data['matkul'] == 'S.Tr. - Teknologi Rekayasa Pembangkit  Energi'){ echo 'selected'; } ?>>S.Tr. - Teknologi Rekayasa Pembangkit  Energi</option>
						<option value="D3 - Teknik Konversi Energi" <?php if($data['matkul'] == 'D3 - Teknik Konversi Energi'){ echo 'selected'; } ?>>D3 - Teknik Konversi Energi</option>
						<option value="S.Tr. - Teknik Mesin Produksi dan Perawatan" <?php if($data['matkul'] == 'S.Tr. - Teknik Mesin Produksi dan Perawatan'){ echo 'selected'; } ?>>S.Tr. - Teknik Mesin Produksi dan Perawatan</option>
						<option value="S.Tr. - Teknik Telekomunikasi" <?php if($data['matkul'] == 'S.Tr. - Teknik Telekomunikasi'){ echo 'selected'; } ?>>S.Tr. - Teknik Telekomunikasi</option>
						<option value="D3 - Teknik Listrik" <?php if($data['matkul'] == 'D3 - Teknik Listrik'){ echo 'selected'; } ?>>D3 - Teknik Listrik</option>
						<option value="D3 - Teknik Informatika" <?php if($data['matkul'] == 'D3 - Teknik Informatika'){ echo 'selected'; } ?>>D3 - Teknik Informatika</option>
						<option value="D3 - Teknik Elektronika" <?php if($data['matkul'] == 'D3 - Teknik Elektronika'){ echo 'selected'; } ?>>D3 - Teknik Elektronika</option>
						<option value="MST - Teknik Telekomunikasi" <?php if($data['matkul'] == 'MST - Teknik Telekomunikasi'){ echo 'selected'; } ?>>MST - Teknik Telekomunikasi</option>
						<option value="D3 - Teknik Telekomunikasi" <?php if($data['matkul'] == 'D3 - Teknik Telekomunikas'){ echo 'selected'; } ?>>D3 - Teknik Telekomunikas</option>
						<option value="D3 - Teknik Listrik" <?php if($data['matkul'] == 'D3 - Teknik Listrik'){ echo 'selected'; } ?>>D3 - Teknik Listrik</option>
						<option value="S.Tr. - Komputerisasi Akuntansi" <?php if($data['matkul'] == 'D3 - Teknik Listrik'){ echo 'selected'; } ?>>D3 - Teknik Listrik</option>
						<option value="D3 - Akuntansi" <?php if($data['matkul'] == 'D3 - Akuntansi'){ echo 'selected'; } ?>>D3 - Akuntansi</option>
						<option value="D3 - Keuangan dan Perbankan" <?php if($data['matkul'] == 'D3 - Keuangan dan Perbankan'){ echo 'selected'; } ?>>D3 - Keuangan dan Perbankan</option>
						<option value="S.Tr. - Analis Keuangan" <?php if($data['matkul'] == 'S.Tr. - Analis Keuangan'){ echo 'selected'; } ?>>S.Tr. - Analis Keuangan</option>
						<option value="D3 - Keuangan dan Perbankan" <?php if($data['matkul'] == 'D3 - Keuangan dan Perbankan'){ echo 'selected'; } ?>>D3 - Keuangan dan Perbankan</option>
						<option value="S.Tr. - Perbankan Syariah" <?php if($data['matkul'] == 'S.Tr. - Perbankan Syariah'){ echo 'selected'; } ?>>S.Tr. - Perbankan Syariah</option>
						<option value="S.Tr. - Akuntansi Manajerial" <?php if($data['matkul'] == 'S.Tr. - Akuntansi Manajerial'){ echo 'selected'; } ?>>S.Tr. - Akuntansi Manajerial</option>
						<option value="S.Tr. - Manajemen Bisnis Internasional" <?php if($data['matkul'] == 'S.Tr. - Manajemen Bisnis Internasional'){ echo 'selected'; } ?>>S.Tr. - Manajemen Bisnis Internasional</option>
						<option value="D3 - Administrasi Bisnis" <?php if($data['matkul'] == 'D3 - Administrasi Bisnis'){ echo 'selected'; } ?>>D3 - Administrasi Bisnis</option>
						<option value="D3 - Manajemen Pemasaran" <?php if($data['matkul'] == 'D3 - Manajemen Pemasaran'){ echo 'selected'; } ?>>D3 - Manajemen Pemasaran</option>
						<option value="S.Tr. - Administrasi Bisnis Terapan" <?php if($data['matkul'] == 'S.Tr. - Administrasi Bisnis Terapan'){ echo 'selected'; } ?>>S.Tr. - Administrasi Bisnis Terapan</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
