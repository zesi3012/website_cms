<?php
if (!isset($layanan) || empty($layanan)) {
    show_404();
    exit;
}
?>

<!-- ===============================
STYLE
=============================== -->
<style>
    .intro-single {
        min-height: 55vh;
        background-size: cover;
        background-position: center;
        position: relative;
        margin-top: 100px;
    }

    .overlay-mf {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .55);
    }

    .intro-content {
        position: relative;
        z-index: 2;
        color: #fff;
    }

    .intro-title {
        font-size: 42px;
        font-weight: 800;
    }

    .breadcrumb-wrapper {
        display: inline-block;
        backdrop-filter: blur(8px);
        background: rgba(255, 255, 255, .15);
        padding: 8px 20px;
        border-radius: 30px;
    }

    .breadcrumb a {
        color: #00e1ff;
    }

    .service-detail-box {
        background: #fff;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, .08);
    }

    .service-icon-lg {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 48px;
        margin: auto;
    }

    .portfolio-title {
        font-size: 32px;
        font-weight: 800;
        text-align: center;
        margin-bottom: 20px;
    }

    .service-meta {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .meta-chip {
        background: #f1f3f5;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .meta-chip.success {
        background: #e6f9f0;
        color: #198754;
    }

    .info-box {
        background: #f8f9fa;
        border-left: 4px solid #00c6ff;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .info-box ul {
        list-style: none;
        padding: 0;
    }

    .info-box li {
        display: flex;
        justify-content: space-between;
        padding: 6px 0;
        border-bottom: 1px solid #eaeaea;
    }

    .info-box li:last-child {
        border-bottom: none;
    }

    .service-description {
        font-size: 16px;
        line-height: 1.9;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #eee;
    }

    .btn-portfolio {
        padding: 10px 26px;
        border-radius: 30px;
        font-weight: 600;
        transition: all .3s ease;
    }

    .btn-back {
        border: 2px solid #00c3ff;
        color: #00c3ff;
        background: transparent;
    }

    .btn-back:hover {
        background: #00c3ff;
        color: #fff;
    }

    .btn-share {
        border: 2px solid #6c757d;
        color: #6c757d;
        background: transparent;
    }

    .btn-share:hover {
        background: #6c757d;
        color: #fff;
    }
</style>

<!-- ===============================
HERO / HEADER
=============================== -->
<div class="intro intro-single bg-image"
    style="background-image:url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content d-flex align-items-center text-center">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 class="intro-title mb-3">
                <?= htmlspecialchars($layanan->nama ?? 'Detail Layanan'); ?>
            </h1>

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('layanan'); ?>">Layanan</a>
                    </li>
                    <li class="breadcrumb-item active text-white">
                        <?= htmlspecialchars($layanan->nama ?? 'Detail'); ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- ===============================
CONTENT
=============================== -->
<section class="portfolio-wrapper sect-pt4">
    <div class="container">
        <div class="row">

            <!-- MAIN -->
            <div class="col-md-8">
                <div class="service-detail-box">

                    <!-- ICON / IMAGE -->
                    <div class="text-center mb-4">
                        <?php if (!empty($layanan->gambar)): ?>
                            <img src="<?= base_url('gambar/layanan/' . $layanan->gambar); ?>"
                                class="img-fluid rounded-4 shadow-sm" alt="<?= htmlspecialchars($layanan->nama ?? ''); ?>">
                        <?php else: ?>
                            <div class="service-icon-lg">
                                <i class="<?= $layanan->icon ?? 'ion-ios-gear'; ?>"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- TITLE -->
                    <h1 class="portfolio-title">
                        <?= htmlspecialchars($layanan->nama ?? ''); ?>
                    </h1>

                    <!-- META -->
                    <div class="service-meta">
                        <span class="meta-chip">
                            <i class="ion-ios-gear"></i>
                            <?= htmlspecialchars($layanan->kategori ?? 'Service'); ?>
                        </span>
                        <span class="meta-chip">
                            <i class="ion-ios-time"></i>
                            <?= !empty($layanan->created_at)
                                ? date('d M Y', strtotime($layanan->created_at))
                                : '-'; ?>
                        </span>
                        <span class="meta-chip success">
                            <i class="ion-ios-checkmark"></i>
                            <?= ucfirst($layanan->status ?? ''); ?>
                        </span>
                    </div>

                    <!-- INFO -->
                    <div class="info-box">
                        <h5>Informasi Layanan</h5>
                        <ul>
                            <li><span>Nama</span><strong><?= htmlspecialchars($layanan->nama ?? '-'); ?></strong></li>
                            <li><span>Kategori</span><strong><?= htmlspecialchars($layanan->kategori ?? '-'); ?></strong>
                            </li>
                            <li><span>Status</span><strong><?= ucfirst($layanan->status ?? '-'); ?></strong></li>
                            <li>
                                <span>Dipublish</span>
                                <strong>
                                    <?= !empty($layanan->created_at)
                                        ? date('d F Y', strtotime($layanan->created_at))
                                        : '-'; ?>
                                </strong>
                            </li>
                        </ul>
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="service-description">
                        <?= !empty($layanan->deskripsi)
                            ? strip_tags($layanan->deskripsi, '<p><br><b><strong><i><ul><ol><li>')
                            : '<p>Deskripsi layanan belum tersedia.</p>'; ?>
                    </div>

                    <!-- ACTION -->
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="<?= site_url('layanan'); ?>" class="btn btn-portfolio btn-back">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Layanan
                        </a>
                        <button class="btn btn-portfolio btn-share" onclick="shareLayanan()">
                            <i class="fas fa-share-alt me-2"></i> Bagikan Layanan
                        </button>
                    </div>


                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">
                <?php if (file_exists(APPPATH . 'views/frontend/v_sidebar.php')) {
                    $this->load->view('frontend/v_sidebar');
                } ?>
            </div>

        </div>
    </div>
</section>

<!-- ===============================
SCRIPT
=============================== -->
<script>
    function shareLayanan() {
        if (navigator.share) {
            navigator.share({
                title: '<?= addslashes($layanan->nama ?? ''); ?>',
                text: 'Lihat layanan kami: <?= addslashes($layanan->nama ?? ''); ?>',
                url: window.location.href
            });
        } else {
            alert('Salin link ini untuk berbagi:\n' + window.location.href);
        }
    }
</script>