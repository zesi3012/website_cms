<style>
.intro-single {
    margin-top: 110px !important; 
    padding: 80px 0 70px;
    background-size: cover;
    background-position: center;
    position: relative;
    text-align: center;
    z-index: 2;
}

@media (max-width: 768px) {
    .intro-single {
        margin-top: 130px !important; 
        padding: 70px 0 60px;
    }
}

.overlay-mf {
    background: rgba(0, 0, 0, 0.55);
    position: absolute;
    inset: 0;
}

.intro-title {
    font-size: 42px;
    font-weight: 800;
    color: #fff;
    position: relative;
    z-index: 5;
}

@media (max-width: 768px) {
    .intro-title {
        font-size: 30px;
    }
}

.breadcrumb {
    background: transparent;
    position: relative;
    z-index: 5;
    margin-top: 12px !important;
}

.breadcrumb-item a {
    color: #00e0ff;
    font-weight: 500;
    transition: .3s;
}

.breadcrumb-item a:hover {
    color: #fff;
}

.breadcrumb-item.active {
    color: #ddd;
}

.blog-wrapper {
    padding: 60px 0;
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

</style>

<div class="intro intro-single route bg-image" style="background
image: url(<?php echo base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h2 class="intro-title mb-4">Pencarian Artikel</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('blog'); ?>">Cari</a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $cari; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (count($artikel) == 0) { ?>
                    <center>
                        <h3>Belum Ada Artikel Pada kategori Ini.</h3>
                    </center>
                <?php } ?>
                <?php foreach ($artikel as $a) { ?>
                    <div class="post-box">
                        <div class="post-thumb">
                            <?php if ($a->artikel_sampul != "") { ?>
                                <img src="<?php echo base_url() . '/gambar/artikel/' . $a->
                                    artikel_sampul ?>" class="img-fluid" alt="<?php echo $a->
                                    artikel_judul ?>">
                            <?php } ?>
                        </div>
                        <div class="post-meta">
                            <a href="<?php echo base_url() . $a->artikel_slug; ?>">
                                <h1 class="article-title"><?php echo $a->artikel_judul; ?></h1>
                            </a>
                            <ul>
                                <li>
                                    <span class="ion-ios-person"></span>
                                    <a href=""><?php echo $a->pengguna_nama ?></a>
                                </li>
                                <li>
                                    <span class="ion-pricetag"></span>
                                    <a href="<?php echo base_url() . 'kategori/' . $a->kategori_slug;
                                    ?>"><?php echo $a->kategori_nama ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <nav aria-label="...">
                    <?php echo $this->pagination->create_links(); ?>
                </nav>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
    </div>
</section>