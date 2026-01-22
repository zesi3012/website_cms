<?php
// Pastikan data testimonial tersedia
if (!isset($testimonial) || empty($testimonial)) {
    show_404();
    exit;
}
?>

<style>
/* ==============================
   HEADER
============================== */
.intro-single {
    background-size: cover;
    background-position: center;
    padding: 100px 20px 90px;
    margin-top: 120px;
    position: relative;
    text-align: center;
}

.intro-single .overlay-mf {
    background: rgba(0,0,0,.45);
    position: absolute;
    inset: 0;
}

.intro-title {
    font-size: 44px;
    font-weight: 800;
    color: #fff;
}

/* ==============================
   TESTIMONIAL WRAPPER
============================== */
.testimonial-wrapper {
    padding: 70px 0;
}

.testimonial-box {
    background: rgba(255,255,255,.95);
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 8px 30px rgba(0,0,0,.08);
    margin-bottom: 40px;
    text-align: center;
    animation: fadeIn .6s ease;
}

@keyframes fadeIn {
    from {opacity:0; transform:translateY(15px);}
    to {opacity:1; transform:translateY(0);}
}

.author-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px;
}

.author-name {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 10px;
}

.testimonial-text {
    font-size: 18px;
    line-height: 1.8;
    color: #333;
}
.testimonial-date {
    font-size: 14px;
    color: #888;
    margin-bottom: 12px;
}


/* ==============================
   SIDEBAR
============================== */
.sidebar-box {
    background: #fff;
    padding: 22px;
    border-radius: 14px;
    box-shadow: 0 5px 25px rgba(0,0,0,.1);
    margin-bottom: 30px;
}

/* ==============================
   BUTTON
============================== */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 12px 30px;
    border-radius: 30px;

    border: 2px solid #00c3ff;
    background: transparent;
    color: #00c3ff;

    font-size: 15px;
    font-weight: 600;
    letter-spacing: .3px;

    text-decoration: none !important;
    outline: none;

    transition: all .35s ease;
}

/* Hover effect */
.btn-back:hover {
    background: linear-gradient(135deg, #00c3ff, #00a2d6);
    color: #fff;
    box-shadow: 0 8px 25px rgba(0,195,255,.35);
    transform: translateY(-2px);
    text-decoration: none !important;
}

/* Active (klik) */
.btn-back:active {
    transform: translateY(0);
    box-shadow: 0 4px 15px rgba(0,195,255,.25);
}

/* Focus (hilangkan garis biru browser) */
.btn-back:focus {
    outline: none;
    box-shadow: none;
}

/* Icon styling */
.btn-back i {
    font-size: 14px;
    transition: transform .3s ease;
}

.btn-back:hover i {
    transform: translateX(-3px);
}

}
</style>

<!-- ================= HEADER ================= -->
<div class="intro intro-single bg-image"
     style="background-image: url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <h2 class="intro-title">Testimonial</h2>
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="<?= base_url(); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">Testimonial</li>
        </ol>
    </div>
</div>

<!-- ================= CONTENT ================= -->
<section class="testimonial-wrapper">
    <div class="container">
        <div class="row">

            <!-- ===== CONTENT ===== -->
            <div class="col-md-8">
                <?php foreach ($testimonial as $t): ?>
                    <div class="testimonial-box">

                        <?php if (!empty($t->foto)): ?>
                            <img src="<?= base_url('gambar/testimonial/' . $t->foto); ?>"
                                 class="author-img"
                                 alt="<?= htmlspecialchars($t->nama); ?>">
                        <?php else: ?>
                            <img src="<?= base_url('assets_frontend/assets/img/user-default.png'); ?>"
                                 class="author-img"
                                 alt="No Photo">
                        <?php endif; ?>

                        <h4 class="author-name"><?= htmlspecialchars($t->nama); ?></h4>

<div class="testimonial-date">
    <i class="fas fa-calendar-alt"></i>
    <?= date('d F Y', strtotime($t->created_at)); ?>
</div>

<p class="testimonial-text">
    “<?= nl2br(htmlspecialchars($t->pesan)); ?>”
</p>


                    </div>
                <?php endforeach; ?>

                <div class="text-center mt-4">
                    <a href="<?= base_url(); ?>" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali ke Home
                    </a>
                </div>
            </div>

            <!-- ===== SIDEBAR ===== -->
            <div class="col-md-4">
                <?php if (file_exists(APPPATH.'views/frontend/v_sidebar.php')): ?>
                    <?php $this->load->view('frontend/v_sidebar'); ?>
                <?php else: ?>
                    <div class="sidebar-box">
                        <h5>Informasi</h5>
                        <p class="text-muted">
                            Halaman ini menampilkan testimonial dari klien & pengguna.
                        </p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- Font Awesome -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
