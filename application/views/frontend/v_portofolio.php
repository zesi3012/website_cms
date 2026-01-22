<!-- Portfolio List Page -->
<section class="intro-single route bg-image"
    style="background-image: url(<?= base_url(); ?>assets_frontend/assets/img/bg-blog.jpg)">
    <div class="overlay-mf">
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <br>
                    <h2 class="intro-title mb-4">Our Portfolio</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Portfolio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section id="work" class="portfolio-mf sect-pt4">
    <div class="container">
        <div class="section-title">
            <h3>All Projects</h3>
            <p>Explore our complete collection of work</p>
            <div class="line-mf"></div>
        </div>

        <div class="row">
            <?php if (empty($portofolio)): ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        No portfolio items available.
                    </div>
                    <a href="<?= base_url(); ?>" class="btn btn-primary mt-3">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>
            <?php else: ?>
                <?php foreach ($portofolio as $p): ?>
                    <div class="col-md-4 mb-4">
                        <div class="work-box">
                            <div class="work-img">
                                <img src="<?= base_url('gambar/portofolio/' . $p->gambar); ?>" class="img-fluid"
                                    alt="<?= htmlspecialchars($p->judul); ?>"
                                    style="height: 250px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="work-content p-3">
                                <h2 class="w-title"><?= htmlspecialchars($p->judul); ?></h2>
                                <span class="w-category"><?= htmlspecialchars($p->kategori); ?></span> /
                                <span class="w-date"><?= $p->tahun; ?></span>
                                <div class="view-details mt-2">
                                    <a href="<?= site_url('portofolio/' . $p->slug); ?>" class="btn-view">
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

<!-- Style untuk halaman portfolio list -->
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
    }

    .intro-single .overlay-mf {
        background: rgba(0, 0, 0, 0.45);
        position: absolute;
        inset: 0;
    }

    .intro-title {
        font-size: 46px;
        font-weight: 800;
        color: #fff;
        letter-spacing: 1px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

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

    .work-box {
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        margin-bottom: 30px;
    }

    .work-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .work-img img {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }

    .w-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: #333;
    }

    .w-category {
        color: #007bff;
        font-size: 0.9rem;
    }

    .w-date {
        color: #666;
        font-size: 0.9rem;
    }

    .view-details {
    text-align: center;
}

.view-details .btn-view {
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

.view-details .btn-view i {
    font-size: 13px;
    transition: transform 0.35s ease;
}

/* hover effect */
.view-details .btn-view:hover {
    background: #00c3ff;
    color: #ffffff;
}

.view-details .btn-view:hover i {
    transform: translateX(6px);
}
</style>