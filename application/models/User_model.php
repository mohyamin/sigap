<?php

class User_model extends CI_Model {

    public function GetUserByNip($nip){
        $user = $this->db->query(
            "SELECT a.*, b.jabatan FROM user as a JOIN jabatan as b ON a.jabatan_id = b.id_jabatan WHERE a.nip = '$nip'"
        );
        return $user->row_array();
    }

    public function GetUserById($id){
        $surat = $this->db->query(
            "SELECT a.*, jabatan FROM user as a JOIN jabatan as b ON a.jabatan_id = b.id_jabatan WHERE a.id_user = '$id'"
        );
        return $surat->row_array();
    }

    public function GetAllUser(){
        $user = $this->db->query(
            "SELECT a.*, jabatan FROM user as a JOIN jabatan as b ON a.jabatan_id = b.id_jabatan"
        );
        return $user->result_array();
    }
}