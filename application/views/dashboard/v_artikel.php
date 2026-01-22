<style>
.action-btn {
    margin-right: 3px; 
}
</style>

<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Artikel</b> <small>Manajemen Artikel</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-file"></i> Data Artikel
                            </h3>
                        </div>

                        <div class="card-body">

                            <!-- Tombol tambah -->
                            <a href="<?= base_url('dashboard/artikel_tambah'); ?>">
                                <button class="btn btn-sm btn-success mb-3">
                                    Buat Artikel Baru <i class="fas fa-plus"></i>
                                </button>
                            </a>

                            <hr>

                            <!-- Tabel artikel -->
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Tanggal</th>
                                        <th>Judul Artikel</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th width="10%">Gambar</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; foreach ($artikel as $a): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($a->artikel_tanggal)); ?></td>
                                        <td>
                                            <?= $a->artikel_judul; ?>
                                            <br>
                                            <small class="text-muted"><?= base_url('artikel/'.$a->artikel_slug); ?></small>
                                        </td>
                                        <td><?= $a->pengguna_nama; ?></td>
                                        <td><?= $a->kategori_nama; ?></td>
                                        <td>
                                            <img width="100%" class="img-fluid" src="<?= base_url('gambar/artikel/'.$a->artikel_sampul); ?>">
                                        </td>
                                        <td>
                                            <?php if ($a->artikel_status == "publish"): ?>
                                                <span class="badge badge-success">Publish</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Draft</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">

                                                <!-- Tombol View (Detail) -->
                                                <a target="_blank" href="<?= base_url('artikel/'.$a->artikel_slug); ?>">
                                                    <button class="btn btn-success btn-sm action-btn">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>

                                                <!-- Tombol Edit & Hapus -->
                                                <?php  
                                                if ($this->session->userdata('level') == 'penulis') {
                                                    if ($this->session->userdata('id') == $a->artikel_author): ?>
                                                        <a href="<?= base_url('dashboard/artikel_edit/'.$a->artikel_id); ?>">
                                                            <button class="btn btn-warning btn-sm action-btn">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="<?= base_url('dashboard/artikel_hapus/'.$a->artikel_id); ?>"
                                                           onclick="return confirm('Yakin Hapus Data Ini ?')">
                                                            <button class="btn btn-danger btn-sm action-btn">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </a>
                                                    <?php endif;
                                                } else { ?>
                                                    <a href="<?= base_url('dashboard/artikel_edit/'.$a->artikel_id); ?>">
                                                        <button class="btn btn-warning btn-sm action-btn">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?= base_url('dashboard/artikel_hapus/'.$a->artikel_id); ?>"
                                                       onclick="return confirm('Yakin Hapus Data Ini ?')">
                                                        <button class="btn btn-danger btn-sm action-btn">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </a>
                                                <?php } ?>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
