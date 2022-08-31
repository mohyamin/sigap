<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin(); 
        model_admin();
    }

    public function index()
    {
        $data['title'] = "Daftar User";
        $data['user'] = $this->User_model->GetUser($this->session->userdata('nip'));
        $data['daftaruser'] = $this->User_model->GetAllUser();

        header_nav($data);
        $this->load->view('admin/daftaruser/index', $data);
        $this->load->view('modals/index');
        $this->load->view('inc/v_footer2');
        
    }

    public function DaftarUser()
    {
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama_user' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tgllahir', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => htmlspecialchars($this->input->post('role', true)),
            'created_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('user', $data);
        $this->session->set_flashdata('pesan', 'User berhasil ditambahkan');
        redirect('Admin/daftaruser');
    }

    public function HapusUser($id)
    {
        $this->User_model->Delete_Data($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('Admin/DaftarUser');
    }

    public function EditUser() {
        $id =$this->uri->segment('4');
        $data['title'] = "Daftar User";
        $data['user'] = $this->User_model->GetUser($this->session->userdata('nip'));
        $data['userdetail'] = $this->User_model->GetUserById($id);
        $data['jabatan'] = $this->User_model->GetAllRole();
        
        header_nav($data);
        $this->load->view('admin/daftaruser/edituser', $data);
        footer_nav();
          
    }

    // public function GetUbahUser()
    // {
    //     echo json_encode($this->User_model->GetUserById($_POST['id']));
    // }

    public function GetUbahRole()
    {
        $id = $_GET['id'];
        $role = $this->User_model->GetAllRole();
        $user = $this->User_model->GetUserById($id);
        

        foreach ($role as $r )  : ?>
            <p class="mb-1">
                <label>
                    <input name="role" <?php if($r['id'] == $user['role_id']){echo 'checked';}else{echo '';} ?> value="1" type="radio" />
                    <span><?= $r['jabatan']; ?></span>
                </label>
            </p>    
       <?php endforeach; ?> <?php 

    }

    public function UbahUser()
    {
        $nip = $this->input->post('nip');

        $data = [
            'nama_user' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tgllahir', true)),
            'role_id' => $this->input->post('role'),
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $this->User_model->update_data($nip, $data);       
        $this->session->set_flashdata('pesan', 'Data berhasil diubah');
        redirect('Admin/DaftarUser');
    }


}