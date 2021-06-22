<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['nip'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$nip = $_GET['nip'];

			//query ke database SELECT tabel dosen berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nip='$nip'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama_dosen			  = $_POST['nama_dosen'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$pengampu	= $_POST['pengampu'];
            $matkul = $_POST['matkul'];

			$sql = mysqli_query($koneksi, "UPDATE dosen SET nama_dosen='$nama_dosen', jenis_kelamin='$jenis_kelamin', pengampu='$pengampu' WHERE nip='$nip'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dosen";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_dosen&nip=<?php echo $nip; ?>" method="post">
        <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nip</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nip" class="form-control" size="4" value="<?php echo $data['nip']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama dosen</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_dosen" class="form-control" value="<?php echo $data['nama_dosen']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Laki-Laki" <?php if($data['jenis_kelamin'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
    <!-- DATA PENGAMPU -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="pengampu" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika" <?php if($data['pengampu'] == 'Teknik Informatika'){ echo 'selected'; } ?>>Teknik Informatika</option>
						<option value="Teknik Sipil" <?php if($data['pengampu'] == 'Teknik Sipil'){ echo 'selected'; } ?>>Teknik Sipil</option>
						<option value="Teknik Kimia" <?php if($data['pengampu'] == 'Teknik Kimia'){ echo 'selected'; } ?>>Teknik Kimia</option>
						<option value="Teknik Elektro" <?php if($data['pengampu'] == 'Teknik Elektro'){ echo 'selected'; } ?>>Teknik Elektro</option>
						<option value="Akuntansi" <?php if($data['pengampu'] == 'Akuntansi'){ echo 'selected'; } ?>>Akuntansi</option>
						<option value="Manajemen" <?php if($data['pengampu'] == 'Manajemen'){ echo 'selected'; } ?>>Manajemen</option>
						<option value="Farmasi" <?php if($data['pengampu'] == 'Farmasi'){ echo 'selected'; } ?>>Farmasi</option>
						<option value="Hukum" <?php if($data['pengampu'] == 'Hukum'){ echo 'selected'; } ?>>Hukum</option>
						<option value="Kedokteran" <?php if($data['pengampu'] == 'Kedokteran'){ echo 'selected'; } ?>>Kedokteran</option>
					</select>
				</div>
			</div>
<!-- MATA KULIAH -->
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mata Kuliah</label>
				<div class="col-md-6 col-sm-6">
					<select name="matkul" class="form-control" required>
						<option value="">Pilih Mata Kuliah</option>
						<option value="Basis Data" <?php if($data['matkul'] == 'Basis Data'){ echo 'selected'; } ?>>Basis Data</option>
						<option value="Perangkat Bergerak" <?php if($data['matkul'] == 'Perangkat Bergerak'){ echo 'selected'; } ?>>Perangkat Bergerak</option>
					</select>
				</div>
			</div>

			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_dosen" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
