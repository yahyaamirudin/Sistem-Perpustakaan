<div class="content-wrapper">
	<div class="panel-body">
		<h1>Tabel Anggota</h1>
		<div class="table-responsive">
			<div class="box">
				<a href="<?= base_url(); ?>anggota/tambah" class="btn btn-primary" style="margin-left:15px;margin-top:15px; "><i class="fa fa-plus-circle"></i>Tambah Data</a></button>
				<a href="<?= base_url('anggota/cetak_anggota'); ?>" class="btn btn-warning" style="margin-left:15px;margin-top:15px; "><i class="fa fa-print"></i>cetak</a></button>
				<div class="box-header">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered data display nowrap" style="width:100%">
							<!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
							<thead class="thead-dark">
								<tr>
									<th scope="col">no</th>
									<th scope="col">NIM</th>
									<th scope="col">Nama</th>
									<th scope="col">Tempat Lahir</th>
									<th scope="col">Tanggal Lahir</th>
									<th scope="col">Jenis Kelamin</th>
									<th scope="col">Prodi</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($anggota as $data) : ?>
									<tr id="data_<?= $data['nim'] ?>">
										<td><?= $no++ ?></td>
										<td><?= $data['nim'] ?></td>
										<td><?= $data['nama'] ?></td>
										<td><?= $data['tempat_lahir'] ?></td>
										<td><?= $data['tgl_lahir'] ?></td>
										<td><?= $data['jk'] ?></td>
										<td><?= $data['prodi'] ?></td>
										<input type="hidden" value="<?= $data['nim']; ?>">
										<td>
											<a href="<?= base_url(); ?>anggota/ubah/<?= $data['nim']; ?>" name="ubah" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Ubah</a>
											<a onclick="hapus(<?= $data['nim']; ?>)" id="hapus" data-placement="bottom" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>
								<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>
<script>
	function hapus(nim) {
		if (confirm("Anda yakin akan menghapus?")) {
			try {
				$.ajax({
					url: "<?= base_url('anggota/hapus/') ?>" + nim,
					type: "post",
					data: {
						nim: nim
					},
					success: function(data) {
						alert('data berhasil di hapus');
						$("#data_" + nim).remove();
					},
					error: function() {
						alert('ajax failure');
					}
				});
			} catch (err) {
				document.getElementById("hapus").innerHTML = err.message;
			}
		}
	};
</script>