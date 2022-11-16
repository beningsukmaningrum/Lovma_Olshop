<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Invoicemodel extends CI_Model
{
    public function get_all()
    {
        $this->db->from('invoice');
		$this->db->join('user', 'user.id_user = invoice.id_user');
		$this->db->join('produk_detail', 'produk_detail.id_produkdetail = invoice.id_produkdetail');
		$result = $this->db->get();
        return $result;
    }
    public function find($id)
    {
        $this->db->where('id_invoice', $id);
        $result = $this->db->get('invoice');
        return $result->row();
    }
    public function insert_data($data)
    {
        $result = $this->db->insert('invoice', $data);
        if ($result) {
            $new_id = $this->db->insert_id();
            $data = $this->find($new_id);
            return $data;
        }
        return $result;
    }
    public function update_data($id, $data)
    {
        $this->db->where('id_invoice', $id);
        $result = $this->db->update('invoice', $data);
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
        // $this->db->where('id_invoice', $id);
        // $result = $this->db->delete('invoice');
        return $this->db->last_query();
    }
}
