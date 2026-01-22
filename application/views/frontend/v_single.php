<style>
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
    text-shadow: 0 4px 12px rgba(0,0,0,0.4);
}

/* breadcrumb */
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
header, .navbar, .navbar-custom {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999 !important;
}

/* JUDUL */
.intro-title {
    font-size: 40px;
    font-weight: 800;
    color: #fff;
    position: relative;
    z-index: 10;
}

/* Breadcrumb */
.breadcrumb {
    background: transparent;
    padding: 0;
    margin-top: 12px;
    animation: fadeUp .8s ease-out;
    position: relative;
    z-index: 10;
}

.breadcrumb-item a {
    color: #00e0ff;
    font-weight: 500;
    transition: 0.3s;
}

.breadcrumb-item a:hover {
    color: #fff;
}

.breadcrumb-item.active {
    color: #e0e0e0;
}

/* Animations */
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

/* RESPONSIVE */
@media (max-width: 768px) {
    .intro-single {
        padding-top: 260px; /* header mobile LEBIH TINGGI */
        min-height: 40vh;
    }

    .intro-title {
        font-size: 32px;
    }
}


.breadcrumb {
    background: transparent;
    padding: 0;
    margin-top: 10px !important;
    z-index: 2;
    position: relative;
}

.breadcrumb-item a {
    color: #00e0ff;
    font-weight: 500;
    transition: 0.3s;
}

.breadcrumb-item.active {
    color: #e0e0e0;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .intro-single {
        padding-top: 200px; /* header mobile biasanya lebih tinggi */
        min-height: 40vh;
    }

    .intro-title {
        font-size: 32px;
    }
}

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

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-top: 12px;
        animation: fadeUp .8s ease-out;
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

    .breadcrumb-item a {
        color: #00e0ff;
        font-weight: 500;
        transition: 0.3s;
    }

    .breadcrumb-item a:hover {
        color: #fff;
    }

    .breadcrumb-item.active {
        color: #e0e0e0;
    }

    /* ==============================
   ARTICLE WRAPPER
============================== */
    .blog-wrapper {
        padding: 70px 0;
    }

    /* Card Artikel */
    .post-box {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        border-radius: 16px;
        padding: 30px;
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

    .post-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
    }

    .post-thumb img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    object-position: center;
    border-radius: 10px;
}




    /* ==============================
   JUDUL ARTIKEL
============================== */
    .article-title {
        font-size: 32px;
        font-weight: 800;
        margin-top: 10px;
        margin-bottom: 18px;
        color: #222;
    }

    /* ==============================
   META ARTIKEL
============================== */
    .post-meta ul {
        list-style: none;
        padding: 0;
        margin-bottom: 25px;
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .post-meta li {
        font-size: 14px;
        font-weight: 500;
        color: #666;
        display: flex;
        align-items: center;
    }

    .post-meta li span {
        font-size: 18px;
        color: #00c3ff;
        margin-right: 6px;
    }

    /* ==============================
   ISI ARTIKEL
============================== */
    .article-content {
        font-size: 17px;
        line-height: 1.9;
        color: #333;
    }

    .article-content p {
        margin-bottom: 18px;
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
   RESPONSIVE
============================== */
    @media (max-width: 768px) {
        .intro-single {
            height: 38vh;
        }

        .intro-title {
            font-size: 32px;
        }

        .article-title {
            font-size: 24px;
        }

        .post-meta ul {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>
<div class="intro intro-single route bg-image"
    style="background-image: url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
    <div class="overlay-mf">
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <br>
                    <h2 class="intro-title mb-4">Detail Artikel</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>">Home</a>
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
</div>


<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">

            <!-- KONTEN ARTIKEL -->
            <div class="col-md-8">
                <?php if(!$artikel): ?>
    <center class="mt-5">Artikel Tidak Ditemukan</center>
<?php else: ?>
    <div class="post-box">
        <div class="post-thumb">
            <?php if ($artikel->artikel_sampul != ""): ?>
                <img src="<?= base_url('gambar/artikel/' . $artikel->artikel_sampul); ?>" class="img-fluid"
                    alt="<?= $artikel->artikel_judul; ?>">
            <?php endif; ?>
        </div>

        <div class="post-meta">
            <h1 class="article-title"><?= $artikel->artikel_judul; ?></h1>
            <ul>
                <li>
                    <span class="ion-ios-person"></span>
                    <a href="#"><?= $artikel->pengguna_nama; ?></a>
                </li>
                <li>
                    <span class="ion-pricetag"></span>
                    <a href="#"><?= $artikel->kategori_nama; ?></a>
                </li>
            </ul>
        </div>

        <div class="article-content">
            <p><?= $artikel->artikel_konten; ?></p>
        </div>
    </div>
<?php endif; ?>

            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>

        </div>
    </div>
</section>