<!-- File: application/views/frontend/portfolio_detail.php -->
<?php
// Pastikan data tersedia
if (!isset($portofolio) || empty($portofolio)) {
    show_404();
    exit;
}
?>

<!-- CSS Styling -->
<style>
    /* ==============================
   HEADER SECTION
============================== */
    .intro-single {
        background-size: cover;
        background-position: center;
        padding: 100px 20px 90px;
        margin-top: 120px !important;
        position: relative;
        text-align: center;
        z-index: 5;
        width: 100%;
        margin-left: 0px;
        margin-right: 0px;
    }

    .intro-single .overlay-mf {
        background: rgba(0, 0, 0, 0.45);
        position: absolute;
        inset: 0;
    }

    .intro-content {
        position: relative;
        z-index: 10;
    }

    .intro-title {
        font-size: 46px;
        font-weight: 800;
        color: #fff;
        letter-spacing: 1px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    /* Breadcrumb */
    .breadcrumb {
        margin-top: 15px;
        background: transparent;
        z-index: 10;
        position: relative;
    }

    .breadcrumb-item a {
        color: #00d9ff;
        font-weight: 600;
    }

    .breadcrumb-item.active {
        color: #e8e8e8;
    }

    /* navbar fix */
    header,
    .navbar,
    .navbar-custom {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999 !important;
    }

    /* Animations */
    @keyframes fadeDown {
        from {
            transform: translateY(-15px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes fadeUp {
        from {
            transform: translateY(10px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* ==============================
   PORTFOLIO DETAIL WRAPPER
============================== */
    .portfolio-wrapper {
        padding: 70px 0;
    }

    /* Portfolio Box */
    .portfolio-box {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        margin-bottom: 45px;
        transition: 0.35s ease;
        animation: fadeIn .6s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .portfolio-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
    }

    /* Portfolio Thumb */
    .portfolio-thumb img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        object-position: center;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    /* ==============================
   JUDUL PORTFOLIO
============================== */
    .portfolio-title {
        font-size: 32px;
        font-weight: 800;
        margin-top: 10px;
        margin-bottom: 18px;
        color: #222;
    }

    /* ==============================
   META PORTFOLIO
============================== */
    .portfolio-meta ul {
        list-style: none;
        padding: 0;
        margin-bottom: 25px;
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .portfolio-meta li {
        font-size: 14px;
        font-weight: 500;
        color: #666;
        display: flex;
        align-items: center;
    }

    .portfolio-meta li span {
        font-size: 18px;
        color: #00c3ff;
        margin-right: 6px;
    }

    /* ==============================
   KONTEN PORTFOLIO
============================== */
    .portfolio-content {
        font-size: 17px;
        line-height: 1.9;
        color: #333;
    }

    .portfolio-content p {
        margin-bottom: 18px;
    }

    /* Info Box */
    .info-box {
        background: #f8f9fa;
        border-left: 4px solid #00c3ff;
        padding: 20px;
        border-radius: 8px;
        margin: 25px 0;
    }

    .info-box h5 {
        color: #222;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .info-box ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-box li {
        padding: 5px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }

    .info-box li:last-child {
        border-bottom: none;
    }

    .info-box .label {
        color: #666;
        font-weight: 500;
    }

    .info-box .value {
        color: #222;
        font-weight: 600;
    }

    /* ==============================
   RELATED PROJECTS
============================== */
    .related-projects {
        margin-top: 50px;
        padding-top: 40px;
        border-top: 1px solid #eee;
    }

    .related-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #222;
    }

    .related-item {
        margin-bottom: 20px;
    }

    .related-item a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        padding: 10px;
        border-radius: 8px;
    }

    .related-item a:hover {
        background: #f8f9fa;
        transform: translateX(5px);
    }

    .related-item img {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 15px;
    }

    .related-item h6 {
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #222;
    }

    .related-item p {
        font-size: 13px;
        color: #666;
        margin: 0;
    }

    /* ==============================
   SIDEBAR
============================== */
    .sidebar-box {
        background: #fff;
        padding: 22px;
        border-radius: 14px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        animation: fadeIn .6s ease-out;
    }

    .sidebar-box h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    /* ==============================
   ACTION BUTTONS
============================== */
    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #eee;
    }

    .btn-portfolio {
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-back {
        background: transparent;
        border: 2px solid #00c3ff;
        color: #00c3ff;
    }

    .btn-back:hover {
        background: #00c3ff;
        color: white;
    }

    .btn-share {
        background: transparent;
        border: 2px solid #6c757d;
        color: #6c757d;
    }

    .btn-share:hover {
        background: #6c757d;
        color: white;
    }

    /* ==============================
   RESPONSIVE
============================== */
    @media (max-width: 768px) {
        .intro-single {
            height: 38vh;
            padding-top: 200px;
        }

        .intro-title {
            font-size: 32px;
        }

        .portfolio-title {
            font-size: 24px;
        }

        .portfolio-meta ul {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .portfolio-thumb img {
            height: 250px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<!-- HTML Structure -->
<div class="intro intro-single route bg-image"
    style="background-image: url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
    <div class="overlay-mf">
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <br>
                    <h2 class="intro-title mb-4">Detail Portfolio</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('portofolio'); ?>">Portfolio</a>
                        </li>
                        <li class="breadcrumb-item active"><?= htmlspecialchars($portofolio->judul); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="portfolio-wrapper sect-pt4" id="portfolio">
    <div class="container">
        <div class="row">
            <!-- KONTEN PORTFOLIO -->
            <div class="col-md-8">
                <div class="portfolio-box">
                    <div class="portfolio-thumb">
                        <?php if (!empty($portofolio->gambar)): ?>
                            <img src="<?= base_url('gambar/portofolio/' . $portofolio->gambar); ?>" class="img-fluid"
                                alt="<?= htmlspecialchars($portofolio->judul); ?>">
                        <?php else: ?>
                            <div
                                style="height: 400px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                                <span class="text-muted">No Image Available</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="portfolio-meta">
                        <h1 class="portfolio-title"><?= htmlspecialchars($portofolio->judul); ?></h1>
                        <ul>
                            <li>
                                <span class="ion-ios-folder"></span>
                                <a href="#"><?= htmlspecialchars($portofolio->kategori); ?></a>
                            </li>
                            <li>
                                <span class="ion-ios-calendar"></span>
                                <span><?= $portofolio->tahun; ?></span>
                            </li>
                            <li>
                                <span class="ion-ios-time"></span>
                                <span><?= date('d M Y', strtotime($portofolio->created_at)); ?></span>
                            </li>
                        </ul>
                    </div>

                    <!-- Project Info Box -->
                    <div class="info-box">
                        <h5>Project Information</h5>
                        <ul>
                            <li>
                                <span class="label">Category:</span>
                                <span class="value"><?= htmlspecialchars($portofolio->kategori); ?></span>
                            </li>
                            <li>
                                <span class="label">Year:</span>
                                <span class="value"><?= $portofolio->tahun; ?></span>
                            </li>
                            <li>
                                <span class="label">Completed:</span>
                                <span class="value"><?= date('d F Y', strtotime($portofolio->created_at)); ?></span>
                            </li>
                            <li>
                                <span class="label">Status:</span>
                                <span class="value badge bg-success"><?= ucfirst($portofolio->status); ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="portfolio-content">
                        <?= !empty($portofolio->deskripsi)
                            ? strip_tags($portofolio->deskripsi, '<p><br><b><strong><i><ul><ol><li>')
                            : '<p>No description available.</p>'; ?>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="<?= site_url('portofolio'); ?>" class="btn btn-portfolio btn-back">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                        <button class="btn btn-portfolio btn-share" onclick="sharePortfolio()">
                            <i class="fas fa-share-alt me-2"></i> Bagikan
                        </button>
                    </div>

                    <!-- Related Projects -->
                    <?php if (!empty($related)): ?>
                        <div class="related-projects">
                            <h3 class="related-title">Related Projects</h3>
                            <?php foreach ($related as $item): ?>
                                <div class="related-item">
                                    <a href="<?= site_url('portofolio/' . $item->slug); ?>">
                                        <?php if (!empty($item->gambar)): ?>
                                            <img src="<?= base_url('gambar/portofolio/' . $item->gambar); ?>"
                                                alt="<?= htmlspecialchars($item->judul); ?>">
                                        <?php else: ?>
                                            <div
                                                style="width: 80px; height: 60px; background: #f0f0f0; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                                <span class="text-muted" style="font-size: 10px;">No Image</span>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <h6><?= htmlspecialchars($item->judul); ?></h6>
                                            <p><?= $item->kategori; ?> • <?= $item->tahun; ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">
                <?php if (file_exists(APPPATH . 'views/frontend/v_sidebar.php')): ?>
                    <?php $this->load->view('frontend/v_sidebar'); ?>
                <?php else: ?>
                    <!-- Default Sidebar if v_sidebar doesn't exist -->
                    <div class="sidebar-box">
                        <h3>Portfolio Categories</h3>
                        <ul class="list-unstyled">
                            <?php
                            // Ambil kategori unik dari portofolio
                            $this->load->model('M_data');
                            $categories = $this->db->select('kategori')->distinct()->get_where('portofolio', ['status' => 'publish'])->result();
                            ?>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $cat): ?>
                                    <li><a href="#"><?= htmlspecialchars($cat->kategori); ?></a></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No categories available</li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="sidebar-box">
                        <h3>Recent Projects</h3>
                        <?php
                        $recent = $this->db->limit(3)->order_by('created_at', 'DESC')->get_where('portofolio', ['status' => 'publish'])->result();
                        ?>
                        <?php if (!empty($recent)): ?>
                            <?php foreach ($recent as $item): ?>
                                <div class="post-item mb-3">
                                    <a href="<?= site_url('portofolio/' . $item->slug); ?>" class="d-flex text-decoration-none">
                                        <?php if (!empty($item->gambar)): ?>
                                            <img src="<?= base_url('gambar/portofolio/' . $item->gambar); ?>" width="60" height="50"
                                                style="object-fit: cover; border-radius: 5px; margin-right: 10px;"
                                                alt="<?= htmlspecialchars($item->judul); ?>">
                                        <?php endif; ?>
                                        <div>
                                            <h6 style="font-size: 14px; margin-bottom: 5px;"><?= htmlspecialchars($item->judul); ?>
                                            </h6>
                                            <small class="text-muted"><?= date('d M Y', strtotime($item->created_at)); ?></small>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted">No recent projects available</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Ion Icons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<script>
    function sharePortfolio() {
        if (navigator.share) {
            navigator.share({
                title: '<?= addslashes($portofolio->judul); ?>',
                text: 'Check out this portfolio project: <?= addslashes($portofolio->judul); ?>',
                url: window.location.href,
            })
                .then(() => console.log('Shared successfully'))
                .catch((error) => console.log('Error sharing:', error));
        } else {
            // Fallback for browsers that don't support Web Share API
            alert('Copy this link to share: ' + window.location.href);
        }
    }
</script>