<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

class Penerimaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
    }
    public function index()
    {
        $data['title'] = 'Penerimaan Barang';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        // var_dump(date('Y-m-d'));
        $data['menu'] = $this->db->get('tknpm_penerimaan')->result_array();

        $data['jumlah'] = 0;
        foreach ($data['menu'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['total'];
        }


        $this->form_validation->set_rules('tgl_pene', 'Penerimaan', 'required', [
            'required' => 'Tanggal Pembukuan harus diisi'
        ]);
        $this->form_validation->set_rules('dari', 'Penerimaan', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('sumber', 'Penerimaan', 'required', [
            'required' => 'Sumber Dana harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_doc_peng', 'Penerimaan', 'required', [
            'required' => 'Tanggal Dokumentasi harus diisi'
        ]);
        $this->form_validation->set_rules('no_doc_peng', 'Penerimaan', 'required', [
            'required' => 'No Dokumentasi harus diisi'
        ]);
        $this->form_validation->set_rules('kode_brg', 'Penerimaan', 'required', [
            'required' => 'Kode Barang harus diisi'
        ]);
        $this->form_validation->set_rules('nama_brg', 'Penerimaan', 'required', [
            'required' => 'Nama Barang harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Penerimaan', 'required', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('vol', 'Penerimaan', 'required', [
            'required' => 'Volume harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Penerimaan', 'required', [
            'required' => 'Harga harus diisi'
        ]);
        $this->form_validation->set_rules('total', 'Penerimaan', 'required', [
            'required' => 'Total harus diisi'
        ]);
        $this->form_validation->set_rules('no_buk_pen', 'Penerimaan', 'required', [
            'required' => 'No Bukti Penerimaan harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_buk_pen', 'Penerimaan', 'required', [
            'required' => 'Tanggal Bukti Penerimaan harus diisi'
        ]);

        $vol = $this->input->post('vol');
        $harga = $this->input->post('harga');
        if ($vol != null && $harga != null) {

            $total = $vol * $harga;
        }


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // $query = $this->input->get('query');
            // $this->db->like('nama_brg', $query);


            // $data = $this->db->get("tknpm_penerimaan")->result();


            // echo json_encode($data);

            $data = [
                'tgl_pene' => $this->input->post('tgl_pene'),
                'dari' => $this->input->post('dari'),
                'sumber' => $this->input->post('sumber'),
                'no_doc_peng' => $this->input->post('no_doc_peng'),
                'tgl_doc_peng' => $this->input->post('tgl_doc_peng'),
                'kode_brg' => $this->input->post('kode_brg'),
                'nama_brg' => $this->input->post('nama_brg'),
                'satuan' => $this->input->post('satuan'),
                'volume' => $vol,
                'harga' => $harga,
                'total' => $total,
                'no_buk_pen' => $this->input->post('no_buk_pen'),
                'tgl_buk_pen' => $this->input->post('tgl_buk_pen'),
                'status' => $this->input->post('status'),
                'ket' => $this->input->post('ket')
            ];
            $this->load->model('Penerimaan_model', 'ins');
            $this->ins->insertData($data);
            $this->session->set_flashdata('message', 'Dibuat');
            redirect('penerimaan');
        }
    }
    public function edit()
    {
        $data['title'] = 'Penerimaan Barang';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Penerimaan_model', 'data');
        $data['id'] = $this->uri->segment(3);
        $data['brg'] = $this->db->get_where('tknpm_penerimaan', array('id' => $data['id']))->row_array();

        $this->form_validation->set_rules('tgl_pene', 'Penerimaan', 'required', [
            'required' => 'Tanggal Pembukuan harus diisi'
        ]);
        $this->form_validation->set_rules('dari', 'Penerimaan', 'required', [
            'required' => 'Data Toko harus diisi'
        ]);
        $this->form_validation->set_rules('sumber', 'Penerimaan', 'required', [
            'required' => 'Sumber Dana harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_doc_peng', 'Penerimaan', 'required', [
            'required' => 'Tanggal Dokumentasi harus diisi'
        ]);
        $this->form_validation->set_rules('no_doc_peng', 'Penerimaan', 'required', [
            'required' => 'No Dokumentasi harus diisi'
        ]);
        $this->form_validation->set_rules('kode_brg', 'Penerimaan', 'required', [
            'required' => 'Kode Barang harus diisi'
        ]);
        $this->form_validation->set_rules('nama_brg', 'Penerimaan', 'required', [
            'required' => 'Nama Barang harus diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Penerimaan', 'required', [
            'required' => 'Satuan harus diisi'
        ]);
        $this->form_validation->set_rules('vol', 'Penerimaan', 'required', [
            'required' => 'Volume harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Penerimaan', 'required', [
            'required' => 'Harga harus diisi'
        ]);
        $this->form_validation->set_rules('total', 'Penerimaan', 'required', [
            'required' => 'Total harus diisi'
        ]);
        $this->form_validation->set_rules('no_buk_pen', 'Penerimaan', 'required', [
            'required' => 'No Bukti Penerimaan harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_buk_pen', 'Penerimaan', 'required', [
            'required' => 'Tanggal Bukti Penerimaan harus diisi'
        ]);
        $vol = $this->input->post('vol');
        $harga = $this->input->post('harga');
        $total = $vol * $harga;
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penerimaan/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'tgl_pene' => $this->input->post('tgl_pene'),
                'dari' => $this->input->post('dari'),
                'sumber' => $this->input->post('sumber'),
                'no_doc_peng' => $this->input->post('no_doc_peng'),
                'tgl_doc_peng' => $this->input->post('tgl_doc_peng'),
                'kode_brg' => $this->input->post('kode_brg'),
                'nama_brg' => $this->input->post('nama_brg'),
                'satuan' => $this->input->post('satuan'),
                'volume' => $this->input->post('vol'),
                'harga' => $this->input->post('harga'),
                'total' => $total,
                'no_buk_pen' => $this->input->post('no_buk_pen'),
                'tgl_buk_pen' => $this->input->post('tgl_buk_pen'),
                'status' => $this->input->post('status'),
                'ket' => $this->input->post('ket')
            ];
            $id = $this->input->post('id');


            $this->data->editDatapene($data, $id);
            $this->session->set_flashdata('message', 'Diedit');
            redirect('penerimaan');
        }
    }
    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->load->model('Penerimaan_model', 'data');
        $this->data->hapusData($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('penerimaan');
    }
    public function delAll()
    {
        $this->load->model('Penerimaan_model', 'del');
        $this->del->delAll();
        redirect('penerimaan');
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
    public function sumber()
    {
        if (isset($_GET['term'])) {

            $arr_result = array(
                'Komite',
                'BOP',
                'Lain-lain'
            );
            echo json_encode($arr_result);
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
        $this->load->model('Penerimaan_model', 'pen');
        $this->load->library('mypdf');
        $data['atasan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'atasan'])->row_array();
        $data['penyimpan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'penyimpan'])->row_array();
        $tgl = $data['penyimpan'];
        $data['tgl'] = $this->tgl_indo($tgl['tgl']);
        $data['data'] = $this->pen->getallData();
        $data['jumlah'] = 0;
        foreach ($data['data'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['total'];
        }
        $this->mypdf->generate('laporan/dompdf', $data, 'Buku Penerimaan', 'legal', 'landscape');
        // $this->load->view('laporan/dompdf', $data);
    }
    public function penlaporans()
    {
        $this->load->model('Penerimaan_model', 'pen');
        $this->load->library('mypdf');
        $data['atasan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'atasan'])->row_array();
        $data['penyimpan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'penyimpan'])->row_array();
        $tgl = $data['penyimpan'];
        $data['tgl'] = $this->tgl_indo($tgl['tgl']);
        $data['data'] = $this->pen->getallData();
        $data['jumlah'] = 0;
        foreach ($data['data'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['total'];
        }
        $this->mypdf->generates('laporan/dompdf', $data, 'Buku Penerimaan', 'legal', 'landscape');
        // $this->load->view('laporan/dompdf', $data);
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
        $this->load->model('Penerimaan_model', 'pen');

        $query = $kode;

        $data = $this->pen->fetch_data($query);
        $jml = 0;
        foreach ($data->result() as $row) {
            $jml = $jml + $row->total;
        }
        $output .= '
      <div class="table-responsive">
         <table class="table table-bordered table-striped">
         <tr class="table-primary text-nowrap">
         <th rowspan="2">No</th>
         <th rowspan="2">Tanggal</th>
         <th rowspan="2">Dari (Nama Rekanan)</th>
         <th rowspan="2">Sumber</th>
         <th colspan="2">Dokumen Pengadaan</th>
         <th rowspan="2">Kode Barang</th>
         <th rowspan="2">Nama Barang</th>
         <th rowspan="2">Satuan</th>
         <th rowspan="2">Volume</th>
         <th rowspan="2">Harga Satuan</th>
         <th rowspan="2">Jumlah Harga</th>
         <th colspan="2">Bukti Penerimaan</th>
         <th rowspan="2">Status</th>
         <th rowspan="2">Keterangan</th>
         <th rowspan="2">Action</th>
     </tr>
     <tr class="table-primary">
         <th scope="col">No</th>
         <th scope="col">Tanggal</th>
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
          <td>' . $row->tgl_pene . '</td>
          <td>' . $row->dari . '</td>
          <td>' . $row->sumber . '</td>
          <td>' . $row->no_doc_peng . '</td>
          <td>' . $row->tgl_doc_peng . '</td>
          <td>' . $row->kode_brg . '</td>
          <td>' . $row->nama_brg . '</td>
          <td>' . $row->satuan . '</td>
          <td>' . $row->volume . '</td>
          <td>' . 'Rp.' . $row->harga . '</td>
          <td>' . 'Rp.' . $row->total . '</td>
          <td>' . $row->no_buk_pen . '</td>
          <td>' . $row->tgl_buk_pen . '</td>
          <td>' . $row->status . '</td>
          <td>' . $row->ket . '</td>
          <td><a href="" class="badge badge-warning">Kirim</a>
          <a href="' . base_url('penerimaan/edit/') . '' . $row->id . '" class="badge badge-success">Edit</a>
          <a href="' . base_url('penerimaan/hapus/') . '' . $row->id . '" class="badge badge-danger tombol-hapus">Hapus</a>
          </td>

          </tr>
          
        ';
                $i++;
            }
            $output .= '<tr>
        <th colspan="11">Total</th>
        <th colspan="6">Rp.' . $jml . '</th>
        </tr>';
        } else {
            $output .= '<tr>
           <td colspan="16" align="center">No Data Found</td>
          </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
    public function kirim()
    {
        $id = $this->uri->segment(3);
        $this->load->model('Penerimaan_model', 'data');
        $data = $this->db->get_where('tknpm_penerimaan', array('id' => $id))->row_array();
        $datae = [
            'tgl_peng' => $data['tgl_pene'],
            'no_spbrg' => $data['no_doc_peng'],
            'tgl_spbrg' => $data['tgl_doc_peng'],
            'nm_un_kerja' => $data['dari'],
            'smbr' => $data['sumber'],
            'kode_brg' => $data['kode_brg'],
            'nama_brg' => $data['nama_brg'],
            'satuan' => $data['satuan'],
            'volumes' => $data['volume'],
            'hargas' => $data['harga'],
            'totals' => $data['total'],
            'tgl_peny' => $data['tgl_buk_pen'],
            'stts' => $data['status'],
            'kets' => $data['ket'],

        ];
        $trig = $this->db->where('kode_brg', $datae['kode_brg']);
        $trig = $this->db->get('tknpm_pengeluaran')->result_array();
        $kodeizin = $this->db->get_where('tknpm_kode_barang', ['kode' => '15.01.01.0516'])->row_array();
        // var_dump($kodeizin);
        // $num = $trig->num_rows();
        // var_dump($num);
        // var_dump($trig);
        // echo 'pembatas';
        // var_dump($data);
        foreach ($trig as $row) {
            if ($row['kode_brg'] == $kodeizin['kode']) {
                $this->data->kirimData($datae, $id);
                $this->session->set_flashdata('message', 'Dikirim');
                redirect('pengeluaran');
            } elseif ($row['kode_brg'] == $datae['kode_brg'] && $row['nm_un_kerja'] == $datae['nm_un_kerja']) {
                $this->session->set_flashdata('messages', 'Dikirim');
                redirect('penerimaan');
            } elseif ($row['kode_brg'] == $datae['kode_brg'] && $row['nm_un_kerja'] != $datae['nm_un_kerja']) {
                $this->data->kirimData($datae, $id);
                $this->session->set_flashdata('message', 'Dikirim');
                redirect('pengeluaran');
            }
        }
        if (empty($trig)) {
            $this->data->kirimData($datae, $id);
            $this->session->set_flashdata('message', 'Dikirim');
            redirect('pengeluaran');
        }
    }
    function kirimAll()
    {
        $this->load->model('Penerimaan_model', 'pen');
        $datas = $this->pen->getallData();

        foreach ($datas as $s) {
            $data = [
                'tgl_peng' => $s['tgl_pene'],
                'nm_un_kerja' => $s['dari'],
                'smbr' => $s['sumber'],
                'no_spbrg' => $s['no_doc_peng'],
                'tgl_spbrg' => $s['tgl_doc_peng'],
                'kode_brg' => $s['kode_brg'],
                'nama_brg' => $s['nama_brg'],
                'satuan' => $s['satuan'],
                'volumes' => $s['volume'],
                'hargas' => $s['harga'],
                'totals' => $s['total'],
                'stts' => $s['status'],
                'tgl_peny' => $s['tgl_buk_pen'],
                'kets' => $s['ket']
            ];

            $this->pen->insertall($data);
        }
        $this->session->set_flashdata('message', 'Dikirim');
        redirect('pengeluaran');
        // var_dump($datas);
    }
}
