<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin();
        model_admin();
    }
    public function index()
    {
        $data['title'] = "Dashboard";    
        $jabatan = $this->session->userdata('jabatan_id');
        $data['countsm'] = $this->db->query("SELECT COUNT(*) as total FROM v_list_surat_masuk WHERE user_jabatan_id = '$jabatan'")->row_array();
        $data['countsk'] = $this->db->query("SELECT COUNT(*) as total FROM v_list_surat_keluar WHERE user_jabatan_id = '$jabatan'")->row_array();
        $data['countuser'] = $this->db->query("SELECT COUNT(*) as total FROM user")->row_array();
        $data['countklasifikasi'] = $this->db->query("SELECT COUNT(*) as total FROM m_klasifikasi_surat")->row_array();
        header_nav($data);
        $this->load->view('admin/dashboard/index', $data);
        $this->load->view('inc/v_footer2');

    }
}
