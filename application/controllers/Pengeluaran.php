<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
    }
    public function index()
    {
        $data['title'] = 'Pengeluaran Barang';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('tknpm_pengeluaran')->result_array();

        $data['jumlah'] = 0;
        foreach ($data['menu'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['totals'];
        }


        $this->form_validation->set_rules('tgl_peng', 'Pengeluaran', 'required', [
            'required' => 'Tanggal Pembukuan harus diisi'
        ]);
        $this->form_validation->set_rules('nm_uk', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_spbrg', 'Pengeluaran', 'required', [
            'required' => 'Tanggal Dokumentasi harus diisi'
        ]);
        $this->form_validation->set_rules('no_spbrg', 'Pengeluaran', 'required', [
            'required' => 'No Dokumentasi harus diisi'
        ]);
        $this->form_validation->set_rules('kode_brg', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('nama_brg', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('vol', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('total', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_peny', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('ket', 'Pengeluaran', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);

        $vol = $this->input->post('vol');
        $harga = $this->input->post('harga');
        $total = $vol * $harga;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengeluaran/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // $query = $this->input->get('query');
            // $this->db->like('nama_brg', $query);


            // $data = $this->db->get("tknpm_pengeluaran")->result();


            // echo json_encode($data);

            $data = [
                'tgl_peng' => $this->input->post('tgl_peng'),
                'nm_un_kerja' => $this->input->post('nm_uk'),
                'smbr' => $this->input->post('smbr'),
                'no_spbrg' => $this->input->post('no_spbrg'),
                'tgl_spbrg' => $this->input->post('tgl_spbrg'),
                'kode_brg' => $this->input->post('kode_brg'),
                'nama_brg' => $this->input->post('nama_brg'),
                'satuan' => $this->input->post('satuan'),
                'volumes' => $vol,
                'hargas' => $harga,
                'totals' => $total,
                'tgl_peny' => $this->input->post('tgl_peny'),
                'kets' => $this->input->post('ket')
            ];
            $this->load->model('Pengeluaran_model', 'ins');
            $this->ins->insertData($data);
            $this->session->set_flashdata('message', 'Dibuat');
            redirect('pengeluaran');
        }
    }
    public function edit()
    {
        $data['title'] = 'Pengeluaran Barang';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Pengeluaran_model', 'data');
        $data['id'] = $this->uri->segment(3);
        $data['brg'] = $this->db->get_where('tknpm_pengeluaran', array('id' => $data['id']))->row_array();

        $this->form_validation->set_rules('kode_brg', 'Kode Barang', 'trim|required', [
            'required' => 'Kode harus diisi'
        ]);
        $this->form_validation->set_rules('nama_brg', 'Nama barang', 'trim|required', [
            'required' => 'Nama barang harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga harus diisi'
        ]);
        $vol = $this->input->post('vol');
        $harga = $this->input->post('harga');
        $total = $vol * $harga;
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengeluaran/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'tgl_peng' => $this->input->post('tgl_peng'),
                'nm_un_kerja' => $this->input->post('nm_un_kerja'),
                'smbr' => $this->input->post('smbr'),
                'no_spbrg' => $this->input->post('no_spbrg'),
                'tgl_spbrg' => $this->input->post('tgl_spbrg'),
                'kode_brg' => $this->input->post('kode_brg'),
                'nama_brg' => $this->input->post('nama_brg'),
                'satuan' => $this->input->post('satuan'),
                'volumes' => $this->input->post('vol'),
                'hargas' => $this->input->post('harga'),
                'totals' => $total,
                'tgl_peny' => $this->input->post('tgl_peny'),
                'kets' => $this->input->post('ket')
            ];
            $id = $this->input->post('id');


            $this->data->editDatapene($data, $id);
            $this->session->set_flashdata('message', 'Diedit');
            redirect('pengeluaran');
        }
    }
    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->load->model('Pengeluaran_model', 'data');
        $this->data->hapusData($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('pengeluaran');
    }
    public function delAll()
    {
        $this->load->model('Pengeluaran_model', 'del');
        $this->del->delAll();
        redirect('pengeluaran');
    }

    function get_autocomplete()
    {
        $this->load->model('Penerimaan_model', 'pen');
        if (isset($_GET['term'])) {
            $result = $this->pen->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'kode'         => $row->kode,
                        'label'         => $row->nama_brg,
                        'satuan'   => $row->satuan,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    // public function laporan()
    // {
    //     $this->load->model('Penerimaan_model', 'pen');
    //     $this->load->library('mypdf');
    //     $data['data'] = $this->pen->getallData();
    //     $this->mypdf->generate('penerimaan/index', $data['data'], 'Buku Penerimaan', 'A4', 'landscape');
    // }
    public function penlaporan()
    {
        $this->load->model('Pengeluaran_model', 'pen');
        $this->load->library('mypdf');
        $data['atasan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'atasan'])->row_array();
        $data['penyimpan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'penyimpan'])->row_array();
        $tgl = $data['penyimpan'];
        $data['tgl'] = $this->tgl_indo($tgl['tgl']);
        $data['data'] = $this->pen->getallData();
        $data['jumlah'] = 0;
        foreach ($data['data'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['totals'];
        }
        $this->mypdf->generate('laporan/lappeng', $data, 'Buku Pengeluaran', 'legal', 'landscape');
        // $this->load->view('laporan/lappeng', $data);
    }
    public function ajax()
    {
        $kode = $_GET['kode'];
        $koneksi = mysqli_connect("localhost", "root", "", "tknpm_aset");
        $query = mysqli_query($koneksi, "select * from tknpm_kode_barang where kode='$kode'");
        $brg = mysqli_fetch_array($query);
        $data = array(
            'nama_brg' => $brg['nama_brg'],
            'satuan' => $brg['satuan'],
        );
        echo json_encode($data);
    }
    public function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('/', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[2];
    }
    function fetch()
    {
        $kode = $_GET['kode'];
        $output = '';
        $query = '';
        $this->load->model('Pengeluaran_model', 'pen');

        $query = $kode;

        $data = $this->pen->fetch_data($query);
        $jml = 0;
        foreach ($data->result() as $row) {
            $jml = $jml + $row->totals;
        }
        $output .= '
      <div class="table-responsive">
         <table class="table table-bordered table-striped">
         <tr class="table-primary text-nowrap">
                        <th rowspan="2">No</th>
                        <th rowspan="2">Tanggal</th>
                        <th colspan="2">Surat Permintaan Barang</th>
                        <th rowspan="2">Nama Unit Kerja</th>
                        <th rowspan="2">Kode Barang</th>
                        <th rowspan="2">Nama Barang</th>
                        <th rowspan="2">Satuan</th>
                        <th rowspan="2">Volume</th>
                        <th rowspan="2">Harga Satuan</th>
                        <th rowspan="2">Jumlah Harga</th>
                        <th rowspan="2">Tanggal Penyerahan</th>
                        <th rowspan="2">Keterangan</th>
                        <th rowspan="2">Action</th>
                    </tr>
     <tr class="table-primary">
         <th scope="col">No</th>
         <th scope="col">Tanggal</th>
     </tr>
      ';
        $i = 1;
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {

                $output .= '
          <tr>
          <td>' . $i . '</td>
          <td>' . $row->tgl_peng . '</td>
          <td>' . $row->no_spbrg . '</td>
          <td>' . $row->tgl_spbrg . '</td>
          <td>' . $row->nm_un_kerja . '</td>
          <td>' . $row->kode_brg . '</td>
          <td>' . $row->nama_brg . '</td>
          <td>' . $row->satuan . '</td>
          <td>' . $row->volumes . '</td>
          <td>' . $row->hargas . '</td>
          <td>' . $row->totals . '</td>
          <td>' . $row->tgl_peny . '</td>
          <td>' . $row->kets . '</td>
          <td><a href="" class="badge badge-warning">Kirim</a>
          <a href="' . base_url('pengeluaran/edit/') . '' . $row->id . '" class="badge badge-success">Edit</a>
          <a href="' . base_url('pengeluaran/hapus/') . '' . $row->id . '" class="badge badge-danger tombol-hapus">Hapus</a>
          </td>

          </tr>
          
        ';
                $i++;
            }
            $output .= '<tr>
        <th colspan="10">Total</th>
        <th colspan="4">Rp.' . $jml . '</th>
        </tr>';
        } else {
            $output .= '<tr>
           <td colspan="14" align="center">No Data Found</td>
          </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
}
