<?php

class Laporan_model extends CI_Model
{
    public function test()
    {
        $this->db->select('*');
        $this->db->from('tknpm_penerimaan');
        $this->db->join('tknpm_pengeluaran', 'tknpm_pengeluaran.kode_brg = tknpm_penerimaan.kode_brg and tknpm_pengeluaran.nm_un_kerja = tknpm_penerimaan.dari');
        $query = $this->db->get()->result_array();
        return $query;
        // print_r($query);
    }
    public function fetch_data($query)
    {
        $this->db->select('*');
        $this->db->from('tknpm_penerimaan');
        $this->db->join('tknpm_pengeluaran', 'tknpm_pengeluaran.kode_brg = tknpm_penerimaan.kode_brg and tknpm_pengeluaran.nm_un_kerja = tknpm_penerimaan.dari');
        // $this->db->where($query);
        if ($query != '') {
            $this->db->like('tknpm_penerimaan.nama_brg', $query);
            $this->db->or_like('tknpm_pengeluaran.nama_brg', $query);
            $this->db->or_like('tknpm_penerimaan.kode_brg', $query);
            $this->db->or_like('tknpm_pengeluaran.kode_brg', $query);
            $this->db->or_like('tknpm_penerimaan.satuan', $query);
            $this->db->or_like('tknpm_pengeluaran.satuan', $query);
            $this->db->or_like('volume', $query);
            $this->db->or_like('volumes', $query);
            $this->db->or_like('harga', $query);
            $this->db->or_like('hargas', $query);
            $this->db->or_like('ket', $query);
        }
        $this->db->order_by('tknpm_penerimaan.nama_brg', 'ASC');
        return $this->db->get();
    }
}
