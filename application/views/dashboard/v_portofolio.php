<!-- application/views/dashboard/v_portofolio.php -->

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Portofolio</b>
                        <small>Manajemen portofolio website</small>
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
                                <i class="fas fa-briefcase"></i> Daftar Portofolio
                            </h3>

                            <a href="<?php echo base_url('dashboard/portofolio/tambah'); ?>"
                                class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Tambah Portofolio
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">

                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
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
                                            <th>Kategori</th>
                                            <th width="10%">Tahun</th>
                                            <th width="10%">Status</th>
                                            <th width="18%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($portofolio)): ?>
                                            <?php $no = 1;
                                            foreach ($portofolio as $p): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>

                                                    <td class="text-center">
                                                        <?php
                                                        $img = $p->gambar
                                                            ? base_url('gambar/portofolio/' . $p->gambar)
                                                            : base_url('assets/img/no-image.png');
                                                        ?>
                                                        <img src="<?php echo $img; ?>" class="img-thumbnail"
                                                            style="width: 80px; height: auto;">
                                                    </td>

                                                    <td><?php echo htmlspecialchars($p->judul); ?></td>
                                                    <td><?php echo htmlspecialchars($p->kategori); ?></td>
                                                    <td class="text-center"><?php echo htmlspecialchars($p->tahun); ?></td>

                                                    <td class="text-center">
                                                        <?php if ($p->status == 'publish'): ?>
                                                            <span class="badge badge-success">Publish</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-secondary">Draft</span>
                                                        <?php endif; ?>
                                                    </td>


                                                    <td class="text-center">

                                                        <a href="<?php echo base_url('dashboard/portofolio/edit/' . $p->id); ?>"
                                                            class="btn btn-warning btn-sm" title="Edit Portofolio">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="<?php echo base_url('dashboard/portofolio/hapus/' . $p->id); ?>"
                                                            onclick="return confirm('Yakin ingin menghapus portofolio ini?')"
                                                            class="btn btn-danger btn-sm" title="Hapus Portofolio">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">
                                                    <i>Belum ada data portofolio.</i>
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