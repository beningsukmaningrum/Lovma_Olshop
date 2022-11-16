<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Produk_model extends CI_Model
{
	// Ambil Seluruh Data Produk
	public function get_all()
	{
		$this->db->select('*, produk_detail.id_jenis as idjenis');
		$this->db->from('produk_detail');
		$this->db->join('jenis_produk', 'jenis_produk.id_jenis = produk_detail.id_jenis');
		return $this->db->get();
	}

	public function get_8data()
	{
		$this->db->select('*');
		$this->db->from('produk_detail');
		$this->db->join('jenis_produk', 'jenis_produk.id_jenis = produk_detail.id_jenis');
		$this->db->order_by('produk_detail.id_produkdetail', 'DESC');
		// $this->db->order_by('DESC');
		$this->db->limit(8);
		return $this->db->get();
	}

	// Ambil Data Produk By ID
	public function getProdukByID($id_produkdetail)
	{
		return $this->db->get_where('produk_detail', ['id_produkdetail' => $id_produkdetail])->row_array();
	}

	//Ambil Data Produk 8 Terbaru
	public function get_new8data()
	{
		$query = "SELECT * FROM produk_detail as pd JOIN jenis_produk as jp WHERE pd.id_jenis = jp.id_jenis ORDER BY pd.id_produkdetail DESC LIMIT 8";
		return $this->db->query($query)->result_array();
	}

	// Tambah Data Produk
	public function insert_produk($data, $table)
	{
		$this->db->insert($table, $data);
	}

	//  Edit Data Produk
	public function update_produk($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_model($id_produkdetail, $data)
	{
		$temp = array(
			'create_by' => $this->session->userdata('id_user'),
			'create_date' => date('Y-m-d H:i:s'),
			'id_produkdetail' => $id_produkdetail,
		);
		echo var_dump($temp);
		$this->db->insert('historydata_produkdetail', $temp);
		$this->db->where('id_produkdetail', $id_produkdetail);
		$this->db->update('produk_detail', $data);
	}

	// Hapus Data Produk
	public function hapus_barang($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//Cari Data Produk
	public function find($id_produkdetail)
	{
		$result = $this->db->where('id_produkdetail', $id_produkdetail)
			->limit(1)
			->get('produk_detail');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function detail_barang($id_produkdetail)
	{
		$query = "SELECT * FROM produk_detail as pd LEFT JOIN jenis_produk as jp ON pd.id_jenis = jp.id_jenis WHERE pd.id_produkdetail=$id_produkdetail";
		// $result = $this->db->where('id_produkdetail', $id_produkdetail)->get('produk_detail');
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	public function get_produk_by_keyword($keyword)
	{
		$this->db->select('*, produk_detail.id_jenis as idjenis');
		$this->db->from('produk_detail');
		$this->db->join('jenis_produk', 'jenis_produk.id_jenis = produk_detail.id_jenis');
		$this->db->like('produk_detail.nama_produk', $keyword);
		$this->db->or_like('jenis_produk.nama_jenis', $keyword);
		return $this->db->get()->result();
	}

	public function get_produk_fashion()
	{
		$this->db->select('*, produk_detail.id_jenis as idjenis');
		$this->db->from('produk_detail');
		$this->db->join('jenis_produk', 'jenis_produk.id_jenis = produk_detail.id_jenis');
		$this->db->where('produk_detail.id_jenis', 1);
		$this->db->where('jenis_produk.id_jenis', 1);
		return $this->db->get()->result();
	}

	public function get_produk_hijab()
	{
		$this->db->select('*, produk_detail.id_jenis as idjenis');
		$this->db->from('produk_detail');
		$this->db->join('jenis_produk', 'jenis_produk.id_jenis = produk_detail.id_jenis');
		$this->db->where('produk_detail.id_jenis', 2);
		$this->db->where('jenis_produk.id_jenis', 2);
		return $this->db->get()->result();
	}
	public function checkout1($data)
	{
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		// $this->db->limit(1);
		$get = $this->db->get()->result();
		foreach ($this->cart->contents() as $items) {
			$insert = [
				'id_user' => $data['id_user'],
				'id_produkdetail' => $items['id'],
				'id_transaksi' => $get[0]->id_transaksi,
				'jumlah_order' => $items['qty'],
				'sub_harga' => $items['price'],
			];
			// echo var_dump($insert);
			$this->db->insert('invoice', $insert);
		};
	}
	public function checkout($data, $grand_total)
	{
		$insert = array(
			'id_user' => $data['id_user'],
			'total_harga' => $grand_total,
		);
		$transaksi = $this->db->insert('transaksi', $insert);
		// $this->db->insert('transaksi', $insert1);
	}
}
