<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profil
    </h1>
  </section>
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img src="<?= base_url() ?>upload/product/<?= $bio['gambar'] ?>" class="profile-user-img img-responsive img-circle" alt="User Image" width='50' height='50'>

            <h3 class="profile-username text-center"><?= $user['nama']  ?></h3>

            <p class="text-muted text-center">Member</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>ID Members</b> <a class="pull-right"><?= $user['id']  ?></a>
              </li>
              <li class="list-group-item">
                <b>Username</b> <a class="pull-right"><?= $user['username']  ?></a>
              </li>
              <li class="list-group-item">
                <b>Date Created</b> <a class="pull-right"><?= $user['date_created']  ?></a>
              </li>
            </ul>

            <!-- <a href="" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block"><b>Change User</b></a> -->
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <h1>Peminjaman Buku</h1>
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
                              <td><?= $data['tgl_pinjam'] ?></td>
                              <td><?= $data['tgl_kembali'] ?></td>
                              <td><?php
                                  $CI = &get_instance();
                                  $denda          = 1000;
                                  $dateline2      = $data['tgl_kembali'];
                                  $tglkembali   = date('Y-m-d');
                                  $lambat     = $CI->terlambat($dateline2, $tglkembali);

                                  $denda1     = $lambat * $denda;

                                  if ($lambat > 0) {
                                    echo "<font color='red'>$lambat hari(Rp $denda1)</font>";
                                  } else {
                                    echo $lambat . "hari";
                                  }
                                  ?></td>
                              <td>
                                <input type="hidden" value="<?= $data['id_buku'] ?>">
                                <a href="<?= base_url(); ?>user/perpanjang/<?= $data['id_transaksi'] ?>/<?= $data['tgl_kembali'] ?>/<?= $lambat ?>" name="perpanjang" class="btn btn-warning" style="float: left;">perpanjang</a>
                                <br>
                              </td>
                            <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="settings">
              <form class="form-horizontal" method="post" id="form-user" enctype="multipart/form-data" action="<?= base_url('User/save') ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="nim">NIM</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="nim" id="nim" type="text" value="<?= $user['id'] ?>" />
                    <?= form_error('nim', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for='nama'>Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="nama" id="nama" type="text" value="<?= $user['nama'] ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for='tempat'>Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="tempat" id="tempat" type="text" value="<?= $bio['tempat_lahir'] ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for='tanggal'>Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="tanggal" id="tanggal" type="date" value="<?= $bio['tgl_lahir'] ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label" for='jk'>Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jk" id="jk">
                      <?php foreach ($kelamin as $s) : ?>
                        <?php if ($s == $bio['jk']) : ?>
                          <option value="<?= $s ?>" selected><?= $s ?></option>
                        <?php else : ?>
                          <option value="<?= $s ?>"><?= $s ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for='prodi'>Prodi</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="prodi" name="prodi" value="<?= $bio['prodi'] ?>">
                      <?php foreach ($jurusan as $j) : ?>
                        <?php if ($j == $bio['prodi']) : ?>
                          <option value="<?= $j ?>" selected><?= $j ?></option>
                        <?php else : ?>
                          <option value="<?= $j ?>"><?= $j ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <label for="exampleInputFile">upload gambar</label>
                    <input type="file" name="image" id="exampleInputFile">
                  </div>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Submit Data</button>
                <a href="<?= base_url() ?>user/ubah/<?= $user['id'] ?>" name="update" class="btn btn-success tampilmodal" data-toggle="modal" data-target="#exampleModal" data-id="<?= $user['id'] ?>">Update Data</a>
                <!-- <button type="button" name="update" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Update Data</button> -->
                </button>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" id="form-user2" enctype="multipart/form-data" action="<?= base_url('User/ubah') ?>">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="nim">NIM</label>
            <div class="col-sm-10">
              <input class="form-control" name="nim" id="nim" type="text" />
              <?= form_error('nim', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for='nama'>Nama</label>
            <div class="col-sm-10">
              <input class="form-control" name="nama" id="nama" type="text" value="" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for='tempat'>Tempat Lahir</label>
            <div class="col-sm-10">
              <input class="form-control" name="tempat" id="tempat" type="text" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for='tanggal'>Tanggal Lahir</label>
            <div class="col-sm-10">
              <input class="form-control" name="tanggal" id="tanggal" type="date" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for='jk'>Jenis Kelamin</label>
            <div class="col-sm-10">
              <select class="form-control" name="jk" id="jk">
                <option value=""></option>
                <option value="L">L</option>
                <option value="P">P</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for='prodi'>Prodi</label>
            <div class="col-sm-10">
              <select class="form-control" id="prodi" name="prodi">
                <option value=""></option>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('.tampilmodal').on('click', function() {

      const id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: 'http://localhost/perpusv2/user/getupdate',
        data: {
          id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          setTimeout(() => {
            $("#form-user2 #nim").val(data.nim);
          }, 500);
           
        }
      });
    })
  })
</script>