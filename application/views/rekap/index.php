<div class="content-wrapper">
	<div class="panel-body">
		<h1>Tabel Rekap</h1>
		<div class="table-responsive">
			<div class="box">
				<div class="box-header">
				<!-- /.box-header -->
				<div class="box-body">
					<table id="rekap" class="table table-striped table-bordered tombol display nowrap" style="width:100%">
						<!-- <table id="data" class="table table-bordered table-striped data display nowrap"> -->

							<thead class="thead-dark">
								<tr>
									<th scope="col">no</th>
									<th scope="col">ID Transaksi</th>
									<th scope="col">Kode Buku</th>
									<th scope="col">NIM</th>
									<th scope="col">NAMA</th>
									<th scope="col">Tanggal Kembali</th>
									<th scope="col">Status denda</th>
									<th scope="col">Nominal</th>
								</tr>
							</thead>
							<tbody>
								<?php $no =1; ?>
								<?php foreach ($rekap as $data):?>
									<tr>
										<td><?=$no++?></td>
										<td><?=$data['id_transaksi']?></td>
										<td><?=$data['kode_buku']?></td>
										<td><?=$data['nim']?></td>
										<td><?=$data['nama']?></td>
										<td><?=$data['tanggal_kembali']?></td>
										<td><?=$data['status_denda']?></td>
										<td><?=$data['nominal']?></td>
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