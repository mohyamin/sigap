<?php

class Surat_model extends CI_Model {

    public function getSuratByIdSurat($id, $jabatan_id){
        $surat = $this->db->query(
            "SELECT * FROM m_surat_masuk as a JOIN m_surat as b ON a.m_surat_id = b.id_surat JOIN m_asal_surat as c ON a.m_asalsurat_id = c.id
            WHERE a.m_surat_id = '$id' AND a.user_jabatan_id = '$jabatan_id'"
        );
        return $surat->row_array();
    }

     public function getListSuratMasukByJabatan($jabatan_id){
        $surat = $this->db->query(
            "SELECT * FROM m_surat_masuk as a JOIN m_surat as b ON a.m_surat_id = b.id_surat JOIN m_asal_surat as c ON a.m_asalsurat_id = c.id
            WHERE a.user_jabatan_id = '$jabatan_id' AND a.status = 2"
        );
        return $surat->result_array();
    }

    public function getMaxSuratMasuk(){
        $this->db->select_max('m_surat.no_agenda');
        $this->db->from('m_surat');
        $this->db->join('m_surat_masuk', 'm_surat_masuk.m_surat_id = m_surat.id_surat');
        return $this->db->get();
    }
}