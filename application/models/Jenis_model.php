<?php
defined('BASEPATH') or die('No direct script access allowed!');

class jenis_model extends CI_Model
{
    // Ambil Seluruh Data Jenis Produk
    public function get_all()
    {
        return $this->db->get('jenis_produk');
    }
}
