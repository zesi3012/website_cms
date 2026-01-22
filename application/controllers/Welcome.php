<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_data');
    }

    public function index()
    {
        // Ambil artikel terbaru yang publish
        $data['artikel'] = $this->db->query("
        SELECT * FROM artikel
        JOIN pengguna ON artikel_author = pengguna_id
        JOIN kategori ON artikel_kategori = kategori_id
        WHERE artikel_status = 'publish'
        ORDER BY artikel_id DESC
        LIMIT 3
    ")->result();

        // Ambil testimonial aktif  ✅ (TAMBAHAN)
        $data['testimonial'] = $this->M_data->get_testimonial_aktif();

        $data['layanan'] = $this->M_data->get_layanan_publish();

        // Ambil pengaturan website
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

        if ($data['pengaturan']) {
            $data['meta_keyword'] = $data['pengaturan']->nama;
            $data['meta_description'] = $data['pengaturan']->deskripsi;
        } else {
            $data['meta_keyword'] = 'Website';
            $data['meta_description'] = 'CMS Website';
        }

        // Load view
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_homepage', $data);
        $this->load->view('frontend/v_footer', $data);
    }


    public function single($slug)
    {
        // Ambil artikel dengan join pengguna dan kategori
        $this->db->select('artikel.*, pengguna.pengguna_nama, kategori.kategori_nama, kategori.kategori_slug');
        $this->db->from('artikel');
        $this->db->join('pengguna', 'artikel.artikel_author = pengguna.pengguna_id', 'left');
        $this->db->join('kategori', 'artikel.artikel_kategori = kategori.kategori_id', 'left');
        $this->db->where('artikel_slug', $slug);
        $this->db->where('artikel_status', 'publish'); // harus lowercase sesuai enum
        $data['artikel'] = $this->db->get()->row(); // pakai row() karena slug unik

        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

        if (!$data['artikel']) {
            // Redirect ke halaman 404 jika artikel tidak ditemukan
            redirect('notfound');
        }

        // SEO meta
        $data['meta_keyword'] = $data['artikel']->artikel_judul;
        $data['meta_description'] = substr($data['artikel']->artikel_konten, 0, 100);

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_single', $data);
        $this->load->view('frontend/v_footer', $data);
    }



    public function blog()
    {
        // Load helper text untuk word_limiter()
        $this->load->helper('text');

        // Data pengaturan dan SEO
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        // Pagination
        $jumlah_data = $this->M_data->get_data('artikel')->num_rows();
        $this->load->library('pagination');

        $config['base_url'] = base_url('blog/');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 3;

        // Styling pagination
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Prev</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        // Ambil segment untuk offset
        $from = $this->uri->segment(2) ?? 0;

        $this->pagination->initialize($config);

        // Ambil artikel dengan join pengguna & kategori
        $data['artikel'] = $this->db->select('artikel.*, pengguna.pengguna_nama, kategori.kategori_nama, kategori.kategori_slug')
            ->from('artikel')
            ->join('pengguna', 'artikel.artikel_author = pengguna.pengguna_id', 'left')
            ->join('kategori', 'artikel.artikel_kategori = kategori.kategori_id', 'left')
            ->where('artikel_status', 'publish')
            ->order_by('artikel_id', 'DESC')
            ->limit($config['per_page'], $from)
            ->get()
            ->result();

        // Load views
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_blog', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function page($slug)
    {
        $where = array(
            'halaman_slug' => $slug
        );
        $data['halaman'] = $this->M_data->edit_data('halaman', $where)->result();
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_page', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function kategori($slug)
    {
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        $jumlah_artikel = $this->db->query("
        SELECT * FROM artikel, pengguna, kategori
        WHERE artikel_status = 'publish'
        AND artikel_author = pengguna_id
        AND artikel_kategori = kategori_id
        AND kategori_slug = '$slug'
        ")->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'kategori/' . $slug;
        $config['total_rows'] = $jumlah_artikel;
        $config['per_page'] = 4;

        $config['first_link'] = 'first';
        $config['last_link'] = 'last';
        $config['prev_link'] = 'prev';
        $config['next_link'] = 'next';
        $config['full_tag_open'] = '<div class="pagging text-center"> 
            <nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"> 
            <span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"> 
            <span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only"> 
            (current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"> 
            <span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true"> 
            &raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"> 
            <span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"> 
            <span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"> 
            <span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $FROM = $this->uri->segment(3);
        if ($FROM == "") {
            $FROM = 0;
        }
        $this->pagination->initialize($config);
        $data['artikel'] = $this->db->query(" 
            SELECT * FROM artikel,pengguna,kategori 
            WHERE artikel_status = 'publish' 
            AND artikel_author = pengguna_id 
            AND artikel_kategori = kategori_id 
            AND kategori_slug = '$slug' 
            ORDER BY artikel_id DESC 
            LIMIT $config[per_page] OFFSET $FROM 
 ")->result();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_kategori', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function search()
    {
        $input_cari = $this->input->post('cari', true);
        $input_cari = $input_cari !== null ? trim($input_cari) : '';
        $cari = htmlentities($input_cari);

        $cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;

        $cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;

        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        // Hitung jumlah data
        $jumlah_artikel = $this->db->query("
        SELECT * FROM artikel, pengguna, kategori
        WHERE artikel_status = 'publish'
        AND artikel_author = pengguna_id
        AND artikel_kategori = kategori_id
        AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')
    ")->num_rows();

        // FIX: Hanya ini yang benar
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'search/' . $cari;
        $config['total_rows'] = $jumlah_artikel;
        $config['per_page'] = 4;

        // Bootstrap pagination fix
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $config['next_link'] = 'Next &rsaquo;';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';

        $config['prev_link'] = '&lsaquo; Prev';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        // Posisi halaman
        $FROM = $this->uri->segment(3);
        if ($FROM == "") {
            $FROM = 0;
        }

        $this->pagination->initialize($config);

        // Query pencarian
        $data['artikel'] = $this->db->query("
        SELECT * FROM artikel, pengguna, kategori
        WHERE artikel_status = 'publish'
        AND artikel_author = pengguna_id
        AND artikel_kategori = kategori_id
        AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')
        ORDER BY artikel_id DESC
        LIMIT $config[per_page] OFFSET $FROM
    ")->result();

        $data['cari'] = $cari;

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_search', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function notfound()
    {
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

        $nama = $data['pengaturan']->nama ?? '';
        $deskripsi = $data['pengaturan']->deskripsi ?? '';

        $data['meta_keyword'] = trim($nama);
        $data['meta_description'] = trim($deskripsi);

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_notfound', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function portofolio()
    {
        // AMBIL PENGATURAN (WAJIB)
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

        // DATA PORTOFOLIO
        $data['portofolio'] = $this->M_data->get_data('portofolio')->result();

        $data['title'] = 'Portofolio';

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_portofolio', $data);
        $this->load->view('frontend/v_footer', $data);
    }


    public function portofolio_detail($slug = null)
    {
        // ✅ TAMBAHKAN DI SINI
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

        if (!$slug) {
            show_404();
        }

        $data['portofolio'] = $this->M_data->get_by_slug($slug);
        if (empty($data['portofolio'])) {
            show_404();
        }

        $data['related'] = $this->M_data->get_related(
            $data['portofolio']->kategori,
            $data['portofolio']->id
        );

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_portofolio_detail', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function testimonial()
    {
        // Ambil testimonial aktif
        $data['testimonial'] = $this->M_data->get_testimonial_aktif();

        // 🔴 INI YANG WAJIB DITAMBAHKAN
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

        if ($data['pengaturan']) {
            $data['meta_keyword'] = $data['pengaturan']->nama;
            $data['meta_description'] = $data['pengaturan']->deskripsi;
        } else {
            $data['meta_keyword'] = 'Website';
            $data['meta_description'] = 'CMS Website';
        }

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_testimonial_detail', $data);
        $this->load->view('frontend/v_footer');
    }

    public function layanan_detail($slug)
{
    // Data layanan
    $data['layanan'] = $this->db
        ->where('slug', $slug)
        ->where('status', 'publish')
        ->get('layanan')
        ->row();

    // 🔥 WAJIB: ambil pengaturan website
    $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

    // Meta default
    if ($data['pengaturan']) {
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;
    } else {
        $data['meta_keyword'] = 'Website';
        $data['meta_description'] = 'CMS Website';
    }

    // Load view
    $this->load->view('frontend/v_header', $data);
    $this->load->view('frontend/v_layanan_detail', $data);
    $this->load->view('frontend/v_footer', $data);
}

public function layanan()
{
    $data['layanan'] = $this->M_data->get_layanan_publish();

    $data['pengaturan'] = $this->M_data->get_data('pengaturan')->row();

    $this->load->view('frontend/v_header', $data);
    $this->load->view('frontend/v_layanan', $data); // ⬅️ INI
    $this->load->view('frontend/v_footer');
}


}



