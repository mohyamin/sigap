<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManagementUser extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        is_admin();
        $this->load->helper(array('form', 'url'));
        model_admin();
    }

    public function index()
    {
        $data['title'] = "Management User";
        $data['user'] = $this->User_model->getAllUser();
        header_nav($data);
        $this->load->view('admin/managementuser/index', $data);
        $this->load->view('inc/v_footer2');
        
    }

    public function TambahUser(){
         $data['title'] = "Tambah User";
        $data['jabatan'] = $this->db->get('jabatan')->result_array();

         $this->form_validation->set_rules('nip', 'Nip', 'required', [
			'required' => 'Nip tidak boleh kosong',
		]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama tidak boleh kosong',
		]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', [
			'required' => 'Jabatan tidak boleh kosong',
		]);
        $this->form_validation->set_rules('level', 'Level', 'required', [
			'required' => 'Level tidak boleh kosong',
		]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
			'required' => 'Email tidak boleh kosong',
		]);
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required', [
			'required' => 'Tanggal Lahir tidak boleh kosong',
		]);
        $this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Password tidak boleh kosong',
		]);
        
         if ($this->form_validation->run() == FALSE) {
             header_nav($data);
            $this->load->view('admin/managementuser/tambahuser', $data);
            $this->load->view('inc/v_footer2');
        }else {
             $data = array(
                    'nip' => $this->input->post('nip'),
                    'nama_lengkap' => $this->input->post('nama'),
                    'jabatan_id' => $this->input->post('jabatan'),
                    'level' => $this->input->post('level'),
                    'email' => $this->input->post('email'),
                    'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
            );

            if($this->session->userdata('Camat') || $this->session->userdata('Sekcam')) $data["pin"] = "123456";


            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', 'User Berhasil Ditambahkan');
            redirect('Admin/ManagementUser');
        }
    }

    public function EditUser($id){
        $data['title'] = "Edit Profile";
        $data['user'] = $this->User_model->getUserById($id);
        $data['jabatan'] = $this->db->get('jabatan')->result_array();

         $this->form_validation->set_rules('nip', 'Nip', 'required', [
			'required' => 'Nip tidak boleh kosong',
		]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama tidak boleh kosong',
		]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', [
			'required' => 'Jabatan tidak boleh kosong',
		]);
        $this->form_validation->set_rules('level', 'Level', 'required', [
			'required' => 'Level tidak boleh kosong',
		]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
			'required' => 'Email tidak boleh kosong',
		]);
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required', [
			'required' => 'Tanggal Lahir tidak boleh kosong',
		]);
        
         if ($this->form_validation->run() == FALSE) {
             header_nav($data);
            $this->load->view('admin/managementuser/edituser', $data);
            $this->load->view('inc/v_footer2');
        }else {
             $data = array(
                    'nip' => $this->input->post('nip'),
                    'nama_lengkap' => $this->input->post('nama'),
                    'jabatan_id' => $this->input->post('jabatan'),
                    'level' => $this->input->post('level'),
                    'email' => $this->input->post('email'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'updated_at' => date('Y-m-d H:i:s'),
            );

            $this->db->where('id_user', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('pesan', 'User Berhasil Diubah');
            redirect('Admin/ManagementUser');
        }

    }

    public function DeleteUser($id){
         $this->db->delete('user', array('id_user' => $id));

        $this->session->set_flashdata('pesan', 'User Berhasil Dihapus');
        redirect('Admin/ManagementUser');
    }
}