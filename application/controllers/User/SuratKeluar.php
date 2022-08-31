<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_user();
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
        // var_dump($param);exit;
    
        header_nav($data);
        $this->load->view('admin/Suratkeluar/index', $data);
        $this->load->view('modals/index', $data);
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
            $this->load->view('admin/SuratKeluar/tambahsurat');
            $this->load->view('inc/v_footer2');
        }else {
            $filename = "";
            $upload_file = $_FILES['file_keluar']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '3048';
                $config['upload_path']   = './uploads/';
                $config['encrypt_name']   = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_keluar')) {
                    $old_file = $filename['file_surat_keluar'];
                    if ($old_file != '') {
                        unlink(FCPATH . './uploads/' . $old_file);
                    }
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
                    'm_asalsurat_id' => $this->input->post('asal_surat'),
                    'user_jabatan_id' => "1",
                    'history_surat_id' => $id,
                    'status' => "1",
                    'owner' => $this->session->userdata('id_user'),
                    'tahun' => date('Y')
            );

        $notif = array(
            'id_user' => $this->session->userdata('id_user'),
            'user_jabatan_id' => "1",
            'tipe_notif' => 'Surat Keluar',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

            $this->db->insert('m_surat_keluar',$data2);
            $this->db->insert('notifikasi_sistem', $notif);
            $this->session->set_flashdata('pesan', 'Surat Keluar Berhasil Ditambahkan');
            redirect('User/SuratKeluar');
        }
    }


    public function EditSuratKeluar($id){
        $data['idskluar'] = $id;
        $data['surat'] = $this->db->get_where('v_list_surat_keluar', array('id_skluar' => $id))->row_array();
        $surat = $this->db->get_where('v_list_surat_keluar', array('id_skluar' => $id))->row_array();
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

        if ($this->form_validation->run() == FALSE) {
            header_nav($data);
            $this->load->view('admin/SuratKeluar/editsurat', $data);
            $this->load->view('inc/v_footer2');
        }else {
        $filename =  $surat['file_surat_keluar']; 
        $upload_file = $_FILES['file_keluar']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '3048';
                $config['upload_path']   = './uploads/';
                $config['encrypt_name']   = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_keluar')) {
                    $old_file = $surat['file_surat_keluar'];
                    if ($old_file != '') {
                        unlink(FCPATH . './uploads/' . $old_file);
                    }
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
                    'updated_at' => date('Y-m-d H:i:s'),
            );

            $this->db->where("id_surat", $surat['m_surat_id']);
            $this->db->update('m_surat',$data);

            $data2 = array(
                    'file_surat_keluar' => $filename,
                    'm_surat_id' => $surat['m_surat_id'],
                    'user_jabatan_id' => "1",
                    'history_surat_id' => $surat['history_surat_id'],
                    'status' => "2",
                    'owner' => $this->session->userdata('id_user'),
                    'tahun' => date('Y')
            );
            $this->db->where('id_skluar', $id);
            $this->db->update('m_surat_keluar',$data2);

            $data3 = array(
                'file_skeluar' => $filename,
            );

            $this->db->where('m_surat_id', $id);
            $this->db->update('m_surat_masuk', $data3);
            
            $this->session->set_flashdata('pesan', 'Surat Keluar Berhasil Diedit');
            redirect('User/SuratKeluar');
        }
    }

    public function DeleteSuratKeluar($id){
        $surat = $this->db->get_where('m_surat_keluar', array('id_skluar' => $id))->row_array();

        $old_file = $surat['file_surat_keluar'];
            if ($old_file != '') {
            unlink(FCPATH . './uploads/' . $old_file);
        }

        $this->db->delete('m_surat', array('id_surat' => $surat['m_surat_id']));
        $this->db->delete('m_surat_keluar', array('id_skluar' => $id));
         $this->session->set_flashdata('pesan', 'Surat Keluar Berhasil Dihapus');
        redirect('User/SuratKeluar');
    }
}