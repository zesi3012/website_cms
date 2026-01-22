<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

<style>
    /* SIDEBAR WRAPPER */
    .widget-sidebar {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        transition: 0.3s ease;
    }

    .widget-sidebar:hover {
        transform: translateY(-3px);
    }

    /* SIDEBAR TITLE */
    .sidebar-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 18px;
        color: #333;
        border-left: 4px solid #00d0ff;
        padding-left: 10px;
    }

    /* SEARCH BOX */
    .sidebar-search .input-group input {
        border-radius: 8px 0 0 8px;
        border: 1px solid #ddd;
    }

    .sidebar-search .btn-search {
        border-radius: 0 8px 8px 0;
        background: #00c0ff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        transition: 0.3s;
    }

    .sidebar-search .btn-search:hover {
        background: #0099cc;
    }

    /* LISTS */
    .list-sidebar {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list-sidebar li {
        margin-bottom: 12px;
    }

    .list-sidebar li a {
        color: #444;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .list-sidebar li a:hover {
        color: #00c0ff;
        padding-left: 5px;
    }

    /* TAGS / KATEGORI */
    .widget-tags ul {
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .widget-tags ul li a {
        background: #f1faff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        display: inline-block;
        border: 1px solid #d8f5ff;
        transition: 0.3s;
        color: #007bff;
    }

    .widget-tags ul li a:hover {
        background: #00c0ff;
        color: #fff;
        border-color: #00c0ff;
        transform: translateY(-2px);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .widget-sidebar {
            padding: 15px;
        }
    }
</style>

<!-- SEARCH BOX -->
<div class="widget-sidebar sidebar-search">
    <h5 class="sidebar-title">Search</h5>
    <div class="sidebar-content">
        <?= form_open(base_url('search')); ?>
        <div class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari artikel...">
            <span class="input-group-btn">
                <button class="btn btn-search" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <?= form_close(); ?>
    </div>
</div>


<!-- ARTIKEL TERBARU -->
<div class="widget-sidebar">
    <h5 class="sidebar-title">Artikel Terbaru</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">
            <?php
            $artikel = $this->db->query("
                SELECT * FROM artikel, pengguna, kategori
                WHERE artikel_status = 'publish'
                AND artikel_kategori = kategori_id
                ORDER BY artikel_id DESC
                LIMIT 5")->result();
            foreach ($artikel as $a): ?>
                <li>
                    <a href="<?= base_url('artikel/' . $a->artikel_slug); ?>">
                        <span class="ion-ios-paper-outline" style="margin-right:8px; color:#00c0ff;"></span>
                        <?= $a->artikel_judul; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<!-- HALAMAN -->
<div class="widget-sidebar">
    <h5 class="sidebar-title">Halaman</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">
            <?php foreach ($this->M_data->get_data('halaman')->result() as $h): ?>
                <li>
                    <a href="<?= base_url('page/' . $h->halaman_slug); ?>">
                        <span class="ion-ios-arrow-forward" style="margin-right:8px; color:#00c0ff;"></span>
                        <?= $h->halaman_judul; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- KATEGORI -->
<div class="widget-sidebar widget-tags">
    <h5 class="sidebar-title">Kategori Artikel</h5>
    <div class="sidebar-content">
        <ul>
            <?php foreach ($this->M_data->get_data('kategori')->result() as $k): ?>
                <li>
                    <a href="<?= base_url('kategori/' . $k->kategori_slug); ?>">
                        <?= $k->kategori_nama; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>