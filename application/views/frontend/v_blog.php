<style>
.intro-single {
    background-size: cover;
    background-position: center;
    padding: 80px 0 70px;
    position: relative;
}

.intro-single .overlay-mf {
    background: rgba(0, 0, 0, 0.45);
    position: absolute;
    inset: 0;
    z-index: 1 !important;
    pointer-events: none !important;
}

.intro-title,
.breadcrumb {
    position: relative;
    z-index: 5 !important;
}

.intro-title {
    text-align: center;
    font-size: 46px;
    font-weight: 800;
    color: #fff;
    letter-spacing: 1px;
    text-shadow: 0 4px 12px rgba(0,0,0,0.4);
    animation: fadeDown .8s ease-out;
}

.breadcrumb {
    margin-top: 15px;
}

.breadcrumb-item a {
    color: #00d9ff;
    font-weight: 600;
}

.breadcrumb-item.active {
    color: #e8e8e8;
}

.post-box {
    background: #fff;
    padding: 25px 25px 30px;
    border-radius: 18px;
    margin-bottom: 40px;
    box-shadow: 0 8px 26px rgba(0,0,0,0.06);
    border: 1px solid #f1f1f1;
    transition: .35s ease;
}

.post-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.12);
}

.post-thumb img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    object-position: center;
    border-radius: 14px;
    margin-bottom: 20px;
}

.artikel-title {
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 10px;
    color: #222;
    transition: 0.3s;
}

.artikel-title:hover {
    color: #009dff;
}

.post-meta ul {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 25px;
    margin: 12px 0 25px;
}

.post-meta li {
    font-size: 14px;
    font-weight: 500;
    color: #666;
    display: flex;
    align-items: center;
    gap: 6px;
}

.post-meta li span {
    color: #00bfff;
    font-size: 18px;
}

.article-content {
    font-size: 17px;
    line-height: 1.85;
    color: #333;
}

.blog-wrapper {
    margin-top: 70px;
}

@media (max-width: 768px) {
    .intro-title { font-size: 32px; }
    .post-thumb img { height: 240px; }
    .artikel-title { font-size: 24px; }
    .blog-wrapper { margin-top: 40px; }
}


</style>

<style>
.intro-single {
    background-size: cover;
    background-position: center;
    padding: 80px 0 70px;
    position: relative;
}

.intro-single .overlay-mf {
    background: rgba(0, 0, 0, 0.45); /* Hanya overlay gelap */
    position: absolute;
    inset: 0;
}

.intro-title {
    font-size: 46px;
    font-weight: 800;
    color: #fff;
    letter-spacing: 1px;
    text-shadow: 0 4px 12px rgba(0,0,0,0.4);
    animation: fadeDown .8s ease-out;
}

.breadcrumb {
    margin-top: 15px;
}

.breadcrumb-item a {
    color: #00d9ff;
    font-weight: 600;
}

.breadcrumb-item.active {
    color: #e8e8e8;
}

.post-box {
    background: #fff;
    padding: 25px 25px 30px;
    border-radius: 18px;
    margin-bottom: 40px;
    box-shadow: 0 8px 26px rgba(0,0,0,0.06);
    transition: .35s ease;
    border: 1px solid #f1f1f1;
}

.post-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.12);
}

.post-thumb img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    object-position: center;
    border-radius: 14px;
    margin-bottom: 20px;
}

.artikel-title {
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 10px;
    color: #222;
    transition: 0.3s;
}

.artikel-title:hover {
    color: #009dff;
}

.post-meta ul {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 25px;
    margin: 12px 0 25px;
}

.post-meta li {
    font-size: 14px;
    font-weight: 500;
    color: #666;
    display: flex;
    align-items: center;
    gap: 6px;
}

.post-meta li span {
    color: #00bfff;
    font-size: 18px;
}

.article-content {
    font-size: 17px;
    line-height: 1.85;
    color: #333;
}

@media (max-width: 768px) {
    .intro-title { font-size: 32px; }
    .post-thumb img { height: 240px; }
    .artikel-title { font-size: 24px; }
}

.read-more {
    text-align: center;
}

