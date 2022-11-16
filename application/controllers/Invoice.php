<?php
class Invoice extends CI_Controller
{
    public function index()
    {

        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('');
    }
}
