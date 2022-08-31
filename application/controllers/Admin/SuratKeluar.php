<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin();
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
        $this->load->view('admin/Suratkeluar/index', $data);
        $this->load->view('admin/Suratkeluar/modal', $data);
        $this->load->view('inc/v_footer2');
        
    }


    public function getNoAgenda()
    {
        $lastAgenda = $this->SuratKeluar_model->getMaxSuratKeluar()->row_array();
        $kode = $lastAgenda['no_agenda'];
         //nourut
        // $noUrut = substr($lastAgenda, 0, 1);
        $tambah = (int) $kode + 1 ;


        if (strlen($tambah) == 1) {
            $newKode =  "000" . $tambah;
        } elseif (strlen($tambah) == 2) {
            $newKode = "00" . $tambah;
        } elseif (strlen($tambah) == 3) {
            $newKode = "0" . $tambah;
        }  else {
            $newKode = $tambah;
        }

        return $newKode;
    }


    public function create(){
        $data['title'] = "Tambah Surat Keluar";
        $data['klasifikasi'] = $this->db->get('m_klasifikasi_surat')->result_array();
        $data['asal'] = $this->db->get('m_asal_surat')->result_array();
        $data['noagenda'] = $this->getNoAgenda();

            header_nav($data);
            $this->load->view('admin/Suratmasuk/tambahsurat');
            $this->load->view('inc/v_footer2');
    }

    public function GetSuratKeluarById(){
        $id = $_POST['id'];
        $data = $this->db->query("SELECT * FROM m_surat_keluar WHERE id_skluar = '$id'")->row_array();
		echo json_encode($data);
    }

    public function Approval(){
        $data = array(
            "status" => $this->input->post('status')
        );
          $this->db->where('id_skluar', $this->input->post('id_surat'));
            $this->db->update('m_surat_keluar', $data);
        $this->session->set_flashdata('pesan', 'Status Berhasil Diubah');
            redirect('Admin/SuratKeluar');
    }

    public function CetakLaporan(){
        $jabatan = $this->session->userdata('jabatan_id');
        $data['surat'] = $this->db->get_where('v_list_surat_keluar', array('user_jabatan_id' => $jabatan, 'status' => '2' ))->result_array();
        
        $this->load->library('Mypdf');
		$this->mypdf->generate('admin/SuratKeluar/laporansurat', $data, 'laporan-surat-keluar', 'A4', 'landscape');

    
    }

    
}