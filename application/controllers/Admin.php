<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        if ($_SESSION["level_akses"] != 1) {
            redirect('user');
        }
    }


    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
    public function barang()
    {
        $this->load->model('produk_model');
        $this->load->model('jenis_model');
        $data['barang'] = $this->produk_model->get_all()->result();
        $data['jenis_produk'] = $this->jenis_model->get_all()->result();;
        $this->load->view('admin/header');
        $this->load->view('admin/barang', $data);
        $this->load->view('admin/footer');
    }
    public function transaksi()
    {
        $this->load->model('Transaksimodel');
        $data['transaksi'] = $this->Transaksimodel->get_all()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi', $data);
        $this->load->view('admin/footer');
    }
    public function hapustransaksi($id)
    {
        $this->load->model('Transaksimodel');
        $where = array('id_transaksi' => $id);
        $this->Transaksimodel->delete_data($where, 'transaksi');
        redirect('admin/transaksi');
    }
    public function invoice()
    {
        $this->load->model('Invoicemodel');
        $data['invoice'] = $this->Invoicemodel->get_all()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/invoice', $data);
        $this->load->view('admin/footer');
    }
    public function hapusinvoice($id)
    {
        $this->load->model('Invoicemodel');
        $where = array('id_invoice' => $id);
        $this->Invoicemodel->delete_data($where, 'invoice');
        redirect('admin/invoice');
    }
    // public function tambah_barang()
    // {
    //     $nama_produk = $this->input->post('nama_produk');
    //     $harga_produk = $this->input->post('harga_produk');
    //     $stok_produk = $this->input->post('stok_produk');
    //     $jenis_produk = $this->input->post('jenis_produk');
    //     $keterangan = $this->input->post('keterangan');
    //     // $foto_produk = $_FILES['foto_produk']['name'];
    //     // if ($foto_produk == '') {
    //     // } else {
    //     //     $config['upload_path'] = './assets/uploads/';
    //     //     $config['allowed types'] = 'jpg|jpeg|png';
    //     //     $config['max_size'] = '5120';
    //     //     // $this->upload->initialize($config);
    //     //     $this->upload->do_upload('foto_produk');
    //     //     // $foto_produk = $this->upload->data('file_name');

    //     //     if (!$this->upload->do_upload('foto_produk')) {
    //     //         echo "gambar gagal di upload";
    //     //         redirect('admin/barang',);
    //     //     } else {
    //     //         $foto_produk = $this->upload->data('file_name');
    //     //     }
    //     // }

    //     $data = array(
    //         'nama_produk' => $nama_produk,
    //         'harga_produk' => $harga_produk,
    //         'stok_produk' => $stok_produk,
    //         'id_jenis' => $jenis_produk,
    //         'keterangan' => $keterangan,
    //         // 'foto_produk' => $foto_produk
    //     );

    //     $this->produk_model->insert_produk($data, 'produk_detail');
    //     redirect('admin/barang');
    // }

    public function tambah_barang()
    {
        $this->load->model('produk_model');

        $nama_produk = $this->input->post('nama_produk');
        $harga_produk = $this->input->post('harga_produk');
        $stok_produk = $this->input->post('stok_produk');
        $jenis_produk = $this->input->post('jenis_produk');
        $keterangan = $this->input->post('keterangan');
        $foto_produk = $_FILES['foto_produk']['name'];
        if ($foto_produk == '') {
        } else {
            $config['upload_path']          = FCPATH . 'assets/uploads/produk/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = 'produk' . $foto_produk . '.png';
            $config['overwrite']            = true;
            $config['max_size']             = 5024; // 1MB
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->load->library('upload', $config);

            // $config['allowed_types'] = 'jpg|jpeg|png';
            // $config['max_size']     = '5048';
            // $config['upload_path'] = FCPATH . "assets/uploads/produk/";
            // // $image_path = realpath(APPPATH . '../uploads/');
            // // $config['upload_path'] = $image_path;

            // $this->load->library('upload', $config);

            // $this->upload->initialize($config);
            // $this->upload->do_upload('foto_produk');
            // $foto_produk = $this->upload->data('file_name');

            if (!$this->upload->do_upload('foto_produk')) {
                echo "gambar gagal di upload";
                //         redirect('admin/barang',);
            } else {
                $foto_produk = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_produk' => $nama_produk,
            'harga_produk' => $harga_produk,
            'stok_produk' => $stok_produk,
            'id_jenis' => $jenis_produk,
            'keterangan' => $keterangan,
            'foto_produk' => $foto_produk
        );

        $this->produk_model->insert_produk($data, 'produk_detail');
        redirect('admin/barang');
    }

    public function update_barang($id)
    {
        $where = array('id_produkdetail' => $id);
        $data['barang'] = $this->produk_model->update_produk($where, 'produk_detail')->result();
        $data['jenis_produk'] = $this->jenis_model->get_all()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('admin/footer');
    }
    public function update($id_produkdetail)
    {
        $file_name = str_replace('.', '', $id_produkdetail);
        $config['upload_path']          = FCPATH . 'assets/uploads/produk/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = 'produk' . $file_name . '.png';
        $config['overwrite']            = true;
        $config['max_size']             = 5024; // 1MB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('uploadfile')) {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga_produk' => $this->input->post('harga_produk'),
                'stok_produk' => $this->input->post('stok_produk'),
                'id_jenis' => $this->input->post('jenis_produk'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->produk_model->update_model($id_produkdetail, $data);
            redirect('admin/barang');
            $file   = $_FILES['uploadfile']['tmp_name'];
            $error = array('error' => $this->upload->display_errors());
            echo var_dump($error);
            die();
        } else {
            echo var_dump($this->upload->do_upload('uploadfile'));
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga_produk' => $this->input->post('harga_produk'),
                'stok_produk' => $this->input->post('stok_produk'),
                'id_jenis' => $this->input->post('jenis_produk'),
                'keterangan' => $this->input->post('keterangan'),
                'foto_produk' => 'produk' . $file_name . '.png'
            );
            $this->produk_model->update_model($id_produkdetail, $data);
            redirect('admin/barang');
        };
    }

    public function hapus_barang($id_produkdetail)
    {
        $where = array('id_produkdetail' => $id_produkdetail);
        $this->produk_model->hapus_barang($where, 'produk_detail');
        redirect('admin/barang');
    }

    public function detail_barang($id_produkdetail)
    {
        $this->load->model('produk_model');

        $data['barang'] = $this->produk_model->detail_barang($id_produkdetail);
        $this->load->view('admin/header');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('admin/footer');
    }

    public function skincare()
    {
        $this->load->view('header');
        $this->load->view('skincare');
        $this->load->view('footer');
    }
    public function hijab()
    {
        $this->load->view('header');
        $this->load->view('hijab');
        $this->load->view('footer');
    }
    public function aboutus()
    {
        $this->load->view('header');
        $this->load->view('aboutus');
        $this->load->view('footer');
    }
    public function user()
    {
        $data['user'] = $this->user_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/footer');
    }

    public function hapus_user($id_user)
    {
        $where = array('id_user' => $id_user);
        $this->user_model->hapus_user($where, 'user');
        redirect('admin/user');
    }
    public function update_user($id)
    {
        $where = array('id_user' => $id);
        $data['user'] = $this->user_model->update_user($where, 'user')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/edit_user', $data);
        $this->load->view('admin/footer');
    }

    public function update_user2($id_user)
    {
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp'),
            'tgl_lahir' => $this->input->post('tgl_lahir')
        );
        $this->user_model->update_userid($id_user, $data);
        redirect('admin/user');
    }
}
