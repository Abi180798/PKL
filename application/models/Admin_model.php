<?php

class Admin_model extends CI_Model
{
    public function editSebagai($sebagai, $data)
    {
        $this->db->where('sebagai', $sebagai);
        return $this->db->update('tknpm_sebagai', $data);
    }
    public function lapakh()
    {
        $this->db->select('*');
        $this->db->from('tknpm_penerimaan');
        $this->db->join('tknpm_pengeluaran', 'tknpm_pengeluaran.kode_brg = tknpm_penerimaan.kode_brg and tknpm_pengeluaran.nm_un_kerja = tknpm_penerimaan.dari');
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
