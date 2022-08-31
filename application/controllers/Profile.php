<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        model_admin();
    }

    public function index(){
        $data['title'] = "Profile";
        $data['user'] = $this->User_model->GetUserByNip($this->session->userdata('nip'));
        header_nav($data);
        $this->load->view('profile/index', $data);
        footer_nav();
    }

    public function EditProfile($id){
        $data['title'] = "Profile";
        $data['user'] = $this->User_model->GetUserById($id);
        $user = $this->User_model->GetUserById($id);

        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('tgllahir', 'Tgllahir', 'required');

        if ($this->form_validation->run() == FALSE) {
            header_nav($data);
            $this->load->view('profile/editprofile', $data);
            footer_nav();
        }else {
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $tgl_lahir = $this->input->post('tgllahir');
            $user = $this->db->get_where('user', array('id_user' => $id))->row_array();

            $upload_image = $_FILES['image']['name'];
            
            $filename = $user['image'];
            if ($upload_image) {
               $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']      = '3048';
                $config['upload_path']   = './uploads/image/';
                $config['encrypt_name']   = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_file = $user['image'];
                    if ($old_file != '') {
                        unlink(FCPATH . './uploads/image/' . $old_file);
                    }
                    $new_file = $this->upload->data();
                    $filename = $new_file['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
               
            }
            
             $data = [
                    'nama_lengkap' => $nama,
                    'email' => $email,
                    'tgl_lahir' => $tgl_lahir,
                    'image' => $filename
                ];

                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah');
                redirect('Profile');

        }
        
    }

    public function ChangePassword(){
    $data['title'] = "Change Password";
    $data['user'] = $this->User_model->GetUserByNip($this->session->userdata('nip'));

    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
        'required' => 'Password lama tidak boleh kosong',
    ]);

    $this->form_validation->set_rules('password1', 'Password1', 'required|min_length[6]|trim', [
        'required' => 'Password baru tidak boleh kosong',
        'min_length' => 'Password minimal 6 karakter',
    ]);
    $this->form_validation->set_rules('password2', 'Password2', 'required|min_length[6]|matches[password1]', [
        'required' => 'Konfirmasi password tidak boleh kosong',
        'min_length' => 'Password minimal 6 karakter',
        'matches' => 'tidak cocok dengan Password baru',
    ]);



    if ($this->form_validation->run() == FALSE) {
        header_nav($data);
        $this->load->view('Profile/ChangePassword');
        footer_nav();
    }else{
        $old_password = $this->input->post('password');
        $new_password = $this->input->post('password1');

        if (!password_verify($old_password, $data['user']['password'])) {
            $this->session->set_flashdata('error', 'Password lama tidak cocok');
                redirect('Profile/ChangePassword');
        } else {
            if ($old_password == $new_password) {
                $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama');
                redirect('Profile/ChangePassword');
            } else {
                // password sudah benar
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('nip', $this->session->userdata('nip'));
                $this->db->update('user');

                $this->session->set_flashdata('pesan', 'Password berhasil diubah');
                redirect('Profile/ChangePassword');
            }
        }
    }
  }

    public function UbahPin(){
    $data['title'] = "Ubah PIN";
    $data['user'] = $this->User_model->GetUserByNip($this->session->userdata('nip'));

    $this->form_validation->set_rules('pin', 'Pin', 'required|trim', [
        'required' => 'Pin lama tidak boleh kosong',
    ]);

    $this->form_validation->set_rules('pin1', 'pin1', 'required|min_length[6]|trim|numeric', [
        'required' => 'PIN baru tidak boleh kosong',
        'min_length' => 'PIN minimal 6 karakter',
    ]);



    if ($this->form_validation->run() == FALSE) {
        header_nav($data);
        $this->load->view('Profile/ubahpin');
        footer_nav();
    }else{
        $old_pin = $this->input->post('pin');
        $new_pin = $this->input->post('pin1');

        if ($old_pin != $data['user']['pin']) {
            $this->session->set_flashdata('error', 'PIN lama tidak cocok');
                redirect('Profile/UbahPin');
        } else {
            if ($old_pin == $new_pin) {
                $this->session->set_flashdata('error', 'Pin baru tidak boleh sama dengan password lama');
                redirect('Profile/UbahPin');
            } else {

                $this->db->set('pin', $new_pin);
                $this->db->where('nip', $this->session->userdata('nip'));
                $this->db->update('user');

                $this->session->set_flashdata('pesan', 'PIN berhasil diubah');
                redirect('Profile/UbahPin');
            }
        }
    }
    }


     public function GetViewSuratMasuk(){
        $id = $_POST['id'];
        $data = $this->db->query("SELECT * FROM v_list_surat_masuk WHERE id_masuk = '$id'")->row_array();
		echo json_encode($data);
    }

    public function DeleteNotifikasi($id){
        $notif = $this->db->get_where('notifikasi_sistem', array("id" => $id))->row_array();
        $menu = $notif['tipe_notif'];
        if ($menu == "Surat Masuk") {
            $menu = "SuratMasuk";
        }elseif($menu == "Surat Keluar") {
            $menu = "SuratKeluar";
        }
        $level = $this->session->userdata('level');
        $this->db->where('id', $id);
        $this->db->delete('notifikasi_sistem');
        redirect(''. $level.'/'.$menu.'');
    }
}