<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_camat();
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
        $sm = $this->db->get_where('v_list_surat_masuk', $param)->row_array();
        header_nav($data);
        $this->load->view('admin/Suratmasuk/index');
        $this->load->view('modals/index', $data);
        $this->load->view('inc/v_footer2');
    }

    public function Disposisi(){
        $id = $this->input->post('id_masuk');
        $catatan = $this->input->post('catatan');
        $pin = $this->input->post('pin');

        $user = $this->User_model->GetUserByNip($this->session->userdata('nip'));
        if($pin != $user['pin']){
            $this->session->set_flashdata('error', 'Pin yang anda masukkan salah');
            redirect('Camat/SuratMasuk');
        }

        $data = $this->db->query("SELECT * FROM m_surat_masuk WHERE id_masuk = '$id'")->row_array();
        $jabatan = $data["user_jabatan_id"];
        $disposisi = $this->db->query("SELECT * FROM jabatan WHERE parent_id = '$jabatan'")->row_array();
        $data1 = [
            "status" => "2",
            "catatan" => $catatan
        ];
        $this->db->where('id_masuk', $id);
        $this->db->update('m_surat_masuk', $data1);

        $data2 = array(
                'm_surat_id' => $data['m_surat_id'],
                'tgl_terima' => $data['tgl_terima'],
                'file_smasuk' => $data['file_smasuk'] ,
                'file_skeluar' => $data['file_skeluar'], 
                'status' => '1',
                'user_jabatan_id' => $disposisi['id_jabatan'],
                'index_surat' => $data['index_surat'],
                'm_asalsurat_id' => $data['m_asalsurat_id']
        );


        $notif = array(
            'id_user' => $this->session->userdata('id_user'),
            'user_jabatan_id' => $disposisi['id_jabatan'],
            'tipe_notif' => 'Surat Masuk',
            'deskripsi' => 'Disposisi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );


        $this->_sendEmail($data, $disposisi['id_jabatan']);
        $this->db->insert('m_surat_masuk',$data2);
        $this->db->insert('notifikasi_sistem', $notif);
        $this->session->set_flashdata('pesan', 'Surat Masuk Berhasil Didisposisi');
        redirect('Camat/SuratMasuk');
    }

     public function GetViewSuratMasuk(){
        $id = $_POST['id'];
        $data = $this->db->query("SELECT * FROM v_list_surat_masuk WHERE id_masuk = '$id'")->row_array();
		echo json_encode($data);
    }

    private function _sendEmail($data, $jabatanid)
    {
    $param =  array(
        'm_surat_id' => $data['m_surat_id'],
        'user_jabatan_id' => $data['user_jabatan_id']);
    $sm = $this->db->get_where('v_list_surat_masuk', $param )->result_array();
    $jabatan = $this->db->get_where('user', array('jabatan_id' => $jabatanid))->result_array();
      $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'mohyamin18@gmail.com',
        'smtp_pass' => '18Mohyamin9501',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
      ];
      
      foreach($jabatan as $j){
            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('mohyamin18@gmail.com', 'SIGAP BOGE');
            $this->email->to($j['email']);
      }

            $message = '
          <!DOCTYPE html>
          <html>
          <head>
          <style>
              .image h1 {
                  color: orange;
              }
              table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
          </style>
          </head>
          <body>
            <p>
            <table>
            <tr>
                <td>Ada Surat Masuk Tanggal</td>
                <td>:</td>
                <td>'. $sm['created_at'] . '</td>
            </tr>
            <tr>
                <td>Dengan No Surat</td>
                <td>:</td>
                <td>'. $sm['no_surat']  .'</td>
            </tr>
            <tr>
                <td>Tanggal Surat</td>
                <td>:</td>
                <td>'. $sm['tgl_surat']  .'</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>'. $sm['perihal']  .'</td>
            </tr>
            </table>

          </body>
          </html>
                
          ';
          $this->email->subject('Surat Masuk');
          $this->email->message($message);

        if ($this->email->send()) {
          return true;
      } else {
          echo $this->email->print_debugger();
          die;
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