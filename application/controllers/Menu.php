<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manajemen Kode Barang';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();

        //$data['menu'] = $this->db->get('tknpm_kode_barang')->result_array();//bisa juga dipake
        $this->load->model('Menu_model', 'data');

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            echo $this->input->post('keyword');
        }


        // $config['total_rows'] = $this->data->countData();
        // $config['per_page'] = 10;


        // $this->pagination->initialize($config);

        // $data['start'] = $this->uri->segment(3);
        $data['brg'] = $this->data->getallData();

        $this->form_validation->set_rules('kode', 'Kode Barang', 'trim|required|is_unique[tknpm_kode_barang.kode]', [
            'required' => 'Kode harus diisi',
            'is_unique' => 'Kode harus unik'
        ]);
        $this->form_validation->set_rules('brg', 'Nama barang', 'trim|required|is_unique[tknpm_kode_barang.nama_brg]', [
            'required' => 'Nama barang harus diisi',
            'is_unique' => 'Nama barang harus unik'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $kode = $this->input->post('kode');
            $brg = $this->input->post('brg');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
            $this->data->insertBrg($kode, $brg, $satuan, $harga);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('menu');
        }
    }
    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->load->model('Menu_model', 'data');
        $this->data->hapusData($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('menu');
    }
    public function edit()
    {
        $data['title'] = 'Manajemen Kode Barang';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'data');
        $data['id'] = $this->uri->segment(3);
        $data['brg'] = $this->db->get_where('tknpm_kode_barang', array('id' => $data['id']))->row_array();

        $this->form_validation->set_rules('kode', 'Kode Barang', 'trim|required', [
            'required' => 'Kode harus diisi'
        ]);
        $this->form_validation->set_rules('brg', 'Nama barang', 'trim|required', [
            'required' => 'Nama barang harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id = $this->input->post('id');
            $kode = $this->input->post('kode');
            $brg = $this->input->post('brg');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');

            $this->data->editData($kode, $brg, $satuan, $harga, $id);
            $this->session->set_flashdata('message', 'Diedit');
            redirect('menu');
        }
    }
}
