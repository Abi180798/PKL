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
}
