<?php
defined('BASEPATH') or die('No direct script access allowed!');

class user_model extends CI_Model
{
    // Ambil Seluruh Data Produk
    public function get_all()
    {
        $result = $this->db->get('user');
        return $result->result();
    }

    // Ambil Data Produk By ID
    public function getUserByID($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    // Tambah Data Produk
    public function insert_user()
    {
        $data = [
            "id_user" => $this->input->post('id_user'),
            "nama_lengkap" => $this->input->post('nama_lengkap'),
            "alamat" => $this->input->post('alamat'),
            "no_tlp" => $this->input->post('no_tlp'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "level_akses" => $this->input->post('level_akses')
        ];
        $this->db->insert('user', $data);
    }

    //  Edit Data Produk
    public function update_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_userid($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }

    // Hapus Data Produk
    public function hapus_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
