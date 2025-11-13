<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model
{
    // 🔹 Ambil semua data dari tabel
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    // 🔹 Tambah data ke tabel
    public function insert_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    // 🔹 Ambil data tertentu (untuk edit)
    public function edit_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    // 🔹 Update data berdasarkan kondisi
    public function update_data($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    // 🔹 Hapus data berdasarkan kondisi
    function delete_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
