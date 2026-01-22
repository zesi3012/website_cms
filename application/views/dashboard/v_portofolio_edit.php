<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><b>Edit Portofolio</b></h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <a href="<?= base_url('dashboard/portofolio'); ?>" class="btn btn-success mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-briefcase"></i> Form Edit Portofolio</h3>
                </div>
                <div class="card-body">

                    <?php $p = $portofolio; // object portofolio ?>

                    <form action="<?= base_url('dashboard/portofolio/update'); ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $p->id; ?>">

                        <div class="row">

                            <!-- Kolom Kiri -->
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label>Judul Portofolio</label>
                                    <input type="text" name="judul" class="form-control"
                                        value="<?= set_value('judul', $p->judul); ?>" required>
                                    <small class="text-danger"><?= form_error('judul'); ?></small>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="summernote"
                                        required><?= set_value('deskripsi', $p->deskripsi); ?></textarea>
                                    <small class="text-danger"><?= form_error('deskripsi'); ?></small>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control"
                                        value="<?= set_value('kategori', $p->kategori); ?>">
                                    <small class="text-danger"><?= form_error('kategori'); ?></small>
                                </div>

                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" class="form-control"
                                        value="<?= set_value('tahun', $p->tahun); ?>">
                                    <small class="text-danger"><?= form_error('tahun'); ?></small>
                                </div>

                                <div class="form-group">
                                    <label>Gambar Saat Ini</label><br>
                                    <?php if ($p->gambar): ?>
                                        <img src="<?= base_url('gambar/portofolio/' . $p->gambar); ?>"
                                            class="img-thumbnail mb-2" width="150">
                                    <?php else: ?>
                                        <span class="text-muted">Belum ada gambar</span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Ganti Gambar (optional)</label>
                                    <input type="file" name="gambar" class="form-control">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
                                    <small class="text-danger"><?= isset($gambar_error) ? $gambar_error : ''; ?></small>
                                </div>

                                <!-- Tombol Publish / Draft -->                            
                                <div class="form-group">
                                    <button type="submit" name="status" value="publish" class="btn btn-success">
                                        <i class="fas fa-save"></i> Publish
                                    </button>
                                    <button type="submit" name="status" value="draft" class="btn btn-secondary">
                                        <i class="fas fa-save"></i> Draft
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>