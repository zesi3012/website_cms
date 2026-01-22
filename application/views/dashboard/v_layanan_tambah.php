<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Layanan</b> <small>manajemen layanan</small></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url('dashboard/layanan'); ?>">
                    <button class="btn btn-sm btn-success">Kembali</button>
                </a>
                <br><br>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-cogs"></i> Data Layanan
                            <small>Tambah Layanan Baru</small>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form method="post"
                              action="<?= base_url('dashboard/layanan/tambah_aksi'); ?>"
                              enctype="multipart/form-data">

                            <div class="row">

                                <!-- ================= KIRI ================= -->
                                <div class="col-lg-9">

                                    <div class="form-group">
                                        <label>Judul Layanan</label>
                                        <input type="text"
                                               name="judul"
                                               class="form-control"
                                               placeholder="Masukkan Judul Layanan..."
                                               value="<?= set_value('judul'); ?>">
                                        <small class="text-danger"><?= form_error('judul'); ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Singkat</label>
                                        <textarea name="deskripsi_singkat"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="Ringkasan singkat layanan..."><?= set_value('deskripsi_singkat'); ?></textarea>
                                        <small class="text-danger"><?= form_error('deskripsi_singkat'); ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Lengkap</label>
                                        <textarea name="deskripsi"
                                                  class="form-control"
                                                  id="summernote"><?= set_value('deskripsi'); ?></textarea>
                                        <small class="text-danger"><?= form_error('deskripsi'); ?></small>
                                    </div>

                                </div>

                                <!-- ================= KANAN ================= -->
                                <div class="col-lg-3">

                                    <div class="form-group">
                                        <label>Icon (Ionicons / FontAwesome)</label>
                                        <input type="text"
                                               name="icon"
                                               class="form-control"
                                               placeholder="ion-monitor / fas fa-cogs"
                                               value="<?= set_value('icon'); ?>">
                                        <small class="text-muted">
                                            Digunakan di halaman layanan utama
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <label>Gambar Layanan</label>
                                        <input type="file" name="gambar" class="form-control">
                                        <small class="text-danger">
                                            <?php
                                            if (isset($gambar_error)) {
                                                echo $gambar_error;
                                            }
                                            ?>
                                        </small>
                                    </div>

                                    <!-- BUTTON STATUS -->
                                    <div class="form-group">
                                        <input type="submit"
                                               name="status"
                                               value="Draft"
                                               class="btn btn-sm btn-warning btn-block">

                                        <input type="submit"
                                               name="status"
                                               value="Publish"
                                               class="btn btn-sm btn-success btn-block">
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