.read-more .btn-read {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 10px 26px;
    border-radius: 40px;

    font-size: 14px;
    font-weight: 600;

    color: #00c3ff;
    border: 2px solid #00c3ff;
    background: transparent;

    text-decoration: none;
    transition: all 0.35s ease;
}

.read-more .btn-read i {
    font-size: 13px;
    transition: transform 0.35s ease;
}

/* hover effect */
.read-more .btn-read:hover {
    background: #00c3ff;
    color: #ffffff;
}

.read-more .btn-read:hover i {
    transform: translateX(6px);
}
</style>

<br>
<br>
<br>
<div class="intro intro-single route bg-image"
     style="background-image: url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
     
    <div class="overlay-mf"></div>

    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">

                <h2 class="intro-title mb-4">Artikel Blog</h2>

                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(''); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('blog'); ?>">Berita</a>
                    </li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ol>

            </div>
        </div>
    </div>
</div>

<!-- ================= BLOG ================= -->
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">

            <!-- KONTEN UTAMA -->
            <div class="col-md-8">

                <?php if (empty($artikel)): ?>
                    <center class="mt-5">Artikel Tidak Ditemukan</center>
                <?php else: ?>
                    <?php foreach ($artikel as $a): ?>
                        <div class="post-box mb-4">

                            <!-- GAMBAR -->
                            <div class="post-thumb">
                                <?php if (!empty($a->artikel_sampul)): ?>
                                    <a href="<?= base_url('artikel/' . $a->artikel_slug); ?>">
                                        <img src="<?= base_url('gambar/artikel/' . $a->artikel_sampul); ?>"
                                             class="img-fluid"
                                             alt="<?= $a->artikel_judul; ?>">
                                    </a>
                                <?php endif; ?>
                            </div>

                            <!-- META -->
                            <div class="post-meta mt-2">
                                <h2 class="artikel-title">
                                    <a href="<?= base_url('artikel/' . $a->artikel_slug); ?>">
                                        <?= $a->artikel_judul; ?>
                                    </a>
                                </h2>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="ion-ios-person"></span> <?= $a->pengguna_nama; ?>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="ion-pricetag"></span>
                                        <a href="<?= base_url('kategori/' . $a->kategori_slug); ?>">
                                            <?= $a->kategori_nama; ?>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="ion-ios-calendar-outline"></span>
                                        <?= date('d M Y', strtotime($a->artikel_tanggal)); ?>
                                    </li>
                                </ul>
                            </div>

                            <!-- KONTEN SINGKAT -->
                            <div class="article-content">
    <?= word_limiter(strip_tags($a->artikel_konten), 50); ?>
    <br>

    <div class="read-more mt-3 text-center">
        <a href="<?= base_url('artikel/' . $a->artikel_slug); ?>"
           class="btn-read">
            Baca Selengkapnya
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>


                        </div>
                    <?php endforeach; ?>

                    <!-- PAGINATION -->
                    <nav aria-label="Page Navigation">
                        <?= $this->pagination->create_links(); ?>
                    </nav>

                <?php endif; ?>

            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">

                <!-- ARTIKEL TERBARU -->
                <div class="widget-sidebar mb-4">
                    <h5 class="sidebar-title">Artikel Terbaru</h5>
                    <div class="sidebar-content">
                        <ul class="list-sidebar">
                            <?php
                            $artikel_terbaru = $this->db->select('artikel_slug, artikel_judul')
                                ->from('artikel')
                                ->where('artikel_status', 'publish')
                                ->order_by('artikel_id', 'DESC')
                                ->limit(5)
                                ->get()
                                ->result();
                            foreach ($artikel_terbaru as $at): ?>
                                <li>
                                    <a href="<?= base_url('artikel/' . $at->artikel_slug); ?>">
                                        <span class="ion-ios-paper-outline" style="margin-right:8px; color:#00c0ff;"></span>
                                        <?= $at->artikel_judul; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- SIDEBAR LAIN (opsional) -->
                <?php $this->load->view('frontend/v_sidebar'); ?>

            </div>

        </div>
    </div>
</section>
