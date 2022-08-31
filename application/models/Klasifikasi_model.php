<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi_model extends CI_Model
{
    public function GetAllKlasifikasi(){
        return $this->db->get('m_klasifikasi_surat')->result_array();
    } 
    
    public function tambahData($data)
    {
        $this->db->insert('m_klasifikasi_surat',$data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function GetKlasifikasiById($id_klasifikasi)
	{
		return $this->db->get_where('m_klasifikasi_surat', ['id_klasifikasi' => $id_klasifikasi])->row_array();
	}
}