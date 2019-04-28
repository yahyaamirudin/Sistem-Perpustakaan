<div class="content-wrapper">
	<div class="panel-body">
		<h1>Tabel Buku</h1>
		<div class="table-responsive">
			<div class="box">
				<a href="<?= base_url();?>buku/tambah" class="btn btn-primary" style="margin-left:15px;margin-top:15px; "><i class="fa fa-plus-circle"></i>Tambah Data</a></button>
				<a href="<?= base_url('buku/cetak_buku');?>" class="btn btn-warning" style="margin-left:15px;margin-top:15px; "><i class="fa fa-print"></i>cetak</a></button>
				<div class="box-header">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered data display nowrap" style="width:100%">
							<thead class="thead-dark">
								<tr>
									<th scope="col">no</th>
									<th scope="col">Judul</th>
									<th scope="col">Pengarang</th>
									<th scope="col">Penerbit</th>
									<th scope="col">ISBN</th>
									<th scope="col">Jumlah Buku</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no =1; ?>
								<?php foreach ($buku as $data):?>
									<tr id="data_<?=$data['id']?>">
										<td><?=$no++?></td>
										<td><?=$data['judul']?></td>
										<td><?=$data['pengarang']?></td>
										<td><?=$data['penerbit']?></td>
										<td><?=$data['isbn']?></td>
										<td><?=$data['jumlah_buku']?></td>
										<input type="hidden" value="<?=$data['id']?>">
										<td>
											<a href="<?=base_url();?>buku/ubah/<?= $data['id'];?>" name="ubah" class="btn btn-info" style="margin-right: 10px;margin-left: 30px;">Ubah</a>
											<a onclick="hapus(<?= $data['id'];?>)" id="hapus" data-placement="bottom" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
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
		function hapus(id){
			if(confirm("Anda yakin akan menghapus?"))
			{
				try{
					$.ajax({
						url: "<?= base_url('buku/hapus/')?>"+id,
						type: "post",
						data: {id:id},
						success: function(data) {
							alert('data berhasil di hapus');
							$("#data_"+id).remove();
						},
						error: function () {
							alert('ajax failure');
						}
					});
				}catch(err){
					document.getElementById("hapus").innerHTML = err.message;
				}
			}
		};
	</script>
