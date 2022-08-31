<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsalSurat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin();
        model_admin();
    }

    public function index()
    {
        $data['title'] = "Asal Surat";
        $data['Asalsurat'] = $this->Asals_model->GetALL();

        header_nav($data);
        $this->load->view('admin/asalsurat/index', $data);
        $this->load->view('inc/v_footer2');
        
    }

    public function tambah(){
        $data['title'] = "Asal Surat";
        $data['Asalsurat'] = $this->Asals_model->GetAll();
      
         $this->form_validation->set_rules('asal', 'Asal Surat', 'required', [
			'required' => 'Kode Surat tidak boleh kosong',
		]);
        if ($this->form_validation->run() == FALSE) 
        {
            header_nav($data);
            $this->load->view('admin/asalsurat/tambah-asalsurat');
            $this->load->view('inc/v_footer2');
        }else {
			$data = array(
				'asal' => htmlspecialchars($this->input->post('asal', true)),
			);
            $this->db->insert('m_asal_surat', $data);
            $this->session->set_flashdata('pesan', 'Data Asal Surat disimpan');
			redirect('Admin/AsalSurat');

        }
    }

    public function HapusAsalsurat ($id)
        {
           $where = array('id' => $id);
           $this->Asals_model->hapus_data($where, 'm_asal_surat');

           $this->session->set_flashdata('pesan', 'Data Asal Surat dihapus');
			redirect('Admin/AsalSurat');
        }


        public function EditAsalSurat($id)
        {
            $data['title'] = "Asal Surat";
            $data['asurat'] = $this->db->get_where('m_asal_surat', array('id' => $id))->row_array();

            header_nav($data);
            $this->load->view('admin/asalsurat/edit-asalsurat', $data);
            $this->load->view('inc/v_footer2');
        }
        public function update($id)
        {
            $data['title']  = "Asal Surat";
            $where          = $this->input->post('id');
            $asal           = $this->input->post('asal');

            $data = array(
                            'id'  => $id,
                            'asal' => $asal
            );
            
            // $where = array(
            //                 'id_klasifikasi' => $id_klasifikasi
            // );
            
           $this->db->where('id', $id);
           $this->db->update('m_asal_surat', $data);
            $this->session->set_flashdata('pesan', 'Data Asal Surat Berhasil diUbah');
			redirect('Admin/AsalSurat');
            
        }



}