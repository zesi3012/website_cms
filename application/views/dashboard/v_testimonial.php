<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('dashboard/testimonial_add'); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Testimonial
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Testimonial</h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Foto</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th width="10%">Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($testimonial)): ?>
                                <?php $no = 1; foreach ($testimonial as $t): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>

                                        <td class="text-center">
                                            <?php if (!empty($t->foto)): ?>
                                                <img src="<?= base_url('gambar/testimonial/' . $t->foto); ?>"
                                                     class="img-thumbnail"
                                                     style="width:80px; height:80px; object-fit:cover;">
                                            <?php else: ?>
                                                <span class="text-muted">No Image</span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?= htmlspecialchars($t->nama); ?></td>

                                        <td><?= word_limiter(strip_tags($t->pesan), 15); ?></td>

                                        <td class="text-center">
                                            <?php if ($t->status == 'aktif'): ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary">Nonaktif</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <a href="<?= base_url('dashboard/testimonial_edit/' . $t->id); ?>"
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="<?= base_url('dashboard/testimonial_delete/' . $t->id); ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Yakin ingin menghapus testimonial ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        Belum ada data testimonial
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>
</div>
