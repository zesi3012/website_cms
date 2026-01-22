<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><b>Tambah Testimonial</b></h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Tombol kembali -->
            <a href="<?= base_url('dashboard/testimonial'); ?>" class="btn btn-success mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <!-- Form tambah testimonial -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comments"></i> Form Tambah Testimonial
                    </h3>
                </div>

                <div class="card-body">
    <form action="<?= base_url('dashboard/testimonial_add'); ?>" 
          method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="<?= set_value('nama'); ?>" required>
            <small class="text-danger"><?= form_error('nama'); ?></small>
        </div>

        <div class="form-group">
            <label>Pesan Testimonial</label>
            <textarea name="pesan" class="form-control"
                      rows="4"
                      placeholder="Masukkan pesan testimonial..."
                      required><?= set_value('pesan'); ?></textarea>
            <small class="text-danger"><?= form_error('pesan'); ?></small>
        </div>

        <!-- INI YANG DIPERBAIKI -->
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" required>
            <br>
            <?php
                if (isset($foto_error)) {
                    echo $foto_error;
                }
                echo form_error('foto');
            ?>
        </div>

        <!-- Tombol Simpan Aktif / Nonaktif -->
        <div class="form-group">
            <button type="submit" name="status" value="aktif" class="btn btn-success">
                <i class="fas fa-check"></i> Aktif
            </button>

            <button type="submit" name="status" value="nonaktif" class="btn btn-secondary">
                <i class="fas fa-ban"></i> Nonaktif
            </button>
        </div>

    </form>
</div>

            </div>

        </div>
    </section>
</div>
