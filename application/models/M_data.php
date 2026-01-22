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

    public function get_by_slug($slug)
    {
        return $this->db->get_where('portofolio', ['slug' => $slug, 'status' => 'publish'])->row();
    }

    public function get_related($kategori, $exclude_id, $limit = 3)
    {
        return $this->db->where('kategori', $kategori)
            ->where('id !=', $exclude_id)
            ->where('status', 'publish')
            ->limit($limit)
            ->get('portofolio')
            ->result();
    }

    // 🔹 Ambil semua portofolio yang publish
    public function get_portofolio_published()
    {
        return $this->db->get_where('portofolio', ['status' => 'publish'])->result();
    }

    // 🔹 Ambil semua portofolio (untuk admin)
    public function get_portofolio_all()
    {
        return $this->db->get('portofolio')->result();
    }

    // 🔹 Ambil portofolio berdasarkan ID
    public function get_portofolio_by_id($id)
    {
        return $this->db->get_where('portofolio', ['id' => $id])->row();
    }

    public function get_testimonial_aktif()
{
    return $this->db
        ->where('status', 'aktif')
        ->get('testimonial')
        ->result();
}

public function get_layanan_publish()
    {
        return $this->db
            ->where('status', 'publish')
            ->get('layanan')
            ->result();
    }
    
}
