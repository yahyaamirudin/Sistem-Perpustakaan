<div class="content-wrapper">
	<div class="panel-body">
		<h1>Tabel Transaksi</h1>
		<div class="table-responsive">
			<div class="box">
				<div class="box-header">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered data" style="width:100%">
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
									<tr>
										<td><?=$no++?></td>
										<td><?=$data['judul']?></td>
										<td><?=$data['pengarang']?></td>
										<td><?=$data['penerbit']?></td>
										<td><?=$data['isbn']?></td>
										<td><?=$data['jumlah_buku']?></td>
										<input type="hidden" value="<?=$data['id']?>">
										<td>
											<a href="<?=base_url();?>transaksi/pinjamindex/<?= $data['id'];?>" name="tambah" class="btn btn-info" style="margin-right: 10px;margin-left: 30px;">pinjam</a>
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