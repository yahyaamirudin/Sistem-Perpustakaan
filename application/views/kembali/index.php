<div class="content-wrapper">
	<div class="panel-body">
		<h1>Tabel Pengembalian</h1>
		<div class="table-responsive">
			<div class="box">
				<div class="box-header">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered data" style="width:100%">
							<thead class="thead-dark">
								<tr>
									<th scope="col">no</th>
									<th scope="col">ID Transaksi</th>
									<th scope="col">Judul Buku</th>
									<th scope="col">NIM</th>
									<th scope="col">Nama</th>
									<th scope="col">Tanggal Pinjam</th>
									<th scope="col">Tanggal Kembali</th>
									<th scope="col">Denda</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($transaksi as $data) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data['id_transaksi'] ?></td>
										<td><?= $data['judul'] ?></td>
										<td><?= $data['nim'] ?></td>
										<td><?= $data['nama'] ?></td>
										<td><?= $data['tgl_pinjam'] ?></td>
										<td><?= $data['tgl_kembali'] ?></td>
										<td><?php
											$CI = &get_instance();
											$denda        	= 1000;
											$dateline2    	= $data['tgl_kembali'];
											$tglkembali  	= date('Y-m-d');
											$lambat			= $CI->terlambat($dateline2, $tglkembali);

											$denda1			= $lambat * $denda;

											if ($lambat > 0) {
												echo "<font color='red'>$lambat hari(Rp $denda1)</font>";
											} else {
												echo $lambat . "hari";
											}
											?></td>
										<td>
											<input type="hidden" value="<?= $data['id_buku'] ?>">
											<a href="<?= base_url(); ?>kembali/perpanjang/<?= $data['id_transaksi'] ?>/<?= $data['tgl_kembali'] ?>/<?= $lambat ?>" name="perpanjang" class="btn btn-warning" style="float: left;">perpanjang</a>

											<a href="<?= base_url(); ?>kembali/kembali/<?= $data['id_transaksi'] ?>/<?= $data['id_buku'] ?>/<?= $data['nim'] ?>/<?= $data['nama'] ?>/<?= $data['tgl_kembali'] ?>/<?= $denda1 ?>" name="kembali" class="btn btn-success" style="float: right">kembali</a>
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

<!-- 	<a href="<?= base_url(); ?>buku/tambah" class="btn btn-primary" style="margin-top: 5px;">Tambah Data</a>
		<a href="./laporan/laporanexcel.php" class="btn btn-warning" style="margin-top: 5px;;"><i class="fa fa-print"></i> Export</button></a> -->
</div>
</div>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>