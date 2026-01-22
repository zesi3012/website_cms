<!-- ================= HERO SECTION (MODERN) ================= -->
<div class="intro-modern bg-image" 
     style="background-image: url('<?= base_url();?>assets_frontend/assets/img/freepik.jpg');">
    <div class="intro-overlay"></div>

    <div class="intro-content">
        <h2 class="intro-title">Halaman</h2>

        <div class="breadcrumb-modern">
            <a href="<?= base_url(); ?>" class="bc-link">Home</a>
            <span class="bc-divider">/</span>
            <span class="bc-current">Halaman</span>
        </div>
    </div>
</div>

<!-- ================= CONTENT SECTION ================= -->
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-10">

                <?php if (count($halaman) == 0) { ?>
                    <div class="empty-box">
                        <h3>Halaman Tidak Ditemukan</h3>
                    </div>
                <?php } ?>

                <?php foreach ($halaman as $h) { ?>
                    <div class="content-box">
                        <h1 class="page-title"><?= $h->halaman_judul; ?></h1>
                        <div class="separator"></div>

                        <div class="page-content">
                            <?= $h->halaman_konten; ?>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>
</section>


<!-- ================= STYLE ================= -->
<style>
/* ---------- HERO MODERN ---------- */
.intro-modern {
    width: 100%;
    padding: 140px 20px;
    background-size: cover;
    background-position: center;
    position: relative;
    text-align: center;
    margin-top: 80px;
}

.intro-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(20, 20, 20, 0.55);
    backdrop-filter: blur(4px);
}

.intro-content {
    position: relative;
    z-index: 5;
    color: #fff;
    animation: fadeInUp 1s ease;
}

.intro-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 15px;
}

/* ---------- BREADCRUMB MODERN ---------- */
.breadcrumb-modern {
    color: #eee;
    font-size: 16px;
}

.bc-link {
    color: #ffffff;
    font-weight: 500;
    text-decoration: none;
}

.bc-link:hover {
    color: #00e0ff;
}

.bc-divider {
    margin: 0 8px;
    color: #ddd;
}

.bc-current {
    color: #00e0ff;
    font-weight: 600;
}

/* ---------- PAGE CONTENT ---------- */
.page-section {
    padding: 60px 0 80px;
}

.content-box {
    background: #fff;
    padding: 40px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,.08);
    animation: fadeIn 0.8s ease;
    margin-bottom: 40px;
}

.page-title {
    font-size: 32px;
    font-weight: 700;
    text-align: center;
}

.separator {
    width: 80px;
    height: 4px;
    background: #00d8ff;
    margin: 15px auto 30px;
    border-radius: 10px;
}

.page-content {
    font-size: 18px;
    color: #555;
    line-height: 1.7;
}

/* ---------- EMPTY MESSAGE ---------- */
.empty-box {
    text-align: center;
    padding: 60px 0;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Mobile Fix */
@media(max-width: 768px) {
    .intro-title { font-size: 36px; }
    .content-box { padding: 25px; }
}
</style>
