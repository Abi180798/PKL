<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['pen'] = $this->db->get('tknpm_penerimaan')->num_rows();
        $data['peng'] = $this->db->get('tknpm_pengeluaran')->num_rows();
        $data['kode'] = $this->db->get('tknpm_kode_barang')->num_rows();
        $this->load->model('Admin_model', 'jml');
        $data['jml'] = $this->jml->lapakh();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function editlap()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['atasan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'atasan'])->row_array();
        $data['penyimpan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'penyimpan'])->row_array();
        $this->form_validation->set_rules('atasan', 'Atasan', 'required', [
            'required' => 'Atasan Harus Diisi'
        ]);
        $this->form_validation->set_rules('penyimpan', 'Penyimpan', 'required', [
            'required' => 'Penyimpan Harus Diisi'
        ]);
        $this->form_validation->set_rules('nipa', 'NIP Atasan', 'required', [
            'required' => 'NIP Atasan Harus Diisi'
        ]);
        $this->form_validation->set_rules('nipp', 'NIP Penyimpan', 'required', [
            'required' => 'NIP Penyimpan Harus Diisi'
        ]);
        $this->form_validation->set_rules('tgl', 'Tanggal Laporan', 'required', [
            'required' => 'Tanggal Laporan Harus Diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editlap', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $atasan = [
                'nama' => $this->input->post('atasan'),
                'nip' => $this->input->post('nipa')
            ];

            $penyimpan = [
                'nama' => $this->input->post('penyimpan'),
                'nip' => $this->input->post('nipp'),
                'tgl' => $this->input->post('tgl'),
                'semester' => $this->input->post('semester')
            ];
            $this->load->model('Admin_model', 'seb');
            $this->seb->editSebagai('atasan', $atasan);
            $this->seb->editSebagai('penyimpan', $penyimpan);
            // var_dump($this->seb->editSebagai('penyimpan', $penyimpan));


            $this->session->set_flashdata('message', 'Diedit');
            redirect('admin/editlap');
        }
    }
}
