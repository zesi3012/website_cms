<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_login');
        $this->load->model('M_data');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['jumlah_artikel'] = $this->db->count_all('artikel');

        // Hitung jumlah kategori
        $data['jumlah_kategori'] = $this->db->count_all('kategori');

        // Hitung jumlah pengguna
        $data['jumlah_pengguna'] = $this->db->count_all('pengguna');

        // Hitung jumlah halaman (page)
        $data['jumlah_halaman'] = $this->db->count_all('halaman');
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_index', $data);
        $this->load->view('dashboard/v_footer', $data);
    }

    function ganti_password()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_ganti_password');
        $this->load->view('dashboard/v_footer');
    }

    public function ganti_password_aksi()
    {
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

        if ($this->form_validation->run() != false) {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            $where = array(
                'pengguna_id' => $this->session->userdata('id'),
                'pengguna_password' => md5($password_lama)
            );

            $cek = $this->m_login->cek_login('pengguna', $where);

            if ($cek->num_rows() > 0) {
                $data = array(
                    'pengguna_password' => md5($password_baru)
                );

                $this->M_data->update_data('pengguna', $data, $where);

                redirect('dashboard/ganti_password?alert=sukses');
            } else {
                redirect('dashboard/ganti_password?alert=gagal');
            }
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_ganti_password');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori()
    {
        $data['kategori'] = $this->M_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_tambah_aksi()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() != false) {
            $kategori = $this->input->post('kategori');

            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );

            $this->M_data->insert_data($data, 'kategori');

            redirect(base_url('dashboard/kategori'));
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }


    public function kategori_edit($id)
    {
        $where = array(
            'kategori_id' => $id
        );
        $data['kategori'] = $this->M_data->edit_data('kategori', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_update()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $kategori = $this->input->post('kategori');
            $where = array(
                'kategori_id' => $id
            );
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->M_data->update_data('kategori', $data, $where);
            redirect(base_url() . 'dashboard/kategori');
        } else {
            $id = $this->input->post('id');
            $where = array(
                'kategori_id' => $id
            );
            $data['kategori'] = $this->M_data->edit_data('kategori', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori_hapus($id)
    {
        $where = array('kategori_id' => $id);
        $this->M_data->delete_data('kategori', $where);
        redirect(base_url('dashboard/kategori'));
    }


    public function artikel()
    {
        $data['artikel'] = $this->db->query('SELECT * FROM artikel, kategori, pengguna WHERE artikel_kategori = kategori_id and artikel_author=pengguna_id order by artikel_id desc')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function artikel_tambah()
    {
        $data['kategori'] = $this->M_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_tambah', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function artikel_aksi()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[artikel.artikel_judul]');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if (empty($_FILES['sampul']['name'])) {
            $this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
        }

        if ($this->form_validation->run() != false) {

            $config['upload_path'] = FCPATH . 'gambar/artikel/'; // path absolut
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if ($this->upload->do_upload('sampul')) {
                $gambar = $this->upload->data();

                $tanggal = date('Y-m-d H:i:s');
                $judul = $this->input->post('judul');
                $slug = strtolower(url_title($judul));
                $konten = $this->input->post('konten');
                $sampul = $gambar['file_name'];
                $author = $this->session->userdata('id');
                $kategori = $this->input->post('kategori');
                $status = $this->input->post('status');

                $data = array(
                    'artikel_tanggal' => $tanggal,
                    'artikel_judul' => $judul,
                    'artikel_slug' => $slug,
                    'artikel_konten' => $konten,
                    'artikel_sampul' => $sampul,
                    'artikel_author' => $author,
                    'artikel_kategori' => $kategori,
                    'artikel_status' => $status
                );

                $this->M_data->insert_data($data, 'artikel');
                redirect(base_url('dashboard/artikel?alert=sukses'));
            } else {
                $data['gambar_error'] = $this->upload->display_errors();
                $data['kategori'] = $this->M_data->get_data('kategori')->result();

                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_artikel_tambah', $data);
                $this->load->view('dashboard/v_footer');
            }
        } else {
            $data['kategori'] = $this->M_data->get_data('kategori')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_artikel_tambah', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function artikel_edit($id)
    {
        $where = array('artikel_id' => $id);
        $data['artikel'] = $this->M_data->edit_data('artikel', $where)->result();
        $data['kategori'] = $this->M_data->get_data('kategori')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function artikel_update()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() != false) {

            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $kategori = $this->input->post('kategori');
            $status = $this->input->post('status');

            $where = array('artikel_id' => $id);

            $data = array(
                'artikel_judul' => $judul,
                'artikel_slug' => $slug,
                'artikel_konten' => $konten,
                'artikel_kategori' => $kategori,
                'artikel_status' => $status
            );

            $this->M_data->update_data('artikel', $data, $where);

            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path'] = './gambar/artikel/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    $gambar = $this->upload->data();

                    $data = array('artikel_sampul' => $gambar['file_name']);
                    $this->M_data->update_data('artikel', $data, $where);

                    redirect(base_url('dashboard/artikel'));
                } else {
                    $data['gambar_error'] = $this->upload->display_errors();
                    $data['artikel'] = $this->M_data->edit_data('artikel', $where)->result();
                    $data['kategori'] = $this->M_data->get_data('kategori')->result();

                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_edit', $data);
                    $this->load->view('dashboard/v_footer');
                }
            } else {
                redirect(base_url('dashboard/artikel'));
            }

        } else {
            $id = $this->input->post('id');
            $where = array('artikel_id' => $id);
            $data['artikel'] = $this->M_data->edit_data('artikel', $where)->result();
            $data['kategori'] = $this->M_data->get_data('kategori')->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_artikel_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function artikel_hapus($id)
    {

        $artikel = $this->M_data->edit_data('artikel', ['artikel_id' => $id])->row();

        if ($artikel && file_exists('./gambar/artikel/' . $artikel->artikel_sampul)) {
            unlink('./gambar/artikel/' . $artikel->artikel_sampul);
        }

        $this->M_data->delete_data('artikel', ['artikel_id' => $id]);

        redirect(base_url('dashboard/artikel'));
    }

    public function pages()
    {
        $data['halaman'] = $this->M_data->get_data('halaman')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pages_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function pages_aksi()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[halaman.halaman_judul]');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        if ($this->form_validation->run() != false) {
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');

            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );
            $this->M_data->insert_data($data, 'halaman');
            redirect(base_url() . 'dashboard/pages');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pages_edit($id)
    {
        $where = array('halaman_id' => $id);
        $data['halaman'] = $this->M_data->edit_data('halaman', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pages_update()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');

            $where = array('halaman_id' => $id);

            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );
            $this->M_data->update_data('halaman', $data, $where);
            redirect(base_url() . 'dashboard/pages');
        } else {
            $id = $this->input->post('id');
            $where = array('halaman_id' => $id);
            $data['halaman'] = $this->M_data->edit_data('halaman', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pages_hapus($id)
    {
        $where = array('halaman_id' => $id);
        $this->M_data->delete_data('halaman', $where); // benar!
        redirect(base_url('dashboard/pages'));
    }

    public function profil()
    {
        $id_pengguna = $this->session->userdata('id');
        $where = array('pengguna_id' => $id_pengguna);
        $data['pengguna'] = $this->M_data->edit_data('pengguna', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_profil', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function profil_update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'Required');
        $this->form_validation->set_rules('email', 'Email', 'Required');
        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $where = array('pengguna_id' => $id);

            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email
            );
            $this->M_data->update_data('pengguna', $data, $where);
            redirect(base_url() . 'dashboard/profil?alert=sukses');
        } else {
            $id_pengguna = $this->session->userdata('id');
            $where = array('pengguna_id' => $id_pengguna);
            $data['pengguna'] = $this->M_data->edit_data('pengguna', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_profil', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengaturan()
    {
        $data['pengaturan'] = $this->M_data->get_data('pengaturan')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengaturan', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengaturan_update()
    {
        $this->form_validation->set_rules('nama', 'Nama Website', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Website', 'required');

        if ($this->form_validation->run() != false) {

            $data = array(
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'link_whatsapp' => $this->input->post('link_whatsapp'),
                'link_twitter' => $this->input->post('link_twitter'),
                'link_instagram' => $this->input->post('link_instagram'),
                'link_github' => $this->input->post('link_github')
            );

            $this->db->update('pengaturan', $data);

            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path'] = './gambar/website/';
                $config['allowed_types'] = 'jpg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    $gambar = $this->upload->data();
                    $logo = $gambar['file_name'];

                    $this->db->update('pengaturan', ['logo' => $logo]);
                }
            }

            redirect(base_url() . 'dashboard/pengaturan/?alert=sukses');

        } else {

            $data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengaturan', $data);
            $this->load->view('dashboard/v_footer');
        }
    }


    public function pengguna()
    {
        $data['pengguna'] = $this->M_data->get_data('pengguna')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_tambah_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required|is_unique[pengguna.pengguna_email]');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required|is_unique[pengguna.pengguna_username]');
        $this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[8]');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email,
                'pengguna_username' => $username,
                'pengguna_password' => $password,
                'pengguna_level' => $level,
                'pengguna_status' => $status
            );

            $this->M_data->insert_data($data, 'pengguna');

            redirect(base_url('dashboard/pengguna'));
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengguna_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna_edit($id)
    {
        $where = array(
            'pengguna_id' => $id
        );
        $data['pengguna'] = $this->M_data->edit_data('pengguna', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_update()
    {

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $where = array('pengguna_id' => $id);

            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email,
                'pengguna_username' => $username,
                'pengguna_level' => $level,
                'pengguna_status' => $status
            );
            if (!empty($this->input->post('password'))) {
                $password = md5($this->input->post('password'));
                $data['pengguna_password'] = $password;
            }

            $this->M_data->update_data('pengguna', $data, $where);
            redirect(base_url() . 'dashboard/pengguna');
        } else {
            $id = $this->input->post('id');
            $where = array('pengguna_id' => $id);
            $data['pengguna'] = $this->M_data->edit_data('pengguna', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengguna_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna_hapus($id)
    {
        $where = array('pengguna_id' => $id);
        $data['pengguna_hapus'] = $this->M_data->edit_data('pengguna', $where)->row();
        $data['pengguna_lain'] = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id != '$id'")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_hapus', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_hapus_aksi()
    {
        $pengguna_hapus = $this->input->post('pengguna_hapus');
        $pengguna_tujuan = $this->input->post('pengguna_tujuan');

        $where = array('pengguna_id' => $pengguna_hapus);
        $this->M_data->delete_data('pengguna', $where);
        $w = array('artikel_author' => $pengguna_hapus);
        $d = array('artikel_author' => $pengguna_tujuan);
        $this->M_data->update_data('artikel', $d, $w);
        redirect(base_url() . 'dashboard/pengguna');
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    //portofolio
    public function portofolio()
    {
        $data['portofolio'] = $this->M_data->get_data('portofolio')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function portofolio_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function portofolio_tambah_aksi()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        }

        if ($this->form_validation->run() != false) {
            // konfigurasi upload
            $config['upload_path'] = FCPATH . 'gambar/portofolio/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 3000;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {

                $gambar = $this->upload->data();

                // data sesuai struktur tabel baru
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'slug' => strtolower(url_title($this->input->post('judul'))),
                    'kategori' => $this->input->post('kategori'),
                    'tahun' => $this->input->post('tahun'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $gambar['file_name'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'status' => strtolower($this->input->post('status')) // ambil dari tombol
                );

                $this->M_data->insert_data($data, 'portofolio');

                $this->session->set_flashdata('success', 'Portofolio berhasil ditambahkan!');
                redirect('dashboard/portofolio');

            } else {

                $data['gambar_error'] = $this->upload->display_errors();
                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_portofolio_tambah', $data);
                $this->load->view('dashboard/v_footer');
            }

        } else {

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_portofolio_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }


    public function portofolio_edit($id = null)
    {
        if ($id === null) {
            $this->session->set_flashdata('error', 'ID portofolio tidak ditemukan!');
            redirect('dashboard/portofolio');
        }

        $where = array('id' => $id);
        $data['portofolio'] = $this->M_data->edit_data('portofolio', $where)->row(); // row() untuk single object

        if (!$data['portofolio']) {
            $this->session->set_flashdata('error', 'Portofolio tidak ditemukan!');
            redirect('dashboard/portofolio');
        }

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio_edit', $data);
        $this->load->view('dashboard/v_footer');
    }


    public function portofolio_update()
    {
        // Validasi form
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() != false) {

            $id = $this->input->post('id');

            // Data update sesuai struktur tabel
            $data_update = array(
                'judul' => $this->input->post('judul'),
                'slug' => strtolower(url_title($this->input->post('judul'))),
                'kategori' => $this->input->post('kategori'),
                'tahun' => $this->input->post('tahun'),
                'deskripsi' => $this->input->post('deskripsi'),
                'status' => $this->input->post('status'),
            );

            $where = array('id' => $id);

            // Update data utama
            $this->M_data->update_data('portofolio', $data_update, $where);

            // Jika ada gambar baru
            if (!empty($_FILES['gambar']['name'])) {

                $config['upload_path'] = FCPATH . 'gambar/portofolio/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size'] = 3000;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data();

                    $data_gambar = array(
                        'gambar' => $gambar['file_name']
                    );

                    $this->M_data->update_data('portofolio', $data_gambar, $where);
                } else {
                    // Optional: simpan error upload untuk ditampilkan
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }

            $this->session->set_flashdata('success', 'Portofolio berhasil diperbarui!');
            redirect('dashboard/portofolio');

        } else {
            // Jika validasi gagal, tampilkan form edit
            $id = $this->input->post('id');
            $where = array('id' => $id);
            $data['portofolio'] = $this->M_data->edit_data('portofolio', $where)->row();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_portofolio_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function portofolio_hapus($id)
    {
        $where = array('id' => $id);
        $this->M_data->delete_data('portofolio', $where);

        $this->session->set_flashdata('success', 'Portofolio berhasil dihapus!');
        redirect('dashboard/portofolio');
    }

    public function testimonial()
    {
        $data['testimonial'] = $this->M_data->get_data('testimonial')->result();
        $data['title'] = 'Testimonial';

        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_testimonial', $data);
        $this->load->view('dashboard/v_footer');
    }


    public function testimonial_add()
    {
        if ($this->input->post()) {

            $config['upload_path'] = FCPATH . 'gambar/testimonial/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 3000;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
                die;
            }

            $upload = $this->upload->data();
            $foto = $upload['file_name'];

            $data = [
                'nama' => $this->input->post('nama'),
                'pesan' => $this->input->post('pesan'),
                'foto' => $foto,
                'status' => $this->input->post('status')
            ];

            $this->M_data->insert_data($data, 'testimonial');

            redirect('dashboard/testimonial');
        }

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_testimonial_add');
        $this->load->view('dashboard/v_footer');
    }

    public function testimonial_edit($id)
    {
        $where = ['id' => $id];
        $data['testimonial'] = $this->M_data->edit_data('testimonial', $where)->row();

        if ($this->input->post()) {

            $config['upload_path'] = './gambar/testimonial/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            $foto = $data['testimonial']->foto;

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {


                    if ($foto && file_exists('./gambar/testimonial/' . $foto)) {
                        unlink('./gambar/testimonial/' . $foto);
                    }

                    $foto = $this->upload->data('file_name');
                }
            }

            $update = [
                'nama' => $this->input->post('nama'),
                'pesan' => $this->input->post('pesan'),
                'foto' => $foto,
                'status' => $this->input->post('status'),
            ];

            $this->M_data->update_data('testimonial', $update, $where);
            redirect('dashboard/testimonial');
        }

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_testimonial_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function testimonial_update()
    {
        $id = $this->input->post('id');
        $where = ['id' => $id];

        // ambil data lama
        $testimonial = $this->M_data->edit_data('testimonial', $where)->row();

        if (!$testimonial) {
            redirect('dashboard/testimonial');
        }

        // default: pakai foto lama
        $foto = $testimonial->foto;

        // config upload
        $config['upload_path'] = FCPATH . 'gambar/testimonial/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 3000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        // jika upload foto baru
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {

                // hapus foto lama
                if ($foto && file_exists(FCPATH . 'gambar/testimonial/' . $foto)) {
                    unlink(FCPATH . 'gambar/testimonial/' . $foto);
                }

                // foto baru
                $upload = $this->upload->data();
                $foto = $upload['file_name'];

            } else {
                // jika upload gagal, kembali ke edit + error
                $data['testimonial'] = $testimonial;
                $data['foto_error'] = $this->upload->display_errors('<small class="text-danger">', '</small>');

                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_testimonial_edit', $data);
                $this->load->view('dashboard/v_footer');
                return;
            }
        }

        // data update
        $update = [
            'nama' => $this->input->post('nama'),
            'pesan' => $this->input->post('pesan'),
            'foto' => $foto,
            'status' => $this->input->post('status')
        ];

        $this->M_data->update_data('testimonial', $update, $where);

        redirect('dashboard/testimonial');
    }


    public function testimonial_delete($id)
    {
        $testimonial = $this->M_data->edit_data('testimonial', ['id' => $id])->row();

        if ($testimonial && $testimonial->foto) {
            $path = './gambar/testimonial/' . $testimonial->foto;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->M_data->delete_data('testimonial', ['id' => $id]);
        redirect('dashboard/testimonial');
    }

    public function layanan()
    {

        $data['title'] = 'Layanan';
        $data['layanan'] = $this->db
            ->order_by('id', 'DESC')
            ->get('layanan')
            ->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_layanan', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function layanan_tambah()
    {
        $data['title'] = 'Tambah Layanan';

        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_layanan_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function layanan_tambah_aksi()
    {

        // upload gambar
       if ($this->input->post()) {

        $config['upload_path']   = FCPATH . 'gambar/layanan/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size']      = 3000;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        // WAJIB sama dengan name="gambar" di form
        if (!$this->upload->do_upload('gambar')) {
            echo $this->upload->display_errors();
            die;
        }

        // ambil data upload (INI YANG KEMARIN)
        $upload = $this->upload->data();
        $gambar = $upload['file_name'];

        $data = [
            'judul'              => $this->input->post('judul'),
            'slug'               => url_title($this->input->post('judul'), 'dash', TRUE),
            'deskripsi_singkat'  => $this->input->post('deskripsi_singkat'),
            'deskripsi'          => $this->input->post('deskripsi'),
            'icon'               => $this->input->post('icon'),
            'gambar'             => $gambar, // 🔥 SEKARANG TERISI
            'status'             => strtolower($this->input->post('status')),
            'created_at'         => date('Y-m-d H:i:s')
        ];

        $this->db->insert('layanan', $data);

        redirect('dashboard/layanan');
    }

    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_layanan_tambah');
    $this->load->view('dashboard/v_footer');
    }


    public function layanan_edit($id)
    {
        $data['layanan'] = $this->db
            ->get_where('layanan', ['id' => $id])
            ->row();

        $data['title'] = 'Edit Layanan';

        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_layanan_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function layanan_update()
{
    $id = $this->input->post('id');
    $where = ['id' => $id];

    // ambil data lama
    $layanan = $this->db->get_where('layanan', $where)->row();
    $gambar = $layanan->gambar;

    // konfigurasi upload (SAMA SEPERTI TESTIMONIAL)
    $config['upload_path']   = FCPATH . 'gambar/layanan/';
    $config['allowed_types'] = 'jpg|jpeg|png|webp';
    $config['max_size']      = 3000;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload');
    $this->upload->initialize($config);

    // jika upload gambar baru
    if (!empty($_FILES['gambar']['name'])) {

        if ($this->upload->do_upload('gambar')) {

            // hapus gambar lama
            if ($gambar && file_exists(FCPATH . 'gambar/layanan/' . $gambar)) {
                unlink(FCPATH . 'gambar/layanan/' . $gambar);
            }

            // ambil nama file baru
            $upload = $this->upload->data();
            $gambar = $upload['file_name'];

        } else {
            echo $this->upload->display_errors();
            die;
        }
    }

    $data = [
        'judul'             => $this->input->post('judul'),
        'slug'              => url_title($this->input->post('judul'), 'dash', TRUE),
        'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
        'deskripsi'         => $this->input->post('deskripsi'),
        'icon'              => $this->input->post('icon'),
        'gambar'            => $gambar, // 🔥 TERJAGA
        'status'            => strtolower($this->input->post('status'))
    ];

    $this->db->where('id', $id)->update('layanan', $data);

    redirect('dashboard/layanan');
}


    public function layanan_hapus($id)
    {
        $this->db->delete('layanan', ['id' => $id]);
        redirect('dashboard/layanan');
    }

}
