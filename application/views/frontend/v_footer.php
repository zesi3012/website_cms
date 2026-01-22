<!-- ================= FOOTER START ================= -->

<!-- FONT AWESOME (ONLY ONE VERSION, CLEAN & FIXED) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/brands.min.css">

<section class="footer-section" style="background-image: url('<?= base_url(); ?>assets_frontend/img/overlay-bg.jpg');">

    <div class="footer-overlay"></div>

    <footer class="footer-content">
        <div class="container">

            <!-- SOCIAL ICONS -->
            <?php
            // fallback aman
            $nama_web = $pengaturan->nama ?? 'My Website';

            $link_whatsapp = $pengaturan->link_whatsapp ?? '#';
            $link_instagram = $pengaturan->link_instagram ?? '#';
            $link_twitter = $pengaturan->link_twitter ?? '#';
            $link_github = $pengaturan->link_github ?? '#';
            ?>

            <!-- SOCIAL ICONS -->
            <?php
$nama_web = $pengaturan->nama ?? 'My Website';
?>

<div class="footer-social">
    <a href="#" class="social-circle" aria-label="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <a href="#" class="social-circle" aria-label="Instagram">
        <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="#" class="social-circle" aria-label="Twitter">
        <i class="fa-brands fa-twitter"></i>
    </a>
    <a href="#" class="social-circle" aria-label="GitHub">
        <i class="fa-brands fa-github"></i>
    </a>
</div>

<p class="footer-copy">
    © <?= date('Y'); ?> <strong><?= $nama_web; ?></strong> — All Rights Reserved
</p>



    </footer>
</section>

<!-- BACK TO TOP -->
<a href="#" class="back-to-top-modern">
    <i class="fa fa-chevron-up"></i>
</a>

<style>
    /* FIX: pastikan font awesome tidak tertimpa */
    .social-circle i {
        font-family: "Font Awesome 6 Brands" !important;
    }

    /* FOOTER */
    .footer-section {
        padding: 60px 0;
        position: relative;
        background-size: cover;
        background-position: center;
        color: #fff;
        text-align: center;
    }

    .footer-overlay {
        background: rgba(0, 0, 0, 0.78);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(4px);
    }

    .footer-content {
        position: relative;
        z-index: 5;
    }

    .footer-social {
        margin-bottom: 20px;
    }

    .social-circle {
        width: 55px;
        height: 55px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        margin: 0 10px;
        font-size: 24px;
        color: #fff !important;
        transition: 0.3s ease;
        backdrop-filter: blur(6px);
        text-decoration: none;
    }

    .social-circle:hover {
        background: #00e0ff;
        color: #000 !important;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 255, 255, 0.4);
    }

    .footer-copy {
        font-size: 15px;
        margin-top: 15px;
        color: #ddd;
    }

    .footer-credit {
        font-size: 13px;
        margin-top: 10px;
        color: #aaa;
    }

    /* BACK TO TOP */
    .back-to-top-modern {
        position: fixed;
        right: 25px;
        bottom: 25px;
        width: 48px;
        height: 48px;
        background: #00e0ff;
        color: #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: 0.3s;
        z-index: 99999;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .25);
    }

    .back-to-top-modern:hover {
        background: #00c3ff;
        transform: translateY(-5px);
    }

    @media(max-width:768px) {
        .social-circle {
            width: 48px;
            height: 48px;
            margin: 5px;
        }
    }
</style>