<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<!-- ================= HERO / INTRO ================= -->
<style>
    /* ===== GLOBAL MODERN STYLE ===== */
    .section-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-title h3 {
        font-size: 32px;
        font-weight: 700;
        text-transform: uppercase;
        color: #111;
    }

    .section-title p {
        color: #666;
    }

    .line-mf {
        width: 60px;
        height: 4px;
        background: linear-gradient(45deg, #00e5ff, #008cff);
        margin: 15px auto 0;
        border-radius: 10px;
    }

    /* ===== HERO ===== */
    .intro {
        padding: 150px 0;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .overlay-itro {
        background: rgba(0, 0, 0, 0.65);
        position: absolute;
        inset: 0;
    }

    .intro-content {
        position: relative;
        color: #fff;
        text-align: center;
    }

    .intro-title {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .text-slider {
        font-weight: 600;
        color: #00eaff;
    }

    /* ===== SERVICES ===== */
    .service-box {
        padding: 25px;
        background: rgba(255, 255, 255, 0.75);
        border-radius: 18px;
        text-align: center;
        margin-bottom: 30px;
        backdrop-filter: blur(10px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, .08);
        transition: 0.3s;
    }

    .service-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
    }

    .service-ico .ico-circle {
        width: 70px;
        height: 70px;
        background: linear-gradient(45deg, #00eaff, #007bff);
        color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 15px;
    }

    /* ===== COUNTERS ===== */
    .section-counter {
        padding: 80px 0;
        background-size: cover;
        position: relative;
        text-align: center;
    }

    .overlay-mf {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.75);
    }

    .counter-box {
        position: relative;
        z-index: 2;
        color: #fff;
    }

    .counter-ico .ico-circle {
        width: 60px;
        height: 60px;
        background: #00d9ff;
        color: #111;
        border-radius: 50%;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Row sebagai flex container */
    #work .row {
        display: flex;
        flex-wrap: wrap;
    }

    /* Kolom flex */
    #work .col-md-4 {
        display: flex;
    }

    /* Card utama */
    .work-box {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, .08);
        transition: .3s ease;
    }

    .work-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
    }

    /* Gambar seragam */
    .work-img img {
        width: 100%;
        height: 220px;
        /* KUNCI: tinggi sama */
        object-fit: cover;
        /* biar tidak gepeng */
    }

    /* Konten */
    .work-content {
        flex: 1;
        /* isi ruang tersisa */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Judul dibatasi agar rapi */
    .w-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 6px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* maksimal 2 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Button selalu di bawah */
    .view-details {
        margin-top: auto;
    }

    /* ===== TESTIMONIAL ===== */
    .testimonials {
        padding: 80px 0;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .testimonials .overlay-mf {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .testimonial-box {
        position: relative;
        z-index: 2;
        background: #ffffff;
        /* Tidak ada efek kaca */
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.12);
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .testimonial-box:hover {
        transform: translateY(-6px);
        box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.18);
    }

    .author-test {
        margin-bottom: 15px;
    }

    .author-test img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #00c3ff;
        /* Lebih rapi dan modern */
    }

    .author-test .author {
        display: block;
        margin-top: 10px;
        font-weight: 600;
        font-size: 16px;
        color: #222;
    }

    .testimonial-box .description {
        color: #555;
        font-size: 15px;
        line-height: 1.6;
        margin-top: 10px;
    }

    /* ===== BLOG ===== */
    .card-blog {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .1);
        transition: 0.3s;
    }

    .card-blog:hover {
        transform: translateY(-7px);
    }

    .card-img img {
        width: 100%;
    }

    .category {
        background: #00bfff;
        color: white;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 13px;
    }

    .artikel-grid .card-blog {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .artikel-grid .card-blog:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.12);
    }

    /* Gambar agar selalu rapi */
    .card-blog .card-img img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
    }

    /* Body */
    .card-blog .card-body {
        padding: 20px;
        flex-grow: 1;
    }

    /* Category label */
    .card-blog .category {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        background: #00c3ff;
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    /* Title */
    .card-blog .card-title {
        font-size: 20px;
        line-height: 1.3;
        margin-top: 10px;
        margin-bottom: 0;
    }

    .card-blog .card-title a {
        color: #222;
        text-decoration: none;
    }

    .card-blog .card-title a:hover {
        color: #00c3ff;
    }

    /* Footer sejajar bawah */
    .card-blog .card-footer {
        padding: 15px 20px;
        background: #f8f8f8;
        font-size: 13px;
        color: #666;
        border-top: 1px solid #eee;
    }

    .section-heading {
        font-size: 36px;
        font-weight: 800;
        color: #fff;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .section-subtitle {
        color: #eaeaea;
        font-size: 16px;
        margin-top: 8px;
    }

    .line-mf {
        width: 60px;
        height: 4px;
        background: #00c3ff;
        margin: 18px auto 0;
        border-radius: 2px;
    }

    .btn-view-link {
        text-decoration: none;
        display: inline-block;
    }

    .btn-view-all {
        display: inline-flex;
        align-items: center;
        gap: 10px;

        font-size: 15px;
        font-weight: 600;
        color: #00c3ff;

        text-decoration: none;
        padding: 10px 26px;
        border-radius: 30px;
        border: 2px solid #00c3ff;

        transition: all .35s ease;
    }

    /* hover effect */
    .btn-view-all:hover {
        background: #00c3ff;
        color: #fff;
    }

    /* icon animasi */
    .btn-view-all i {
        font-size: 14px;
        transition: transform .35s ease;
    }

    .btn-view-all:hover i {
        transform: translateX(6px);
    }


    
    .btn-outline-custom {
        border: 2px solid #ffffff;
        color: #ffffff;
        padding: 12px 32px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        background: transparent;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all .35s ease;
        text-decoration: none;
    }

    .btn-outline-custom i {
        transition: transform .35s ease;
    }

    .btn-outline-custom:hover {
        background: #00c3ff;
        border-color: #00c3ff;
        color: #fff;
    }

    .btn-outline-custom:hover i {
        transform: translateX(4px);
    }

    /* HILANGKAN UNDERLINE TOTAL */
    .btn-outline-custom,
    .btn-outline-custom:hover {
        text-decoration: none !important;
    }
    .view-details {
    margin-top: 12px;
}

.btn-view {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 18px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    color: #007bff;
    border: 2px solid #007bff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-view i {
    font-size: 13px;
    transition: transform 0.3s ease;
}

.btn-view:hover {
    background: #007bff;
    color: #fff;
}

.btn-view:hover i {
    transform: translateX(4px);
}

</style>

<!-- ================= HERO ================= -->
<div id="home" class="intro bg-image"
    style="background-image: url('<?= base_url(); ?>assets_frontend/assets/img/html.jpg')">
    <div class="overlay-itro"></div>
    <div class="container intro-content">
        <p class="display-6">Selamat Datang</p>
        <h1 class="intro-title"><?= $pengaturan->nama; ?></h1>
        <p class="intro-subtitle">
            <span class="text-slider-items">Web Developer, Web Designer, Frontend Developer, Graphic
                Designer</span>
            <strong class="text-slider"></strong>
        </p>
    </div>
</div>
<br>

<!-- ================= SERVICES ================= -->
<section id="service" class="services-mf route">
    <div class="container">
        <div class="section-title">
            <h3>Layanan</h3>
            <p>Layanan Yang Kami Tawarkan</p>
            <div class="line-mf"></div>
        </div>

        <div class="row">
            <?php foreach ($layanan as $item): ?>
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle">
                                <i class="<?= $item->icon; ?>"></i>
                            </span>
                        </div>

                        <h2 class="s-title"><?= $item->judul; ?></h2>

                        <p>
                            <?= word_limiter($item->deskripsi_singkat, 20); ?>
                        </p>

                        <div class="view-details mt-3">
                            <a href="<?= site_url('layanan/' . $item->slug); ?>" class="btn-view">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mb-4 mt-4">
            <a href="<?= site_url('layanan'); ?>" class="btn-view-all">
                Lihat Semua Layanan <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


<!-- ================= COUNTERS ================= -->
<div class="section-counter bg-image"
    style="background-image: url('<?= base_url(); ?>assets_frontend/assets/img/html3.jpg')">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="counter-box">
                    <div class="counter-ico"><span class="ico-circle"><i class="ion-checkmark-round"></i></span></div>
                    <p class="counter">25</p>
                    <span class="counter-text">WORKS COMPLETED</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="counter-box">
                    <div class="counter-ico"><span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
                    </div>
                    <p class="counter">2</p>
                    <span class="counter-text">YEARS EXPERIENCE</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="counter-box">
                    <div class="counter-ico"><span class="ico-circle"><i class="ion-ios-people"></i></span></div>
                    <p class="counter">15</p>
                    <span class="counter-text">TOTAL CLIENTS</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="counter-box">
                    <div class="counter-ico"><span class="ico-circle"><i class="ion-ribbon-a"></i></span></div>
                    <p class="counter">5</p>
                    <span class="counter-text">AWARDS WON</span>
                </div>
            </div>

        </div>
    </div>
</div>
<br>

<!-- ================= PORTFOLIO ================= -->
<section id="work" class="portfolio-mf sect-pt4">
    <div class="container">
        <div class="section-title">
            <h3>Portfolio</h3>
            <p>Kumpulan karya terbaik yang kami buat.</p>
            <div class="line-mf"></div>
        </div>

        <div class="row">
            <?php
            // Ambil portofolio publish dari database (tampilkan hanya 3 atau 6 di homepage)
            $portofolio = $this->db->limit(6)->get_where('portofolio', ['status' => 'publish'])->result();
            foreach ($portofolio as $p):
                ?>
                <div class="col-md-4 mb-4">
                    <div class="work-box">
                        <div class="work-img">
                            <img src="<?= base_url('gambar/portofolio/' . $p->gambar); ?>" class="img-fluid"
                                alt="<?= $p->judul; ?>">
                        </div>
                        <div class="work-content p-3">
                            <h2 class="w-title"><?= $p->judul; ?></h2>
                            <span class="w-category"><?= $p->kategori; ?></span> /
                            <span class="w-date"><?= $p->tahun; ?></span>
                            <div class="view-details mt-2">
                                <a href="<?= site_url('portofolio/' . $p->slug); ?>" class="btn-view">
                                    Lihat Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mb-4">
            <a href="<?= site_url('portofolio'); ?>" class="btn-view-all">
                Lihat Semua Project <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- ================= TESTIMONIAL ================= -->
<div class="section-title text-center mb-5">
    <h3 class="section-heading">TESTIMONIAL</h3>
    <p class="section-subtitle">Apa kata mereka tentang kami</p>
    <div class="line-mf"></div>
</div>
<div class="testimonials bg-image"
    style="background-image: url('<?= base_url(); ?>assets_frontend/assets/img/html2.jpg')">
    <div class="overlay-mf"></div>
    <div class="container">

        <div class="owl-carousel owl-theme" id="testimonial-mf">

            <?php if (!empty($testimonial)): ?>
                <?php foreach ($testimonial as $t): ?>
                    <div class="testimonial-box">
                        <div class="author-test">
                            <img src="<?= base_url('gambar/testimonial/' . $t->foto); ?>" class="rounded-circle img-fluid"
                                style="width: 150px; height: 150px; object-fit:cover;">
                            <span class="author"><?= htmlspecialchars($t->nama); ?></span>
                        </div>
                        <p class="description lead">
                            <?= htmlspecialchars($t->pesan); ?>
                        </p>
                    </div>
                    <br>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>

</div>
<div class="text-center mt-4">
    <a href="<?= base_url('testimonial'); ?>" class="btn-outline-custom btn-lg">
        <i class="fas fa-comments"></i> Lihat Semua Testimonial
    </a>
</div>


<br>
<!-- ================= BLOG ================= -->
<section id="blog" class="blog-mf sect-pt4">
    <div class="container">
        <div class="section-title text-center">
            <h3>BERITA</h3>
            <p>Artikel terbaru dari kami</p>
            <div class="line-mf"></div>
        </div>

        <div class="row g-4 artikel-grid">
            <?php foreach ($artikel as $a): ?>
                <div class="col-md-4 d-flex">
                    <div class="card card-blog flex-fill d-flex flex-column h-100">

                        <div class="card-img">
                            <a href="<?= base_url('artikel/' . $a->artikel_slug); ?>">
                                <img src="<?= base_url('gambar/artikel/' . $a->artikel_sampul); ?>" class="img-fluid"
                                    alt="<?= $a->artikel_judul; ?>">
                            </a>
                        </div>

                        <div class="card-body flex-grow-1">
                            <a href="<?= base_url('kategori/' . $a->kategori_slug); ?>">
                                <span class="category"><?= $a->kategori_nama; ?></span>
                            </a>
                            <h3 class="card-title">
                                <a href="<?= base_url('artikel/' . $a->artikel_slug); ?>"><?= $a->artikel_judul; ?></a>
                            </h3>
                            <p class="text-muted small mt-2"><?= substr($a->artikel_konten, 0, 100); ?>...</p>
                        </div>

                        <div class="card-footer mt-auto">
                            <small><?= $a->pengguna_nama; ?> — <?= date('d M Y', strtotime($a->artikel_tanggal)); ?></small>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<br>