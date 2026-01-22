<?php
if (!isset($layanan) || empty($layanan)) {
    $layanan = [];
}
?>

<!-- LAYANAN LIST HEADER -->
<section class="intro-single bg-image"
    style="background-image: url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
    
    <div class="overlay-mf"></div>

    <div class="intro-wrapper">
        <div class="container text-center">
            <h1 class="intro-title">Layanan</h1>

            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Layanan</li>
            </ol>
        </div>
    </div>
</section>
<br>


<!-- LAYANAN GRID -->
<section class="portfolio-mf sect-pt4">
    <div class="container">

        <div class="section-title text-center mb-5">
            <h3>Semua Layanan</h3>
            <p>Temukan Semua Layanan yang Kami Tawarkan</p>
            <div class="line-mf"></div>
        </div>

        <div class="row">

            <?php if (empty($layanan)): ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Layanan belum tersedia.
                    </div>
                    <a href="<?= base_url(); ?>" class="btn btn-primary mt-3">
                        <i class="fas fa-home me-2"></i> Kembali ke Home
                    </a>
                </div>
            <?php else: ?>
                <?php foreach ($layanan as $l): ?>
                    <div class="col-md-4 mb-4">
                        <div class="work-box">

                            <!-- IMAGE / ICON -->
                            <div class="work-img">
                                <?php if (!empty($l->gambar)): ?>
                                    <img src="<?= base_url('gambar/layanan/' . $l->gambar); ?>" class="img-fluid"
                                        alt="<?= htmlspecialchars($l->nama ?? ''); ?>">
                                <?php else: ?>
                                    <div class="service-icon">
                                        <i class="<?= $l->icon ?? 'ion-ios-gear'; ?>"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- CONTENT -->
                            <div class="work-content p-3">
                                <h2 class="w-title">
                                    <?= htmlspecialchars($l->nama ?? ''); ?>
                                </h2>

                                <span class="w-category">
                                    <?= htmlspecialchars($l->kategori ?? 'Service'); ?>
                                </span>

                                <p class="service-desc mt-2">
                                    <?= !empty($l->deskripsi_singkat)
                                        ? htmlspecialchars($l->deskripsi_singkat)
                                        : character_limiter(strip_tags($l->deskripsi ?? ''), 120); ?>
                                </p>

                                <div class="view-details mt-3">
                                    <a href="<?= site_url('layanan/' . $l->slug); ?>" class="btn-view">
                                        Lihat Detail
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>
</section>

<style>
    /* ================= BUTTON VIEW DETAIL (FORCE STYLE) ================= */

    .view-details {
        margin-top: 14px;
        text-align: center;
    }

    /* paksa agar tidak ketimpa bootstrap / theme */
    .view-details .btn-view {
        display: inline-flex !important;
        align-items: center !important;
        gap: 10px !important;

        padding: 10px 26px !important;
        border-radius: 40px !important;

        font-size: 14px !important;
        font-weight: 600 !important;

        color: #00c3ff !important;
        border: 2px solid #00c3ff !important;
        background: transparent !important;

        text-decoration: none !important;
        transition: all 0.35s ease !important;
    }

    .view-details .btn-view i {
        font-size: 13px !important;
        transition: transform 0.35s ease !important;
    }

    /* hover effect */
    .view-details .btn-view:hover {
        background: #00c3ff !important;
        color: #ffffff !important;
    }

    .view-details .btn-view:hover i {
        transform: translateX(6px) !important;
    }

    /* ================= HEADER LAYANAN FIX ================= */

    .intro-single {
        min-height: 380px;
        /* PERBESAR TINGGI */
        padding: 120px 20px 100px;
        /* JARAK ATAS BAWAH */
        margin-top: 120px;
        position: relative;

        background-size: cover !important;
        background-position: center center !important;
        background-repeat: no-repeat !important;
    }

    /* Overlay lebih halus */
    .intro-single .overlay-mf {
        background: linear-gradient(rgba(0, 0, 0, 0.55),
                rgba(0, 0, 0, 0.65));
    }

    /* Judul lebih menonjol */
    .intro-title {
        font-size: 44px;
        font-weight: 800;
        color: #ffffff;
        text-shadow: 0 6px 18px rgba(0, 0, 0, .45);
    }

    /* Breadcrumb rapi */
    .breadcrumb {
        background: transparent;
        margin-top: 12px;
    }

    .breadcrumb-item a {
        color: #00d9ff;
        font-weight: 600;
    }

    .breadcrumb-item.active {
        color: #eaeaea;
    }
</style>