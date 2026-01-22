<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <b>Data Layanan</b>
                        <small>Manajemen layanan website</small>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Card Wrapper -->
                    <div class="card card-primary card-outline shadow-sm">

                        <!-- Card Header -->
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                <i class="fas fa-concierge-bell"></i> Daftar Layanan
                            </h3>

                            <a href="<?= base_url('dashboard/layanan/tambah'); ?>"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Tambah Layanan
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">

                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped align-middle">
                                    <thead class="bg-primary text-white text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="15%">Gambar</th>
                                            <th>Judul</th>
                                            <th>Deskripsi Singkat</th>
                                            <th width="10%">Status</th>
                                            <th width="18%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($layanan)): ?>
                                            <?php $no = 1; foreach ($layanan as $l): ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>

                                                    <td class="text-center">
                                                        <?php
                                                        $img = $l->gambar
                                                            ? base_url('gambar/layanan/' . $l->gambar)
                                                            : base_url('assets/img/no-image.png');
                                                        ?>
                                                        <img src="<?= $img; ?>"
                                                             class="img-thumbnail"
                                                             style="width: 80px; height: auto;">
                                                    </td>

                                                    <td>
                                                        <b><?= htmlspecialchars($l->judul); ?></b><br>
                                                        <small class="text-muted">
                                                            <?= base_url('layanan/' . $l->slug); ?>
                                                        </small>
                                                    </td>

                                                    <td>
                                                        <?= word_limiter(strip_tags($l->deskripsi_singkat), 15); ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php if ($l->status == 'publish'): ?>
                                                            <span class="badge badge-success">Publish</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-secondary">Draft</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="<?= base_url('dashboard/layanan/edit/' . $l->id); ?>"
                                                           class="btn btn-warning btn-sm"
                                                           title="Edit Layanan">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="<?= base_url('dashboard/layanan/hapus/' . $l->id); ?>"
                                                           onclick="return confirm('Yakin ingin menghapus layanan ini?')"
                                                           class="btn btn-danger btn-sm"
                                                           title="Hapus Layanan">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">
                                                    <i>Belum ada data layanan.</i>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </section>
</div>
