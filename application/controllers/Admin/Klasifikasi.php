<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin();
        model_admin();
    }

    public function index()
    {
        $data['title'] = "Klasifikasi";
        $data['klasifikasi'] = $this->Klasifikasi_model->GetAllKlasifikasi();
        header_nav($data);
        $this->load->view('admin/Klasifikasi/index', $data);
        $this->load->view('inc/v_footer2');
        
    }
    public function tambah(){
        $data['title'] = "Klasifikasi";
        $data['klasifikasi'] = $this->Klasifikasi_model->GetAllKlasifikasi();
      
         $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required', [
			'required' => 'Kode Surat tidak boleh kosong',
		]);
        $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required', [
			'required' => 'Klasifikasi tidak boleh kosong',
		]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
			'required' => 'Deskripsi tidak boleh kosong',
		]);

        if ($this->form_validation->run() == FALSE) 
        {
            header_nav($data);
            $this->load->view('admin/Klasifikasi/tambah-klasifikasi');
            $this->load->view('inc/v_footer2');
        }else {
			$data = array(
				'kode_surat' => htmlspecialchars($this->input->post('kode_surat', true)),
                'klasifikasi' => htmlspecialchars($this->input->post('klasifikasi', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
				
			);
            $this->db->insert('m_klasifikasi_surat', $data);
            $this->session->set_flashdata('pesan', 'Data Klasifikasi disimpan');
			redirect('Admin/klasifikasi');

        }
    }
        public function HapusKlasifikasi ($id_klasifikasi)
        {
           $where = array('id_klasifikasi' => $id_klasifikasi);
           $this->Klasifikasi_model->hapus_data($where, 'm_klasifikasi_surat');

           $this->session->set_flashdata('pesan', 'Data Klasifikasi dihapus');
			redirect('Admin/klasifikasi');
        }

        public function EditKlasifikasi($id_klasifikasi)
        {
            $data['title'] = "Klasifikasi";
            $data['kdetail'] = $this->db->get_where('m_klasifikasi_surat', array('id_klasifikasi' => $id_klasifikasi))->row_array();
            header_nav($data);
            $this->load->view('admin/Klasifikasi/edit-klasifikasi', $data);
            $this->load->view('inc/v_footer2');
        }

        public function update($id)
        {
            $data['title'] = "Klasifikasi";
            $id_klasifikasi = $this->input->post('id_klasifikasi');
            $kode_surat     = $this->input->post('kode_surat');
            $klasifikasi    = $this->input->post('klasifikasi');
            $deskripsi      = $this->input->post('deskripsi');

            $data = array(
                            'kode_surat' => $kode_surat,
                            'klasifikasi' => $klasifikasi,
                            'deskripsi' => $deskripsi
            );
            
            // $where = array(
            //                 'id_klasifikasi' => $id_klasifikasi
            // );
            
           $this->db->where('id_klasifikasi', $id);
           $this->db->update('m_klasifikasi_surat', $data);
            $this->session->set_flashdata('pesan', 'Data Klasifikasi Berhasil diUbah');
			redirect('Admin/klasifikasi');
            
        }
}