<?php
class Excel_import_model extends CI_Model
{
    function select()
    {
        $this->db->order_by('nama_brg', 'asc');
        $query = $this->db->get('tknpm_penerimaan');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert_batch('tknpm_penerimaan', $data);
    }
}
