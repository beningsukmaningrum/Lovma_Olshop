<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Transaksimodel extends CI_Model
{
    public function get_all()
    {
        $result = $this->db->get('transaksi');
        return $result;
    }
    public function find($id)
    {
        $this->db->where('id_transaksi', $id);
        $result = $this->db->get('transaksi');
        return $result->row();
    }
    public function insert_data($data)
    {
        $result = $this->db->insert('transaksi', $data);
        if ($result) {
            $new_id = $this->db->insert_id();
            $data = $this->find($new_id);
            return $data;
        }
        return $result;
    }
    public function update_data($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $result = $this->db->update('transaksi', $data);
        if ($result) {
            $data = $this->find($id);
            return $data;
        }
        return $result;
    }
    public function delete_data($where, $table)
    {

		$this->db->where($where);
		$this->db->delete($table);
        // $this->db->where('id_transaksi', $id);
        // $result = $this->db->delete('transaksi');
        return $this->db->last_query();
    }
}
