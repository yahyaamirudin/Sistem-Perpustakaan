<div class="content-wrapper">
	<div class="panel-body">
		<!-- <form action="" method="POST"> -->
			<?php echo validation_errors(); ?>
			<?php echo form_open('Transaksi/simpan'); ?>
			
			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">ID Transaksi</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="idtransaksi" name="idtransaksi" value="<?= $autoid;?>"
							readonly >
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">ID Buku</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="idbuku" name="idbuku" value="<?= $buku['id'];?>" readonly>
						</div>
					</div>
				</div>
			</div>


			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul']?>" readonly>
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">NIM</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nim" name="nim" onchange="return autofill();" required >
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nama" name="nama">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Pinjam</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="tglpinjam" name="tglpinjam" value="<?= $tglpinjam?>" readonly>
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Kembali</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="tglkembali" name="tglkembali" value="<?= $tglkembali?>" readonly>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-1">
				<button type="submit" name="simpan" class="btn btn-primary">Tambah Data</button>
			</div>
		</form>
	</div>
</div>
<script>
	function autofill(){
		var nim =document.getElementById('nim').value;
		$.ajax({
			url:"<?php echo base_url();?>index.php/transaksi/cari",
			data:{nim:nim},
			method : 'get',
			dataType: 'json',
			success:function(data){	
				document.getElementById('nama').value=data.nama;
				console.log("Success");
			}
		});

	}
</script>