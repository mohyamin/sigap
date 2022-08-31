<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    model_admin();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('nip')) {
      if ($this->session->userdata('role_id') == 1) {
        redirect('Admin/Dashboard');
      } elseif ($this->session->userdata('role_id') == 2) {
        redirect('Staff/Home');
      } else {
        redirect('User/Home');
      }
    }

    $this->form_validation->set_rules('nip', 'Nip', 'required|numeric', [
      'required' => 'Nip tidak boleh kosong',
      'numeric' => 'Nip harus nomer',
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required', [
      'required' => 'Password tidak boleh kosong',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Halaman Login';
      $this->load->view("inc/header", $data);
      $this->load->view("auth/login", $data);
      footer_nav();
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['nip' => $nip])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'nip' => $user['nip'],
          'jabatan_id' => $user['jabatan_id'],
          'id_user' => $user['id_user'],
          'level' => $user['level']
        ];
        $this->session->set_userdata($data);
        if ($user['level'] == "Admin") {
          redirect('Admin/Dashboard');
        } else if ($user['level'] == "Camat") {
          redirect('Camat/Dashboard');
        }else if($user['level'] == "Sekcam"){
          redirect('Sekcam/Dashboard');
        }else if($user['level'] == "User"){
          redirect('User/Dashboard');
        }
      } else {
        $this->session->set_flashdata('error', 'Password salah');
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata('error', 'nip salah');
      redirect('Auth');
    }
  }


  public function Registrasi()
  {
    if ($this->session->userdata('nip')) {
      redirect('Dashboard');
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'nama tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[18]|max_length[18]', [
      'required' => 'nip tidak boleh kosong',
      'min_length' => 'minimal 18 karakter',
      'max_length' => 'maksimal 18 karakter',
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
      'required' => 'email tidak boleh kosong',
      'valid_email' => 'email tidak valid',
    ]);
    $this->form_validation->set_rules('password1', 'Password1', 'required|min_length[6]', [
      'required' => 'password tidak boleh kosong',
      'min_length' => 'password minimal 6 karakter',
    ]);
    $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]', [
      'required' => 'password tidak boleh kosong',
      'matches' => 'confirm password tidak cocok dengan password',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = "Halaman Registrasi";
      $this->load->view("inc/header", $data);
      $this->load->view("auth/register", $data);
      $this->load->view("inc/footer");
    } else {
      $nip = $this->input->post('nip', true);
      $data = [
        'nama_user' => htmlspecialchars($this->input->post('nama', true)),
        'nip' => htmlspecialchars($nip),
        'tanggal_lahir' => '',
        'image' => 'default.jpg',
        'email' => htmlspecialchars($this->input->post('email', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 3,
      ];

      $this->db->insert('user', $data);
      $this->session->set_flashdata('pesan', 'Registrasi berhasil');
      redirect('Auth');
    }
  }
  public function Logout()
  {
    $this->session->unset_userdata('nip');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('pesan', 'Anda berhasil keluar');
    redirect('auth');
  }

  public function Blocked()
  {
    $data['title'] = "Error 404";
    $user = $this->User_model->GetUserByNip($this->session->userdata('nip'));
     if ($user['level'] == "Admin") {
          redirect('Admin/Dashboard');
        } else if ($user['level'] == "Camat") {
          redirect('Camat/Dashboard');
        }else if($user['level'] == "Sekcam"){
          redirect('Sekcam/Dashboard');
        }else if($user['level'] == "User"){
          redirect('User/Dashboard');
        }
  }


  

  public function ForgotPassword() {
    $data['title'] = 'Forgot Password';
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
      'required' => 'email tidak boleh kosong', 
      'valid_email' => 'email tidak valid',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view("inc/header", $data);
      $this->load->view("auth/forgotpassword", $data);
      $this->load->view("inc/footer");
    }else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
      if ($user) {
          $token = base64_encode(random_bytes(32));
          $user_token = [
              'email' => $email,
              'token' => $token,
              'tanggal_buat' => date('Y-m-d H:i:s'),
          ];

          $this->db->insert('token', $user_token);
          $this->_sendEmail($token, 'forgot');
          $password = password_hash(12345, PASSWORD_DEFAULT);
          $data = array(
              'password' => $password,
          );
          $this->session->set_flashdata('pesan', 'Silahkan cek email anda');
          redirect('Auth');
      } else {
          $this->session->set_flashdata('error', 'email tidak terdaftar ');
          redirect('Auth');
      }
    }
  }

  private function _sendEmail($token, $type)
  {
      $config = [
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_user' => 'mamanfams371@gmail.com',
          'smtp_pass' => 'ridwanbw',
          'smtp_port' => 465,
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'newline'   => "\r\n"
      ];

      $this->load->library('email', $config);
      $this->email->initialize($config);

      $this->email->from('mamanfams371@gmail.com', 'SISTEM SIOKTA');
      $this->email->to($this->input->post('email'));

      if ($type == 'forgot') {
          $message = '
          <!DOCTYPE html>
          <html>
          <head>
          <style>
              .image h1 {
                  color: orange;
              }
          </style>
          </head>
          <body>


              <p>Login dengan password : <span style"font-weight: bold;" >12345</span></p>

              <div class="keterangan">
                  <br>
                  <h3>NOTICE :</h3>
                  <p>Di harapkan langsung mengganti password. Demi keamanan akun anda.</p>
                  <p>Terima Kasih</p>
                  <br>
                  <p style="color: black;" >Futsal+</p>
              </div>

          </body>
          </html>
                
          ';
          $this->email->subject('Reset password');
          $this->email->message($message);
      }

        if ($this->email->send()) {
          return true;
      } else {
          echo $this->email->print_debugger();
          die;
      }
    }


}


