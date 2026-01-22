<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('v_register');
    }

    public function aksi()
    {
        $this->form_validation->set_rules(
            'nama', 'Nama Lengkap', 'required'
        );

        $this->form_validation->set_rules(
            'email', 'Email',
            'required|valid_email|is_unique[pengguna.pengguna_email]'
        );

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|is_unique[pengguna.pengguna_username]'
        );

        $this->form_validation->set_rules(
            'password', 'Password',
            'required|min_length[6]'
        );

        $this->form_validation->set_rules(
            'password2', 'Konfirmasi Password',
            'required|matches[password]'
        );

        if ($this->form_validation->run() != false) {

            $data = array(
                'pengguna_nama'     => htmlspecialchars($this->input->post('nama')),
                'pengguna_email'    => htmlspecialchars($this->input->post('email')),
                'pengguna_username' => htmlspecialchars($this->input->post('username')),
                'pengguna_password' => md5($this->input->post('password')),
                'pengguna_level'    => 'penulis', // default
                'pengguna_status'   => 1
            );

            $this->M_login->insert_user($data);

            redirect('login?pesan=daftar_berhasil');

        } else {
            $this->load->view('v_register');
        }
    }
}
