<?php
defined('BASEPATH') or exit('No direct script access allowed');




class SuratMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_user();
        model_admin();
    }

    public function index()
    {
        $data['title'] = "Surat Masuk";
        $bulan = $this->input->get('bulan') ?? 'Pilih Bulan';
        $tahun = $this->input->get('tahun') ?? 'Pilih Tahun';
        $data['getbulan'] = $bulan;
        $data['gettahun'] = $tahun;
        $jabatan = $this->session->userdata('jabatan_id');
        $param = [
            "user_jabatan_id" => $jabatan,
        ];
        if($bulan != "Pilih Bulan") $param["MONTH(tgl_surat)"] = $bulan;
        if($tahun != "Pilih Tahun") $param["YEAR(tgl_surat)"] = $tahun;
        $this->db->order_by('created_at', 'DESC');
        $data['suratmasuk'] = $this->db->get_where('v_list_surat_masuk', $param)->result_array();
        header_nav($data);
        $this->load->view('admin/Suratmasuk/index');
        $this->load->view('modals/index', $data);
        $this->load->view('inc/v_footer2');
    }

     public function Disposisi(){
        $id = $this->input->post('id_masuk');

        $data = $this->db->query("SELECT * FROM m_surat_masuk WHERE id_masuk = '$id'")->row_array();
        $jabatan = $data["user_jabatan_id"];
        $disposisi = $this->input->post('tujuan');
        $data1 = [
            "status" => "2"
        ];
        $this->db->where('id_masuk', $id);
        $this->db->update('m_surat_masuk', $data1);

        $surat = $data['m_surat_id'];
        $admin = $this->db->query("SELECT * FROM m_surat_masuk WHERE m_surat_id = '$surat' AND user_jabatan_id = 1")->row_array();
        
        $notif = array(
            'id_user' => $this->session->userdata('id_user'),
            'user_jabatan_id' => "1",
            'tipe_notif' => 'Surat Masuk',
            'deskripsi' => 'Terima',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        

        $this->db->where('id_masuk', $admin['id_masuk']);
        $this->db->update('m_surat_masuk', $data1);
        $this->db->insert('notifikasi_sistem', $notif);

        $this->session->set_flashdata('pesan', 'Surat Masuk Berhasil Diterima');
        redirect('User/SuratMasuk');
    }

     public function CetakSurat($id){
        $param1 = [
            "m_surat_id" => $id,
            "user_jabatan_id" => "2",
        ];
        $param2 = [
            "m_surat_id" => $id,
            "user_jabatan_id" => "3",
        ];
        $data['surat'] = $this->Surat_model->getSuratByIdSurat($id, $this->session->userdata('jabatan_id'));
        $data['camat'] = $this->db->get_where('m_surat_masuk', $param1)->row_array();
        $data['sekcam'] = $this->db->get_where('m_surat_masuk', $param2)->row_array();
        
        $this->load->library('Mypdf');
        $this->mypdf->generate('admin/Suratmasuk/disposisi', $data, 'laporan-mahasiswa', 'A4', 'landscape');
        
        // $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->isRemoteEnabled = true;
		// $this->pdf->filename = "surat_masuk.pdf";
		// $this->pdf->load_view('admin/Suratmasuk/disposisi', $data);
    }

    public function TambahSuratKeluar($id){
        
        $data['id_surat'] = $id;
        $data['klasifikasi'] = $this->db->get('m_klasifikasi_surat')->result_array();
        $data['asal'] = $this->db->get('m_asal_surat')->result_array();

           
        $this->form_validation->set_rules('no_agenda', 'No_agenda', 'required', [
			'required' => 'No agenda tidak boleh kosong',
		]);
        $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required', [
			'required' => 'Kode surat tidak boleh kosong',
		]);
        $this->form_validation->set_rules('sifat_surat', 'Sifat_surat', 'required', [
			'required' => 'Sifat surat tidak boleh kosong',
		]);
        $this->form_validation->set_rules('tgl_surat', 'Tgl_surat', 'required', [
			'required' => 'Tanggal surat tidak boleh kosong',
		]);
        $this->form_validation->set_rules('no_surat', 'No_surat', 'required', [
			'required' => 'No surat tidak boleh kosong',
		]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
			'required' => 'Perihal surat tidak boleh kosong',
		]);
         $this->form_validation->set_rules('asal_surat', 'Asal_surat', 'required', [
			'required' => 'Asal surat tidak boleh kosong',
		]);
        

         if ($this->form_validation->run() == FALSE) {
            header_nav($data);
            $this->load->view('admin/Suratmasuk/suratkeluar', $data);
            $this->load->view('inc/v_footer2');
        }else {
        $filename = ""; 
        $upload_image = $_FILES['file_keluar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '3048';
                $config['upload_path']   = './uploads/';
                $config['encrypt_name']   = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_keluar')) {
                    $new_file = $this->upload->data();
                    $filename = $new_file['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            
            }
            

            $data = array(
                    'tgl_surat' => $this->input->post('tgl_surat'),
                    'no_surat' => $this->input->post('no_surat'),
                    'perihal' => $this->input->post('perihal'),
                    'no_agenda' => $this->input->post('no_agenda'),
                    'sifat_surat' => $this->input->post('sifat_surat'),
                    'm_klasifikasi_id' => $this->input->post('kode_surat'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('m_surat',$data);
            $msuratid = $this->db->insert_id();

            $data2 = array(
                    'file_surat_keluar' => $filename,
                    'm_surat_id' => $msuratid,
                    'user_jabatan_id' => "1",
                    'm_asalsurat_id' => $this->input->post('asal_surat'),
                    'history_surat_id' => $id,
                    'status' => "2",
                    'owner' => $this->session->userdata('id_user'),
                    'tahun' => date('Y')
            );

            $this->db->insert('m_surat_keluar',$data2);

            $data3 = array(
                'file_skeluar' => $filename,
            );

        $notif = array(
            'id_user' => $this->session->userdata('id_user'),
            'user_jabatan_id' => "1",
            'tipe_notif' => 'Surat Keluar',
            'deskripsi' => 'Kirim',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

            $this->db->where('m_surat_id', $id);
            $this->db->update('m_surat_masuk', $data3);
             $this->db->insert('notifikasi_sistem', $notif);
            $this->session->set_flashdata('pesan', 'Surat Keluar Berhasil Ditambahkan');
            redirect('User/SuratKeluar');
        }   

       
    }

      public function TrackingSurat($id){
        $data['title'] = "Tracking Surat";
    
        $data['tracking'] = $this->db->query("SELECT * FROM v_sm_jabatan WHERE id_surat = '$id' AND user_jabatan_id != 1")->result_array();
        $userjabatan = $this->session->userdata('jabatan_id');
        $data['surat'] = $this->db->query("SELECT * FROM v_list_surat_masuk WHERE id_surat = '$id' AND user_jabatan_id = '$userjabatan'")->row_array();
        
        header_nav($data);
        $this->load->view('admin/Suratmasuk/trackingsurat', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('inc/v_footer2');
    }
   
}