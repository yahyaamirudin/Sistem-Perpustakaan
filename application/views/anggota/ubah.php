
<div class="content-wrapper">
	<div class="panel-body">
		<form action="" method="post">
			<?php echo validation_errors(); ?>
			<div class="form-group">
				<label>NIM</label>
				<input class="form-control" name="nim" id="nim" type="text" value="<?=$anggota['nim'];?>"  />
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input class="form-control" name="nama" id="nama" type="text" value="<?=$anggota['nama']?>" />
			</div>

			<div class="form-group">
				<label>Tempat Lahir</label>
				<input class="form-control" name="tempat" id="tempat" type="text" value="<?= $anggota['tempat_lahir']?>" />
			</div>

			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input class="form-control" name="tanggal" id="tanggal" type="date" value="<?= $anggota['tgl_lahir'];?>" />
			</div>

			<div class="form-group">
				<label>jenis kelamin</label>
				<select class="form-control" name="jk" id="jk">
					<?php foreach ($kelamin as $angg):?>
						<?php if ($angg == $anggota['jk']): ?>
							<option value="<?= $angg;?>" selected><?= $angg;?></option>
							<?php else: ?>
							<option value="<?= $angg;?>"><?= $angg;?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="prodi">Prodi</label>
				<select class="form-control" id="prodi" name="prodi">
					<?php foreach ($jurusan as $jur):?>
						<?php if($jur == $anggota['prodi']): ?>
							<option value="<?=$jur?>" selected><?= $jur ?></option>
							<?php else: ?>
							<option value="<?=$jur?>"><?= $jur ?></option>
						<?php endif; ?>
					<?php endforeach ;?>
				</select>
			</div>
			<button type="submit" name="ubah"  class="btn btn-primary">Update Data</button>
		</form>
	</div>
</div>