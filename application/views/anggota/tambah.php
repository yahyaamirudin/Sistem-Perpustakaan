
<div class="content-wrapper">
	<div id="info">
		<div class="panel-body">
			<!-- <form action="" method="POST"> -->
				<?php echo form_open_multipart('Anggota/save',array('id'=>'form-user')); ?>
				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="nim">NIM</label>
							<div class="col-sm-10">
								<input class="form-control" name="nim" id="nim" type="text"  />
								<?= form_error('nim','<small class="text-danger">','</small>') ?>
							</div>
						</div>
					</div>
				</div>


				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label  class="col-sm-2 control-label" for='nama' >Nama</label>
							<div class="col-sm-10">
								<input class="form-control" name="nama" id="nama" type="text"  />
								<?= form_error('nama','<small class="text-danger">','</small>') ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label  class="col-sm-2 control-label" for='tempat' >Tempat Lahir</label>
							<div class="col-sm-10">
								<input class="form-control" name="tempat" id="tempat" type="text"  />
								<?= form_error('tempat','<small class="text-danger">','</small>') ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label" for='tanggal' >Tanggal Lahir</label>
							<div class="col-sm-10">
								<input class="form-control" name="tanggal" id="tanggal" type="date"  />
								<?= form_error('tanggal','<small class="text-danger">','</small>') ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-md-2 control-label" for='jk' >Jenis Kelamin</label>
							<div class="col-sm-10">
								<select class="form-control select2" multiple="multiple" name="jk" id="jk">
									<option value="L">L</option>
									<option value="P">P</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label" for='prodi' >Prodi</label>
							<div class="col-sm-10">
								<select class="form-control select2" multiple="multiple" id="prodi" name="prodi">
									<option value="Teknik informatika">Teknik informatika</option>
									<option value="Sistem informasi">Sistem informasi</option>
									<option value="Multimedia">Multimedia</option>
									<option value="Keamanan jaringan">Keamanan jaringan</option>
									<option value="Game design">Game design</option>
									<option value="Android developer">Android developer</option>
								</select>
								<label for="exampleInputFile">upload gambar</label>
								<input type="file" name="image" id="exampleInputFile">
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<div class="form-group">

						</div>
					</div>
				</div>
				<button type="submit" name="tambah"  class="btn btn-primary">Tambah Data</button>
			</form>
		</div>
	</div>
</div>


<!-- <script>
	$('#form-user').submit(function(e){
		e.preventDefault();
					// alert('submmit');
					var me = $(this);

					$.ajax({
						url 	:me.attr('action'),
						type	:'post',
						data 	: me.serialize(),
						dataType:'json',
						success:function(response){
							if(response.success == true){
								// $('.form-group').removeClass('has-error')
								// .removeClass('has-success');
								// $('.text-danger').remove();
								// me[0].reset();

								// $('.alert-success').delay(500).show(10, function() {
								// 	$(this).delay(3000).hide(10, function() {
								// 		$(this).remove();
								// 	});
								// })
								alert('data berhasil di tambah');
								window.location.href='<?=base_url('anggota')?>';
							}else if(response.success == false){
								$.each(response.messages,function(key, value){
									var element = $('#' + key);
									element.closest('div.form-group')
									.removeClass('has-error')
									.addClass(value.length > 0 ? 'has-error' : 'has-success')
									.find('.text-danger')
									.remove();
									element.after(value);
								});
							}
						}
					})
				})
			</script> -->