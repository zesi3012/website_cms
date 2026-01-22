<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><b>Edit Testimonial</b></h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Tombol kembali -->
            <a href="<?= base_url('dashboard/testimonial'); ?>" class="btn btn-success mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <!-- Form edit testimonial -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comments"></i> Form Edit Testimonial
                    </h3>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('dashboard/testimonial_update'); ?>"
                          method="post"
                          enctype="multipart/form-data">

                        <!-- hidden -->
                        <input type="hidden" name="id" value="<?= $testimonial->id; ?>">
                        <input type="hidden" name="foto_lama" value="<?= $testimonial->foto; ?>">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="<?= set_value('nama', $testimonial->nama); ?>"
                                   required>
                            <small class="text-danger"><?= form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Pesan Testimonial</label>
                            <textarea name="pesan"
                                      class="form-control"
                                      rows="4"
                                      required><?= set_value('pesan', $testimonial->pesan); ?></textarea>
                            <small class="text-danger"><?= form_error('pesan'); ?></small>
                        </div>

                        <!-- Foto -->
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <br>

                            <?php if ($testimonial->foto): ?>
                                <img src="<?= base_url('gambar/testimonial/' . $testimonial->foto); ?>"
                                     class="img-thumbnail mb-2"
                                     style="width:120px; height:120px; object-fit:cover;">
                            <?php endif; ?>

                            <?php
                                if (isset($foto_error)) {
                                    echo $foto_error;
                                }
                                echo form_error('foto');
                            ?>
                        </div>

                        <!-- Tombol status (SAMA PERSIS DENGAN TAMBAH) -->
                        <div class="form-group">
                            <button type="submit"
                                    name="status"
                                    value="aktif"
                                    class="btn btn-success">
                                <i class="fas fa-check"></i> Aktif
                            </button>

                            <button type="submit"
                                    name="status"
                                    value="nonaktif"
                                    class="btn btn-secondary">
                                <i class="fas fa-ban"></i> Nonaktif
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </section>
</div>
