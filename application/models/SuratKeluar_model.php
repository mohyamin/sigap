<?php

class SuratKeluar_model extends CI_Model {

    public function getSuratKeluar($jabatan){
        $surat = $this->db->query(
            "SELECT * FROM v_list_surat_keluar WHERE owner = '$jabatan'
            "
        );
        return $surat->result_array();
    }

       public function getMaxSuratKeluar(){
        $this->db->select_max('m_surat.no_agenda');
        $this->db->from('m_surat');
        $this->db->join('m_surat_keluar', 'm_surat_keluar.m_surat_id = m_surat.id_surat');
        return $this->db->get();
    }
}