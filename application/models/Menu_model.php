<?php

class Menu_model extends CI_Model
{
    public function getallData()
    {
        $this->db->order_by("nama_brg", "asc");
        return $this->db->get('tknpm_kode_barang')->result_array();
    }
    // public function getData($limit, $start)
    // {
    //     return $this->db->get('tknpm_kode_barang', $limit, $start)->result_array();
    // }
    // public function countData()
    // {
    //     return $this->db->get('tknpm_kode_barang')->num_rows();
    // }
    public function insertBrg($kode, $brg, $satuan, $harga)
    {
        $data = array(
            'kode' => $kode,
            'nama_brg' => $brg,
            'satuan' => $satuan,
            'harga' => $harga
        );
        return $this->db->insert('tknpm_kode_barang', $data);
    }
    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tknpm_kode_barang');
    }
    public function editData($kode, $brg, $satuan, $harga, $id)
    {
        $data = array(
            'kode' => $kode,
            'nama_brg' => $brg,
            'satuan' => $satuan,
            'harga' => $harga
        );
        $this->db->where('id', $id);
        return $this->db->update('tknpm_kode_barang', $data);
    }
}
