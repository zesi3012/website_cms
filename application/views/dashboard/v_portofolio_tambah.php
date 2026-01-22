<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><b>Tambah Portofolio Baru</b></h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Tombol kembali -->
            <a href="<?= base_url('dashboard/portofolio'); ?>" class="btn btn-success mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <!-- Form tambah portofolio -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-briefcase"></i> Form Tambah Portofolio</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard/portofolio/tambah_aksi'); ?>" 
                          method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Judul Portofolio</label>
                            <input type="text" name="judul" class="form-control" 
                                   value="<?= set_value('judul'); ?>" required>
                            <small class="text-danger"><?= form_error('judul'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="summernote" 
                                      placeholder="Masukkan deskripsi portofolio..."><?= set_value('deskripsi'); ?></textarea>
                            <small class="text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="kategori" class="form-control" 
                                   value="<?= set_value('kategori'); ?>">
                            <small class="text-danger"><?= form_error('kategori'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" name="tahun" class="form-control" 
                                   value="<?= set_value('tahun'); ?>">
                            <small class="text-danger"><?= form_error('tahun'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input type="file" name="gambar" class="form-control" required>
                            <small class="text-danger"><?= isset($gambar_error) ? $gambar_error : ''; ?></small>
                        </div>

                        <!-- Tombol Simpan Publish / Draft -->
                        <div class="form-group">
                            <button type="submit" name="status" value="publish" class="btn btn-success">
                                <i class="fas fa-save"></i> Publish
                            </button>
                            <button type="submit" name="status" value="draft" class="btn btn-secondary">
                                <i class="fas fa-save"></i> Draft
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
