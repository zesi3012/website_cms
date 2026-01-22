<?php
class M_login extends CI_Model{
    function cek_login($table, $where){
        return $this->db->get_where($table, $where);
    }

    public function insert_user($data) {
        return $this->db->insert('pengguna', $data);
    }
}