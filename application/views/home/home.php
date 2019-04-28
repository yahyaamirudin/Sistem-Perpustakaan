 <div class="content-wrapper">
 	<br>
 	<br>
 	<br>
 	<div class="row" style="margin-left: 5px;margin-right: 5px;">
 		<div class="col-lg-3 col-xs-4">
 			<!-- small box -->
 			<div class="small-box bg-aqua">
 				<div class="inner">
 					<h3>
 						<?= $nim->num_rows(); ?>
 					</h3>
 					<p>Anggota</p>
 				</div>
 				<div class="icon">
 					<i class="ion ion-person"></i>
 				</div>
 				<a href="#" class="small-box-footer">
 					More info <i class="fa fa-arrow-circle-right"></i>
 				</a>
 			</div>
 		</div>
 		<!-- ./col -->
 		<div class="col-lg-3 col-xs-6">
 			<!-- small box -->
 			<div class="small-box bg-green">
 				<div class="inner">
 					<h3><?= $buku->num_rows(); ?></h3>

 					<p>Buku</p>
 				</div>
 				<div class="icon">
 					<i class="fa fa-book"></i>
 				</div>
 				<a href="#" class="small-box-footer">
 					More info <i class="fa fa-arrow-circle-right"></i>
 				</a>
 			</div>
 		</div>
 		<!-- ./col -->
 		<div class="col-lg-3 col-xs-6">
 			<!-- small box -->
 			<div class="small-box bg-yellow">
 				<div class="inner">
 					<h3><?= $pinjam->num_rows(); ?></h3>

 					<p>Peminjaman</p>
 				</div>
 				<div class="icon">
 					<i class="fa  fa-cart-plus"></i>
 				</div>
 				<a href="#" class="small-box-footer">
 					More info <i class="fa fa-arrow-circle-right"></i>
 				</a>
 			</div>
 		</div>
 		<!-- ./col -->
 		<div class="col-lg-3 col-xs-6">
 			<!-- small box -->
 			<div class="small-box bg-red">
 				<div class="inner">
 					<h3><?= $kembali->num_rows(); ?></h3>

 					<p>Pengembalian</p>
 				</div>
 				<div class="icon">
 					<i class="fa fa-check-circle"></i>
 				</div>
 				<a href="#" class="small-box-footer">
 					More info <i class="fa fa-arrow-circle-right"></i>
 				</a>
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