<?php

class Bonus_model extends CI_Model
{
    public function getBonus($id = null)
    {
        if ($id === null) 
        {
            return $this->db->from('bonus')
                ->join('data_karyawan', 'bonus.id_data_karyawan = data_karyawan.id')
                ->get()->result_array();
        } 
        else 
        {
            $this->db->where("id_bonus",$id);

            return $this->db->from('bonus')
                ->join('data_karyawan', 'bonus.id_data_karyawan = data_karyawan.id')
                ->get()->result_array();
        }
    }

    public function deleteBonus($id)
    {
        $this->db->delete('bonus', ['id_bonus' => $id]);
        return $this->db->affected_rows();
    }

    public function createBonus($data)
    {
        $this->db->insert('bonus', $data);
        return $this->db->affected_rows();
    }
    
    public function updateBonus($data, $id)
    {
        $this->db->update('bonus', $data ,['id_bonus' => $id]);
        return $this->db->affected_rows();
    }
}
