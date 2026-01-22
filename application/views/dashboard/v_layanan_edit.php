<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Layanan</b> <small>edit layanan</small></h1>
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

                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Edit Layanan
                        </h3>
                    </div>

                    <div class="card-body">
                        <form method="post"
                              action="<?= base_url('dashboard/layanan/update'); ?>"
                              enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $layanan->id; ?>">

                            <div class="row">

                                <!-- ================= KIRI ================= -->
                                <div class="col-lg-9">

                                    <div class="form-group">
                                        <label>Judul Layanan</label>
                                        <input type="text"
                                               name="judul"
                                               class="form-control"
                                               value="<?= htmlspecialchars($layanan->judul); ?>"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Singkat</label>
                                        <textarea name="deskripsi_singkat"
                                                  class="form-control"
                                                  rows="3"
                                                  required><?= htmlspecialchars($layanan->deskripsi_singkat); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Lengkap</label>
                                        <textarea name="deskripsi"
                                                  class="form-control"
                                                  id="summernote"
                                                  required><?= htmlspecialchars($layanan->deskripsi); ?></textarea>
                                    </div>

                                </div>

                                <!-- ================= KANAN ================= -->
                                <div class="col-lg-3">

                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="text"
                                               name="icon"
                                               class="form-control"
                                               value="<?= htmlspecialchars($layanan->icon); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Gambar Saat Ini</label><br>
                                        <?php if ($layanan->gambar): ?>
                                            <img src="<?= base_url('gambar/layanan/'.$layanan->gambar); ?>"
                                                 class="img-fluid mb-2"
                                                 style="border-radius:6px;">
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Ganti Gambar</label>
                                        <input type="file" name="gambar" class="form-control">
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
