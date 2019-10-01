<?php

class Pengeluaran_model extends CI_Model
{
    public function getallData()
    {
        $this->db->order_by("nama_brg", "asc");
        return $this->db->get('tknpm_pengeluaran')->result_array();
    }
    public function insertData($data)
    {
        return $this->db->insert('tknpm_pengeluaran', $data);
    }
    // public function insertBrg($tgl, $dari, $no_doc_peng, $tgl_doc_peng, $kode_brg, $nama_brg, $satuan, $vol, $harga, $total, $no_buk_pen, $tgl_buk_pen, $ket)
    // {
    //     $data = array(
    //         'tgl_pene' => $tgl,
    //         'dari' => $dari,
    //         'no_doc_peng' => $no_doc_peng,
    //         'tgl_doc_peng' => $tgl_doc_peng,
    //         'kode_brg' => $kode_brg,
    //         'nama_brg' => $nama_brg,
    //         'satuan' => $satuan,
    //         'volume' => $vol,
    //         'harga' => $harga,
    //         'total' => $total,
    //         'no_buk_pen' => $no_buk_pen,
    //         'tgl_buk_pen' => $tgl_buk_pen,
    //         'ket' => $ket
    //     );
    //     return $this->db->insert('tknpm_pengeluaran', $data);
    // }
    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tknpm_pengeluaran');
    }
    // public function editData($kode, $brg, $satuan, $harga, $id)
    // {
    //     $data = array(
    //         'kode' => $kode,
    //         'nama_brg' => $brg,
    //         'satuan' => $satuan,
    //         'harga' => $harga
    //     );
    //     $this->db->where('id', $id);
    //     return $this->db->update('tknpm_penerimaan', $data);
    // }
    public function editDatapene($data, $id)
    {

        $this->db->where('id', $id);
        return $this->db->update('tknpm_pengeluaran', $data);
    }
    public function delAll()
    {
        $this->db->empty_table('tknpm_pengeluaran');
    }
    public function get_prov($title)
    {
        $this->db->like('nama_brg', $title, 'BOTH');
        $this->db->order_by('nama_brg', 'asc');
        $this->db->limit(10);
        return $this->db->get('tknpm_kode_barang')->result();
    }
    function search_blog($title)
    {
        $this->db->like('nama_brg', $title, 'both');
        $this->db->order_by('nama_brg', 'ASC');
        $this->db->limit(12);
        return $this->db->get('tknpm_kode_barang')->result();
    }
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("tknpm_pengeluaran");
        // $this->db->where($query);
        if ($query != '') {
            $this->db->like('nama_brg', $query);
            $this->db->or_like('satuan', $query);
            $this->db->or_like('volumes', $query);
            $this->db->or_like('tgl_peng', $query);
            $this->db->or_like('totals', $query);
            $this->db->or_like('smbr', $query);
            $this->db->or_like('stts', $query);
            $this->db->or_like('nm_un_kerja', $query);
            $this->db->or_like('no_spbrg', $query);
            $this->db->or_like('tgl_spbrg', $query);
            $this->db->or_like('kode_brg', $query);
            $this->db->or_like('hargas', $query);
            $this->db->or_like('tgl_peny', $query);
            $this->db->or_like('kets', $query);
        }
        $this->db->order_by('nama_brg', 'ASC');
        return $this->db->get();
    }
}
