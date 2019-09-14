<?php

class Penerimaan_model extends CI_Model
{
    public function getallData()
    {
        $this->db->order_by("nama_brg", "asc");
        return $this->db->get('tknpm_penerimaan')->result_array();
    }
    public function insertData($data)
    {
        return $this->db->insert('tknpm_penerimaan', $data);
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
    //     return $this->db->insert('tknpm_penerimaan', $data);
    // }
    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tknpm_penerimaan');
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
        return $this->db->update('tknpm_penerimaan', $data);
    }
    public function delAll()
    {
        $this->db->empty_table('tknpm_penerimaan');
    }
    public function get_prov($title)
    {
        $this->db->like('nama_brg', $title, 'BOTH');
        $this->db->order_by('nama_brg', 'asc');
        $this->db->limit(10);
        return $this->db->get('tknpm_kode_barang')->result();
    }
    public function search_blog($title)
    {
        $this->db->like('nama_brg', $title, 'both');
        $this->db->order_by('nama_brg', 'ASC');
        $this->db->limit(12);
        return $this->db->get('tknpm_kode_barang')->result();
    }
    public function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("tknpm_penerimaan");
        // $this->db->where($query);
        if ($query != '') {
            $this->db->like('nama_brg', $query);
            $this->db->or_like('satuan', $query);
            $this->db->or_like('volume', $query);
            $this->db->or_like('tgl_pene', $query);
            $this->db->or_like('total', $query);
            $this->db->or_like('dari', $query);
            $this->db->or_like('sumber', $query);
            $this->db->or_like('no_doc_peng', $query);
            $this->db->or_like('tgl_doc_peng', $query);
            $this->db->or_like('kode_brg', $query);
            $this->db->or_like('harga', $query);
            $this->db->or_like('no_buk_pen', $query);
            $this->db->or_like('tgl_buk_pen', $query);
            $this->db->or_like('ket', $query);
        }
        $this->db->order_by('nama_brg', 'ASC');
        return $this->db->get();
    }
    public function kirimData($data, $id)
    {

        $this->db->where('id', $id);
        return $this->db->insert('tknpm_pengeluaran', $data);
    }
}
