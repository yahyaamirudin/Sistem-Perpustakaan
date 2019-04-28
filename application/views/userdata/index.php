<div class="content-wrapper">
	<div class="panel-body">
		<h1>Tabel User</h1>
		<div class="table-responsive">
			<div class="box">
				<a href="<?= base_url();?>UserData/tambah" class="btn btn-primary" style="margin-left:15px;margin-top:15px; "><i class="fa fa-plus-circle"></i>Tambah Data</a></button>
				<div class="box-header">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered data display nowrap" style="width:100%">
							<!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
								<thead class="thead-dark">
									<tr>
										<th scope="col">no</th>
										<th scope="col">ID</th>
										<th scope="col">Nama</th>
										<th scope="col">Username</th>
										<th scope="col">Role</th>
										<th scope="col">Data Created</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no =1; ?>
									<?php foreach ($userdata as $data): ?>
										<tr id="data_<?=$data['id']?>">
											<td><?=$no++?></td>
											<td><?=$data['id']?></td>
											<td><?=$data['nama']?></td>
											<td><?=$data['username']?></td>
											<td><?=$data['role']?></td>
											<td><?=$data['date_created']?></td>
											<td>
												<a href="<?= base_url();?>UserData/update/<?=$data['id'];?>" name="ubah" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Ubah</a>
												<a onclick="hapus(<?= $data['id'];?>)" id="hapus" data-placement="bottom" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
										</tr>
									<?php endforeach; ?>
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
						url: "<?= base_url('UserData/hapus/')?>"+id,
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
