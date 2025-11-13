<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Kategori</b> <small>Manajemen kategori artikel</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <!-- Card -->
                    <div class="card card-primary card-outline shadow-sm">
                        
                        <!-- Header -->
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                <i class="fas fa-folder"></i> Daftar Kategori
                            </h3>
                            <a href="<?php echo base_url('dashboard/kategori_tambah'); ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Tambah Kategori
                            </a>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped align-middle">
                                    <thead class="bg-primary text-white text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Kategori</th>
                                            <th>Slug Kategori</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($kategori)) {
                                            $no = 1;
                                            foreach ($kategori as $k) {
                                        ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo htmlspecialchars($k->kategori_nama); ?></td>
                                                    <td><?php echo htmlspecialchars($k->kategori_slug); ?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('dashboard/kategori_edit/' . $k->kategori_id); ?>" 
                                                           class="btn btn-warning btn-sm" title="Edit Kategori">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('dashboard/kategori_hapus/' . $k->kategori_id); ?>" 
                                                           onclick="return confirm('Yakin ingin menghapus kategori ini?')" 
                                                           class="btn btn-danger btn-sm" title="Hapus Kategori">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    <i>Tidak ada data kategori.</i>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
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
