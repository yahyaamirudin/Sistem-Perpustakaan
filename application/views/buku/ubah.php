<div class="content-wrapper">
	<div class="panel-body">
		<form action="" method="POST">
			<?php echo validation_errors(); ?>
			<input type="hidden" name="id" value="<?= $buku['id'];?>">
			<div class="form-group">
				<label>Judul</label>
				<input type="text" class="form-control" id="judul" name="judul" placeholder="Enter Judul" value="<?= $buku['judul']?>" >
			</div>
			<div class="form-group">
				<label>pengarang</label>
				<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Enter Pengarang" value="<?= $buku['pengarang']?>" >
			</div>
			<div class="form-group">
				<label>penerbit</label>
				<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Enter penerbit" value="<?= $buku['penerbit']?>" >
			</div>
			<div class="form-group">
				<label>tahun Terbit</label>
				<input type="text" class="form-control" id="tahun" name="tahun" placeholder="Enter tahun" value="<?= $buku['tahun_terbit']?>" >
			</div>
			<div class="form-group">
				<label>isbn</label>
				<input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter isbn" value="<?= $buku['isbn']?>" >
			</div>
			<div class="form-group">
				<label>jumlah</label>
				<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah" value="<?= $buku['jumlah_buku']?>">
			</div>
			<div class="form-group">
				<label for="tanggal">tanggal input</label>
				<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter tanggal" value="<?= $buku['tgl_input']?>">
			</div>
				<button type="submit" name="ubah" class="btn btn-primary">Update Data</button>
		</form>
	</div>
</div>
