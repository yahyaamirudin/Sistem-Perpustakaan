<div class="content-wrapper">
	<div class="panel-body">
		<!-- <form action="" method="POST"> -->
			<?php echo validation_errors(); ?>
			<?php echo form_open_multipart('Buku/save',array('id'=>'form-user')); ?>
			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="judul" name="judul" placeholder="Enter Judul">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Pengarang</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Enter Pengarang">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Penerbit</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Enter penerbit">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Tahan terbit</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="tahun" name="tahun" placeholder="Enter tahun">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">ISBN</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter isbn">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Jumlah</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah">
						</div>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Input</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter tanggal">
						</div>
					</div>
				</div>
			</div>

			<button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
		</form>
	</div>
</div>
<script>
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
								alert('data berhasil di tambah');
								window.location.href='<?=base_url('buku')?>';
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
</script>