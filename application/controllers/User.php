<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    // halaman untuk customer setelah login
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['barang'] = $this->produk_model->get_all()->result();
        $data['barang'] = $this->produk_model->get_8data()->result();

        $this->load->view('user/header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('OT/login');
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
            redirect('user/profil');
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
                    redirect('user/password');
                }
            }
        }
    }
}
