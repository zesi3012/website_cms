<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">
            <b>Dashboard</b> <small>Control Panel</small>
          </h1>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="card card-primary shadow">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-lock"></i> Ganti Password
                <small> | Ubah Password Anda</small>
              </h3>
            </div>

            <div class="card-body">
              <?php
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'gagal') {
                  echo "
                  <div class='alert alert-danger text-center font-weight-bold'>
                    <i class='fas fa-times-circle'></i> Maaf, password lama yang Anda masukkan salah!
                  </div>";
                } elseif ($_GET['alert'] == 'sukses') {
                  echo "
                  <div class='alert alert-success text-center font-weight-bold'>
                    <i class='fas fa-check-circle'></i> Password berhasil diperbarui!
                  </div>";
                }
              }
              ?>

              <form method="post" action="<?php echo base_url('dashboard/ganti_password_aksi'); ?>">
                <div class="form-group mb-3">
                  <label><i class="fas fa-key"></i> Password Lama</label>
                  <input type="password" class="form-control" name="password_lama"
                    placeholder="Masukkan password lama Anda" required>
                  <?php echo form_error('password_lama'); ?>
                </div>

                <div class="form-group mb-3">
                  <label><i class="fas fa-lock"></i> Password Baru</label>
                  <input type="password" class="form-control" name="password_baru"
                    placeholder="Masukkan password baru Anda" required>
                  <?php echo form_error('password_baru'); ?>
                </div>

                <div class="form-group mb-3">
                  <label><i class="fas fa-check"></i> Konfirmasi Password Baru</label>
                  <input type="password" class="form-control" name="konfirmasi_password"
                    placeholder="Ulangi password baru Anda" required>
                  <?php echo form_error('konfirmasi_password'); ?>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Ganti Password
                  </button>
                </div>
              </form>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </section>
      </div>
    </div>
  </section>
</div>
