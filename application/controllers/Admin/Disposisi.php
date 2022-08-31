<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
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
        $data['title'] = "Disposisi";
        $data['user'] = $this->User_model->GetUser($this->session->userdata('nip'));
        $data['daftaruser'] = $this->User_model->GetAllUser();

        header_nav($data);
        $this->load->view('admin/Disposisi/index');
        $this->load->view('inc/v_footer2');
        
    }

    
}