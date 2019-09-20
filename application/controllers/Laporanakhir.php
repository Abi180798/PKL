<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

class Laporanakhir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
    }
    public function index()
    {
        $data['title'] = 'Laporan Akhir';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Laporan_model', 'lap');
        $data['menu'] = $this->lap->test();
        // var_dump($data['menu']);

        $data['vol'] = 0;
        foreach ($data['menu'] as $m) {
            $data['vol'] = $data['vol'] + $m['volume'];
        }
        $data['vols'] = 0;
        foreach ($data['menu'] as $m) {
            $data['vols'] = $data['vols'] + $m['volumes'];
        }
        $data['jumlah'] = 0;
        foreach ($data['menu'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['total'];
        }
        $data['jumlahs'] = 0;
        foreach ($data['menu'] as $m) {
            $data['jumlahs'] = $data['jumlahs'] + $m['totals'];
        }


        // $this->form_validation->set_rules('tgl_pene', 'Penerimaan', 'required', [
        //     'required' => 'Tanggal Pembukuan harus diisi'
        // ]);
        // $this->form_validation->set_rules('dari', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('tgl_doc_peng', 'Penerimaan', 'required', [
        //     'required' => 'Tanggal Dokumentasi harus diisi'
        // ]);
        // $this->form_validation->set_rules('no_doc_peng', 'Penerimaan', 'required', [
        //     'required' => 'No Dokumentasi harus diisi'
        // ]);
        // $this->form_validation->set_rules('kode_brg', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('nama_brg', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('satuan', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('vol', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('harga', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('total', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('no_buk_pen', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('tgl_buk_pen', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);
        // $this->form_validation->set_rules('ket', 'Penerimaan', 'required', [
        //     'required' => 'Data Toko harus diisi'
        // ]);

        // $vol = $this->input->post('vol');
        // $harga = $this->input->post('harga');
        // $total = $vol * $harga;


        // if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporanakhir/index', $data);
        $this->load->view('templates/footer', $data);
        // } else {
        //     // $query = $this->input->get('query');
        //     // $this->db->like('nama_brg', $query);


        //     // $data = $this->db->get("tknpm_penerimaan")->result();


        //     // echo json_encode($data);

        //     $data = [
        //         'tgl_pene' => $this->input->post('tgl_pene'),
        //         'dari' => $this->input->post('dari'),
        //         'no_doc_peng' => $this->input->post('no_doc_peng'),
        //         'tgl_doc_peng' => $this->input->post('tgl_doc_peng'),
        //         'kode_brg' => $this->input->post('kode_brg'),
        //         'nama_brg' => $this->input->post('nama_brg'),
        //         'satuan' => $this->input->post('satuan'),
        //         'volume' => $vol,
        //         'harga' => $harga,
        //         'total' => $total,
        //         'no_buk_pen' => $this->input->post('no_buk_pen'),
        //         'tgl_buk_pen' => $this->input->post('tgl_buk_pen'),
        //         'ket' => $this->input->post('ket')
        //     ];
        //     $this->db->insert('tknpm_penerimaan', $data);
        //     $this->session->set_flashdata('message', 'Dibuat');
        //     redirect('penerimaan');
        // }
    }
    // public function edit()
    // {
    //     $data['title'] = 'Penerimaan Barang';
    //     $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
    //     $this->load->model('Penerimaan_model', 'data');
    //     $data['id'] = $this->uri->segment(3);
    //     $data['brg'] = $this->db->get_where('tknpm_penerimaan', array('id' => $data['id']))->row_array();

    //     $this->form_validation->set_rules('kode_brg', 'Kode Barang', 'trim|required', [
    //         'required' => 'Kode harus diisi'
    //     ]);
    //     $this->form_validation->set_rules('nama_brg', 'Nama barang', 'trim|required', [
    //         'required' => 'Nama barang harus diisi'
    //     ]);
    //     $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
    //         'required' => 'Satuan harus diisi'
    //     ]);
    //     $this->form_validation->set_rules('harga', 'Harga', 'required', [
    //         'required' => 'Harga harus diisi'
    //     ]);
    //     $vol = $this->input->post('vol');
    //     $harga = $this->input->post('harga');
    //     $total = $vol * $harga;
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('penerimaan/edit', $data);
    //         $this->load->view('templates/footer', $data);
    //     } else {
    //         $data = [
    //             'tgl_pene' => $this->input->post('tgl_pene'),
    //             'dari' => $this->input->post('dari'),
    //             'no_doc_peng' => $this->input->post('no_doc_peng'),
    //             'tgl_doc_peng' => $this->input->post('tgl_doc_peng'),
    //             'kode_brg' => $this->input->post('kode_brg'),
    //             'nama_brg' => $this->input->post('nama_brg'),
    //             'satuan' => $this->input->post('satuan'),
    //             'volume' => $this->input->post('vol'),
    //             'harga' => $this->input->post('harga'),
    //             'total' => $total,
    //             'no_buk_pen' => $this->input->post('no_buk_pen'),
    //             'tgl_buk_pen' => $this->input->post('tgl_buk_pen'),
    //             'ket' => $this->input->post('ket')
    //         ];
    //         $id = $this->input->post('id');


    //         $this->data->editDatapene($data, $id);
    //         $this->session->set_flashdata('message', 'Diedit');
    //         redirect('penerimaan');
    //     }
    // }
    // public function hapus()
    // {
    //     $id = $this->uri->segment(3);
    //     $this->load->model('Penerimaan_model', 'data');
    //     $this->data->hapusData($id);
    //     $this->session->set_flashdata('message', 'Dihapus');
    //     redirect('penerimaan');
    // }
    // public function delAll()
    // {
    //     $this->load->model('Penerimaan_model', 'del');
    //     $this->del->delAll();
    //     redirect('penerimaan');
    // }

    // function get_autocomplete()
    // {
    //     $this->load->model('Penerimaan_model', 'pen');
    //     if (isset($_GET['term'])) {
    //         $result = $this->pen->search_blog($_GET['term']);
    //         if (count($result) > 0) {
    //             foreach ($result as $row)
    //                 $arr_result[] = array(
    //                     'kode'         => $row->kode,
    //                     'label'         => $row->nama_brg,
    //                     'satuan'   => $row->satuan,
    //                 );
    //             echo json_encode($arr_result);
    //         }
    //     }
    // }

    // public function laporan()
    // {
    //     $this->load->model('Penerimaan_model', 'pen');
    //     $this->load->library('mypdf');
    //     $data['data'] = $this->pen->getallData();
    //     $this->mypdf->generate('penerimaan/index', $data['data'], 'Buku Penerimaan', 'A4', 'landscape');
    // }
    public function penlaporan()
    {
        $this->load->model('Laporan_model', 'lap');
        $data['menu'] = $this->lap->test();
        $this->load->library('mypdf');
        $data['vol'] = 0;
        foreach ($data['menu'] as $m) {
            $data['vol'] = $data['vol'] + $m['volume'];
        }
        $data['vols'] = 0;
        foreach ($data['menu'] as $m) {
            $data['vols'] = $data['vols'] + $m['volumes'];
        }
        $data['jumlah'] = 0;
        foreach ($data['menu'] as $m) {
            $data['jumlah'] = $data['jumlah'] + $m['total'];
        }
        $data['jumlahs'] = 0;
        foreach ($data['menu'] as $m) {
            $data['jumlahs'] = $data['jumlahs'] + $m['totals'];
        }
        $data['atasan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'atasan'])->row_array();
        $data['penyimpan'] = $this->db->get_where('tknpm_sebagai', ['sebagai' => 'penyimpan'])->row_array();
        $tgl = $data['penyimpan'];
        $data['tgl'] = $this->tgl_indo($tgl['tgl']);
        // $data['data'] = $this->pen->getallData();
        // $data['jumlah'] = 0;
        // foreach ($data['data'] as $m) {
        //     $data['jumlah'] = $data['jumlah'] + $m['total'];
        // }
        $this->mypdf->generate('laporan/akhir', $data, 'Buku Laporan Akhir', 'legal', 'landscape');
        // $this->load->view('laporan/dompdf', $data);
    }
    // public function ajax()
    // {
    //     $kode = $_GET['kode'];
    //     $koneksi = mysqli_connect("localhost", "root", "", "tknpm_aset");
    //     $query = mysqli_query($koneksi, "select * from tknpm_kode_barang where kode='$kode'");
    //     $brg = mysqli_fetch_array($query);
    //     $data = array(
    //         'nama_brg' => $brg['nama_brg'],
    //         'satuan' => $brg['satuan'],
    //     );
    //     echo json_encode($data);
    // }
    function tgl_indo($tanggal)
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
        // $this->load->model('Penerimaan_model', 'pen');
        $this->load->model('Laporan_model', 'lap');
        $query = $kode;

        $data = $this->lap->fetch_data($query);
        $jml = 0;
        foreach ($data->result() as $row) {
            $jml = $jml + $row->total;
        }
        $output .= '
      <div class="table-responsive">
         <table class="table table-bordered table-striped">
         <tr class="table-primary text-nowrap">
         <th rowspan="2">No</th>
                    <th rowspan="2">Kode Barang</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Satuan</th>
                    <th colspan="3">Jumlah Barang</th>
                    <th colspan="3">Jumlah Harga</th>
                    <th rowspan="2">Keterangan</th>
                    </tr>
                <tr class="table-primary">
                    <th scope="col">Masuk</th>
                    <th scope="col">Keluar</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Bertambah</th>
                    <th scope="col">Berkurang</th>
                    <th scope="col">Saldo</th>
                </tr>
      ';
        $i = 1;
        if ($data->num_rows() > 0) {
            $sisa = '';
            $saldo = '';
            foreach ($data->result() as $row) {
                $output .= '
          <tr>
          <td>' . $i . '</td>
          <td>' . $row->kode_brg . '</td>
          <td>' . $row->nama_brg . '</td>
          <td>' . $row->satuan . '</td>
          <td>' . $row->volume . '</td>
          <td>' . $row->volumes . '</td>
          <td>' . $sisa = $row->volume - $row->volumes . '</td>
          <td>' . $row->harga . '</td>
          <td>' . $row->hargas . '</td>
          <td>' . $saldo = $row->harga - $row->hargas . '</td>
          <td>' . $row->ket . '</td>

          </tr>
          
        ';
                $i++;
            }
            $output .= '<tr>
        <th colspan="8">Total</th>
        <th colspan="5">Rp.' . $jml . '</th>
        </tr>';
        } else {
            $output .= '<tr>
           <td colspan="15" align="center">No Data Found</td>
          </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
    // public function kirim()
    // {
    //     $id = $this->uri->segment(3);
    //     $this->load->model('Penerimaan_model', 'data');
    //     $data = $this->db->get_where('tknpm_penerimaan', array('id' => $id))->row_array();
    //     $datae = [
    //         'tgl_peng' => $data['tgl_pene'],
    //         'no_spbrg' => $data['no_doc_peng'],
    //         'tgl_spbrg' => $data['tgl_doc_peng'],
    //         'nm_un_kerja' => $data['dari'],
    //         'kode_brg' => $data['kode_brg'],
    //         'nama_brg' => $data['nama_brg'],
    //         'satuan' => $data['satuan'],
    //         'volume' => $data['volume'],
    //         'harga' => $data['harga'],
    //         'total' => $data['total'],
    //         'tgl_peny' => $data['tgl_buk_pen'],
    //         'ket' => $data['ket'],

    //     ];
    //     $trig = $this->db->where('kode_brg', $datae['kode_brg']);
    //     $trig = $this->db->get('tknpm_pengeluaran')->result_array();
    //     // $num = $trig->num_rows();
    //     // var_dump($num);
    //     // var_dump($trig);
    //     // echo 'pembatas';
    //     // var_dump($data);
    //     foreach ($trig as $row) {
    //         if ($row['kode_brg'] == $datae['kode_brg']) {
    //             $this->session->set_flashdata('messages', 'Dikirim');
    //             redirect('penerimaan');
    //         }
    //     }
    //     if (empty($trig)) {
    //         $this->data->kirimData($datae, $id);
    //         $this->session->set_flashdata('message', 'Dikirim');
    //         redirect('pengeluaran');
    //     }
    // }
    // function kirimAll()
    // {
    //     $this->load->model('Penerimaan_model', 'pen');
    //     $datas = $this->pen->getallData();


    //     var_dump($datas);
    // }
}
