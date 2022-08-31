<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin();
        is_logged_in();
        model_admin();
    }

    public function index()
    {
        $data['title'] = "My Profile";
        
        header_nav($data);
        $this->load->view('profile/index', $data);
        footer_nav();
    }

    public function EditProfile() 
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->User_model->GetUser($this->session->userdata('nip'));

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

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/image/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/image/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
                
            }
                $data = [
                    'nama_user' => $nama,
                    'email' => $email,
                    'tanggal_lahir' => $tgl_lahir,
                ];

                $this->User_model->Update_Data($nip, $data);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah');
                redirect('Admin/profile');
        }
    }

    
  public function ChangePassword(){
    $data['title'] = "Change Password";
    $data['user'] = $this->User_model->GetUser($this->session->userdata('nip'));

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
        $this->load->view('profile/changepassword');
        footer_nav();
    }else{
        $old_password = $this->input->post('password');
        $new_password = $this->input->post('password1');

        if (!password_verify($old_password, $data['user']['password'])) {
            $this->session->set_flashdata('error', 'Password lama tidak cocok');
            redirect('Admin/profile/changepassword');
        } else {
            if ($old_password == $new_password) {
                $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama');
                redirect('Admin/Profile/ChangePassword');
            } else {
                // password sudah benar
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('nip', $this->session->userdata('nip'));
                $this->db->update('user');

                $this->session->set_flashdata('pesan', 'Password berhasil diubah');
                redirect('Admin/Profile/ChangePassword');
            }
        }
    }
  }
}
