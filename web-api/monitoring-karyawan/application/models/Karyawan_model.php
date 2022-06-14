<?php

class Karyawan_model extends CI_Model
{
    public function getKaryawan($id = null)
    {
        if ($id === null) 
        {
            return $this->db->get('data_karyawan')->result_array();
        } 
        else 
        {
            return $this->db->get_where('data_karyawan', ['id' => $id])->result_array();
        }
    }

    public function deleteKaryawan($id)
    {
        $this->db->delete('data_karyawan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createKaryawan($data)
    {
        $this->db->insert('data_karyawan', $data);
        return $this->db->affected_rows();
    }
    
    public function updateKaryawan($data, $id)
    {
        $this->db->update('data_karyawan', $data ,['id' => $id]);
        return $this->db->affected_rows();
    }
}
