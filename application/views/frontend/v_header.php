<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $pengaturan->nama; ?> - <?= $pengaturan->deskripsi; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor CSS -->
    <link href="<?= base_url('assets_frontend/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets_frontend/assets/vendor/fontawesome/css/font-awesome.min.css'); ?>"
        rel="stylesheet">
    <link href="<?= base_url('assets_frontend/assets/vendor/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets_frontend/assets/vendor/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets_frontend/assets/vendor/owlcarousel/assets/owl.carousel.min.css'); ?>"
        rel="stylesheet">
    <link href="<?= base_url('assets_frontend/assets/vendor/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">

    <!-- Main Styles -->
    <link href="<?= base_url('assets_frontend/assets/css/style.css'); ?>" rel="stylesheet">

    <style>
        /* Modern Navbar */
        .navbar-custom {
            background: #ffffff;
            padding: 12px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all .3s ease-in-out;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        }

        .navbar-custom .nav-link {
            font-weight: 500;
            margin-left: 12px;
            color: #333 !important;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #007bff !important;
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 600;
            color: #222 !important;
        }

        .navbar-brand img {
            margin-right: 8px;
            vertical-align: middle;
        }

        /* Scroll effect */
        .navbar-custom.scrolled {
            padding: 6px 0;
            background: #fff;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-logo {
    height: 42px;
    width: auto;
    object-fit: contain;
    margin-right: 10px;
}

.navbar-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #222;
    white-space: nowrap;
}

    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
        <div class="container">

           <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
    <?php if (!empty($pengaturan->logo)): ?>
        <img 
            src="<?= base_url('gambar/website/' . $pengaturan->logo); ?>" 
            alt="<?= $pengaturan->nama; ?>"
            class="navbar-logo"
        >
    <?php endif; ?>

    <span class="navbar-title"><?= $pengaturan->nama; ?></span>
</a>



            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == '' ? 'active' : '') ?>"
                            href="<?= base_url(); ?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) == 'tentang-kami' ? 'active' : '') ?>"
                            href="<?= base_url('page/tentang-kami'); ?>">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) == 'layanan' ? 'active' : '') ?>"
                            href="<?= base_url('page/layanan'); ?>">Layanan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) == 'kontak-kami' ? 'active' : '') ?>"
                            href="<?= base_url('page/kontak-kami'); ?>">Kontak</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'blog' ? 'active' : '') ?>"
                            href="<?= base_url('blog'); ?>">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'login' ? 'active' : '') ?>"
                            href="<?= base_url('login'); ?>">Login</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <!-- /NAVBAR -->

    <script>
        // Navbar scroll effect
        window.addEventListener("scroll", function () {
            const nav = document.getElementById("mainNav");
            if (window.scrollY > 60) {
                nav.classList.add("scrolled");
            } else {
                nav.classList.remove("scrolled");
            }
        });
    </script>

</body>

</html>