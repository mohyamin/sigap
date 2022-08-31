<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_sekcam();
        model_admin();
    }

    public function index()
    {
        $data['title'] = "Surat Keluar";
        $bulan = $this->input->get('bulan') ?? 'Pilih Bulan';
        $tahun = $this->input->get('tahun') ?? 'Pilih Tahun';
        $data['getbulan'] = $bulan;
        $data['gettahun'] = $tahun;
        $jabatan = $this->session->userdata('jabatan_id');
        $param = [];
        if($bulan != "Pilih Bulan") $param["MONTH(tgl_surat)"] = $bulan;
        if($tahun != "Pilih Tahun") $param["YEAR(tgl_surat)"] = $tahun;
        $this->db->order_by('created_at', 'DESC');
        $data['surat'] = $this->db->get_where('v_list_surat_keluar', $param)->result_array();
        header_nav($data);
        $this->load->view('admin/Suratkeluar/index');
        $this->load->view('inc/v_footer2');
        
    }
}