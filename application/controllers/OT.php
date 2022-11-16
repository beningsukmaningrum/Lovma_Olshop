<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OT extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		// $data['barang'] = $this->produk_model->get_8data()->result();
		$data['barang'] = $this->produk_model->get_8data()->result();
		// $data['barang'] = $this->produk_model->get_8data()->result();
		if (isset($_SESSION['username'])) {
			$this->load->view('user/header', $data);
			$this->load->view('index', $data);
			$this->load->view('footer');
		} else {
			$this->login();
		}
	}

	public function profil()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('user/header', $data);
		$this->load->view('user/profil');
	}
	public function edit_profil()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama_lengkap', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'Phone', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Birth', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('user/header', $data);
			$this->load->view('user/edit_profil');
		} else {
			$nama_lengkap = $this->input->post('nama_lengkap');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$no_tlp = $this->input->post('no_tlp');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$username = $this->input->post('username');

			$this->db->set('nama_lengkap', $nama_lengkap);
			$this->db->set('email', $email);
			$this->db->set('alamat', $alamat);
			$this->db->set('no_tlp', $no_tlp);
			$this->db->set('tgl_lahir', $tgl_lahir);
			$this->db->where('username', $username);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
			redirect('OT/profil');
		}
	}
	public function password()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('password_skrg', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');


		if ($this->form_validation->run() == false) {
			$this->load->view('user/header', $data);
			$this->load->view('user/password', $data);
		} else {
			$password_skrg = $this->input->post('password_skrg');
			$new_password = $this->input->post('new_password1');

			if (!password_verify($password_skrg, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password !</div>');
				redirect('user/password');
			} else {
				if ($password_skrg == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password !</div>');
					redirect('user/password');
				} else {
					// password yang bener 
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed !</div>');
					redirect('OT/password');
				}
			}
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			//usernya ada
			if ($user['status'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'username' => $user['username'],
						'level_akses' => $user['level_akses'],

					];
					$this->session->set_userdata($data);
					if ($user['level_akses'] == 1) {
						redirect('admin/index');
					} else {
						// redirect('user/index');
						redirect('OT/index');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
					redirect('OT/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not been activated!</div>');
				redirect('OT/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not Registere!</div>');
			redirect('OT/login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('OT/login');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'Phone', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Birth', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
		} else {
			$data = [
				'nama_lengkap' => $this->input->post('nama_lengkap', true),
				'email' => $this->input->post('email', true),
				'alamat' => $this->input->post('alamat', true),
				'no_tlp' => $this->input->post('no_tlp', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'username' => $this->input->post('username', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'level_akses' => 2,
				'status' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Account Has Been Created. Please Login</div>');
			redirect('OT/login');
		}
	}

	public function tambah_keranjang($id_produkdetail)
	{
		// $this->load->model('produk_model');

		$barang = $this->produk_model->find($id_produkdetail);
		$data = array(
			'id'      => $barang->id_produkdetail,
			'qty'     => 1,
			'price'   => $barang->harga_produk,
			'name'    => $barang->nama_produk,
			'foto_produk' => $barang->foto_produk
		);

		$this->cart->insert($data);

		redirect('user/index');
	}

	public function shop_cart()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('user/header', $data);
		$this->load->view('shop-cart');
		$this->load->view('footer');
	}
	public function hapus_cart($rowid)
	{
		$this->cart->remove($rowid);
		redirect('OT/shop_cart');
	}

	public function contact()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('user/header', $data);
		$this->load->view('contact');
		$this->load->view('footer');
	}
	public function produk_detail($id_produkdetail)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->produk_model->detail_barang($id_produkdetail);

		$this->load->view('user/header', $data);
		$this->load->view('produk_detail', $data);
		$this->load->view('footer');
	}

	public function product()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->produk_model->get_all()->result();
		$this->load->view('user/header', $data);
		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	public function aboutus()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('user/header', $data);
		$this->load->view('aboutus');
		$this->load->view('footer');
	}
	public function index_login()
	{
		$this->load->model('produk_model');
		// $data['produk'] = $this->produk_model->get_new5data();
		$data['barang'] = $this->produk_model->get_new8data();
		$this->load->view('header');
		$this->load->view('login/index_login', $data);
		$this->load->view('footer');
	}
	public function product_login()
	{
		$data['barang'] = $this->produk_model->get_all()->result();
		$this->load->view('header');
		$this->load->view('login/product_login', $data);
		$this->load->view('footer');
	}
	public function about_login()
	{
		$this->load->view('header');
		$this->load->view('aboutus');
		$this->load->view('footer');
	}
	public function contact_login()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	public function search()
	{
		$keyword            = $this->input->get('keyword');
		$data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang']     = $this->produk_model->get_produk_by_keyword($keyword);

		$this->load->view('user/header', $data);
		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	public function filter_fashion()
	{
		$data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang']     = $this->produk_model->get_produk_fashion();

		$this->load->view('user/header', $data);
		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	public function filter_hijab()
	{
		$data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang']     = $this->produk_model->get_produk_hijab();

		$this->load->view('user/header', $data);
		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	public function checkout()
	{

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('user/header', $data);
		$this->load->view('checkout', $data);
		$this->load->view('footer');
	}

	public function proses_checkout()
	{
		// $is_processed = $this->model_transaksi->index();
		// if ($is_processed) {
		$this->load->model('Produk_model');
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		// $this->db->query("INSERT INTO `transaksi` (`id_user`, `total_harga`) VALUES ('20', 154000) ");


		$grand_total = 0;
		foreach ($this->cart->contents() as $items) {
			$grand_total = $grand_total + $items['subtotal'];
		}

		$this->Produk_model->checkout($data['user'], $grand_total);
		$this->Produk_model->checkout1($data['user']);

		$this->load->view('user/header', $data);
		// $this->load->view('proses_checkout');
		$this->load->view('user/resi');
		// $this->load->view('footer');
		// } else {
		//     echo "Pesanan Anda Gagal di Proses";
		// }
		$this->cart->destroy();
	}
}
