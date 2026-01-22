<style>
    /* ===== FIX HEADER MENUTUP INTRO ===== */
    .intro-single {
        padding-top: 140px !important;
        /* dorong seluruh section ke bawah */
        padding-bottom: 80px;
        background-size: cover;
        background-position: center;
        position: relative;
        text-align: center;
        z-index: 1;
    }

    .intro-single .overlay-mf {
        padding-top: 20px;
    }

    /* Pastikan teks intro berada di atas overlay */
    .intro-title {
        position: relative;
        z-index: 3;
    }

    /* Navbar tetap paling atas */
    header,
    .navbar {
        z-index: 9999 !important;
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

    .article-wrapper {
        padding: 40px 20px;
        background: #fff;
        margin-bottom: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    /* Judul artikel – disamakan dengan .article-title di blog */
    .article-wrapper .article-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #1e1e1e;
    }

    /* Meta info – disamakan style-nya dengan post-meta ul li */
    .article-wrapper .article-meta {
        font-size: 15px;
        color: #555;
        margin-bottom: 25px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .article-wrapper .article-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Featured image – mengikuti gaya .post-thumb */
    .article-wrapper .article-thumb img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    /* Konten artikel – disamakan font + spacing ala blog list */
    .article-wrapper .article-content {
        font-size: 18px;
        line-height: 1.75;
        color: #333;
    }

    /* Paragraf */
    .article-wrapper .article-content p {
        margin-bottom: 20px;
    }

    /* Heading konten */
    .article-wrapper .article-content h2,
    .article-wrapper .article-content h3,
    .article-wrapper .article-content h4 {
        margin-top: 30px;
        margin-bottom: 15px;
        font-weight: 600;
        color: #1e1e1e;
    }

    /* Blockquote – gaya elegan serupa blog */
    .article-wrapper blockquote {
        padding: 20px 25px;
        background: #f5f8ff;
        border-left: 5px solid #0066ff;
        margin: 30px 0;
        font-style: italic;
        color: #444;
        border-radius: 8px;
    }

    /* List */
    .article-wrapper ul,
    .article-wrapper ol {
        margin: 20px 0 20px 30px;
    }

    /* Hyperlink */
    .article-wrapper a {
        color: #007bff;
        text-decoration: none;
    }

    .article-wrapper a:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .article-wrapper .article-title {
            font-size: 26px;
        }

        .article-wrapper .article-content {
            font-size: 16px;
        }
    }
</style>

<div class="intro intro-single route bg-image"
    style="background-image: url(<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>

    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h2 class="intro-title mb-4">Kategori Artikel</h2>

                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('blog'); ?>">Kategori</a>
                    </li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <?php if (count($artikel) == 0): ?>
                    <center>
                        <h3>Belum Ada Artikel pada Kategori Ini</h3>
                    </center>
                <?php endif; ?>

                <?php foreach ($artikel as $a): ?>
                    <div class="post-box">

                        <div class="post-thumb">
                            <?php if ($a->artikel_sampul != ""): ?>
                                <img src="<?= base_url('gambar/artikel/' . $a->artikel_sampul); ?>" class="img-fluid"
                                    alt="<?= $a->artikel_judul; ?>">
                            <?php endif; ?>
                        </div>

                        <div class="post-meta">
                            <a href="<?= base_url($a->artikel_slug); ?>">
                                <h1 class="article-title"><?= $a->artikel_judul; ?></h1>
                            </a>

                            <ul>
                                <li>
                                    <span class="ion-ios-person"></span>
                                    <a href="#"><?= $a->pengguna_nama; ?></a>
                                </li>

                                <li>
                                    <span class="ion-pricetag"></span>
                                    <a href="<?= base_url('kategori/' . $a->kategori_slug); ?>">
                                        <?= $a->kategori_nama; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                <?php endforeach; ?>

                <nav aria-label="Page navigation">
                    <?= $this->pagination->create_links(); ?>
                </nav>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>

        </div>
    </div>
</section>