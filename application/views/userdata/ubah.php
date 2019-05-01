<div class="content-wrapper">
	<div id="info">
		<div class="panel-body">
			<!-- <form action="" method="POST"> -->
			<form action="" method="post">
				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="id">ID</label>
							<div class="col-sm-10">
								<input class="form-control" name="id" id="id" type="text" value="<?= $anggota['id'] ?>" />
								<?= form_error('id', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
					</div>
				</div>


				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label" for='nama'>Nama</label>
							<div class="col-sm-10">
								<input class="form-control" name="nama" id="nama" type="text" value="<?= $anggota['nama'] ?>" />
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input class="form-control" name="username" id="username" type="text" value="<?= $anggota['username'] ?>" />
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-md-2 control-label">Role</label>
							<div class="col-sm-10">
								<select class="form-control" name="role" id="role">
									<?php foreach ($role as $angg) : ?>
										<?php if ($angg == $anggota['role']) : ?>
											<option value="<?= $angg; ?>" selected><?= $angg; ?></option>
										<?php else : ?>
											<option value="<?= $angg; ?>"><?= $angg; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>

								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input class="form-control" type="password" name="password" placeholder="Password">
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input class="form-control" type="password" name="password2" placeholder="Retype Password">
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
				<button type="submit" name="tambah" class="btn btn-primary">Ubah Data</button>
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
								window.location.href='<?= base_url('anggota') ?>';
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