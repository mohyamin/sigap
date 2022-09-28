<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class SuratMasuk extends CI_Controller
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
        $data['title'] = "Surat Masuk";
        $bulan = $this->input->get('bulan') ?? 'Pilih Bulan';
        $tahun = $this->input->get('tahun') ?? 'Pilih Tahun';
        $data['getbulan'] = $bulan;
        $data['gettahun'] = $tahun;
        $jabatan = $this->session->userdata('jabatan_id');
        $param = [
            "user_jabatan_id" => $jabatan,
        ];
        if ($bulan != "Pilih Bulan") $param["MONTH(tgl_surat)"] = $bulan;
        if ($tahun != "Pilih Tahun") $param["YEAR(tgl_surat)"] = $tahun;
        $this->db->order_by('created_at', 'DESC');
        $data['suratmasuk'] = $this->db->get_where('v_list_surat_masuk', $param)->result_array();

        header_nav($data);
        $this->load->view('admin/Suratmasuk/index', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('inc/v_footer2');
    }

    public function getNoAgenda()
    {
        $lastAgenda = $this->Surat_model->getMaxSuratMasuk()->row_array();
        $kode = $lastAgenda['no_agenda'];
        //nourut
        // $noUrut = substr($lastAgenda, 0, 1);
        $tambah = (int) $kode + 1;


        if (strlen($tambah) == 1) {
            $newKode =  "000" . $tambah;
        } elseif (strlen($tambah) == 2) {
            $newKode = "00" . $tambah;
        } elseif (strlen($tambah) == 3) {
            $newKode = "0" . $tambah;
        } else {
            $newKode = $tambah;
        }

        return $newKode;
    }


    public function create()
    {
        $data['title'] = "Surat Masuk";
        $data['klasifikasi'] = $this->db->get('m_klasifikasi_surat')->result_array();
        $data['asal'] = $this->db->get('m_asal_surat')->result_array();

        $data['noagenda'] = $this->getNoAgenda();

        $this->form_validation->set_rules('no_agenda', 'No_agenda', 'required', [
            'required' => 'No agenda tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('sifat_surat', 'Sifat surat', 'required', [
            'required' => 'Sifat surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('tgl_surat', 'Tgl_surat', 'required', [
            'required' => 'Tanggal Surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('asal', 'Asal Surat', 'required', [
            'required' => 'Asal surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('no_surat', 'No_surat', 'required', [
            'required' => 'No surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
            'required' => 'Perihal surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required', [
            'required' => 'Kode surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('index_surat', 'Index_surat', 'required', [
            'required' => 'Index surat tidak boleh kosong',
        ]);


        $this->form_validation->set_rules('tgl_terima', 'Tgl_terima', 'required', [
            'required' => 'Tanggal terima surat tidak boleh kosong',
        ]);
        if ($this->form_validation->run() == FALSE) {
            header_nav($data);
            $this->load->view('admin/Suratmasuk/tambahsurat');
            $this->load->view('inc/v_footer2');
        } else {
            $data1 = array(
                'tgl_surat' => $this->input->post('tgl_surat'),
                'no_surat' => $this->input->post('no_surat'),
                'perihal' => $this->input->post('perihal'),
                'no_agenda' => $this->input->post('no_agenda'),
                'sifat_surat' => $this->input->post('sifat_surat'),
                'm_klasifikasi_id' => $this->input->post('kode_surat'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('m_surat', $data1);
            $id = $this->db->insert_id();
            $user = $this->session->userdata('jabatan_id');


            $jabatan = $this->db->query("SELECT * FROM jabatan WHERE parent_id  = '$user'")->row_array();
            $filename =  "";
            $upload_file = $_FILES['file_masuk']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '3048';
                $config['upload_path']   = './uploads/';
                $config['encrypt_name']   = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_masuk')) {
                    $new_file = $this->upload->data();
                    $filename = $new_file['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $data2 = array(
                'm_surat_id' => $id,
                'tgl_terima' => $this->input->post('tgl_terima'),
                'file_smasuk' => $filename,
                'status' => '1',
                'user_jabatan_id' => $this->session->userdata('jabatan_id'),
                'index_surat' => $this->input->post('index_surat'),
                'm_asalsurat_id' => $this->input->post('asal')

            );
            $data3 = array(
                'm_surat_id' => $id,
                'tgl_terima' => $this->input->post('tgl_terima'),
                'file_smasuk' => $filename,
                'file_skeluar' => '',
                'status' => '1',
                'user_jabatan_id' => $jabatan['id_jabatan'],
                'index_surat' => $this->input->post('index_surat'),
                'm_asalsurat_id' => $this->input->post('asal')

            );


            $this->_sendEmail($data1, $jabatan['id_jabatan']);

            $notif = array(
                'id_user' => $this->session->userdata('id_user'),
                'user_jabatan_id' => $jabatan['id_jabatan'],
                'tipe_notif' => 'Surat Masuk',
                'deskripsi' => 'Kirim',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );


            $this->db->insert('m_surat_masuk', $data2);
            $this->db->insert('m_surat_masuk', $data3);
            $this->db->insert('notifikasi_sistem', $notif);
            $this->session->set_flashdata('pesan', 'Surat Masuk Berhasil Ditambahkan');
            redirect('Admin/SuratMasuk');
        }
    }

    public function GetViewSuratMasuk()
    {
        $id = $_POST['id'];
        $data = $this->db->query("SELECT * FROM v_list_surat_masuk WHERE id_masuk = '$id'")->row_array();
        echo json_encode($data);
    }

    public function Disposisi()
    {
        $id = $this->input->post('id_masuk');

        $data = $this->db->query("SELECT * FROM m_surat_masuk WHERE id_masuk = '$id'")->row_array();
        $jabatan = $data["user_jabatan_id"];
        $disposisi = $this->db->query("SELECT * FROM jabatan WHERE parent_id = '$jabatan'")->row_array();
        $data1 = [
            "status" => "2"
        ];


        $this->db->where('id_masuk', $id);
        $this->db->update('m_surat_masuk', $data1);

        $data2 = array(
            'm_surat_id' => $data['m_surat_id'],
            'tgl_terima' => $data['tgl_terima'],
            'file_smasuk' => $data['file_smasuk'],
            'file_skeluar' => $data['file_skeluar'],
            'status' => '1',
            'user_jabatan_id' => $disposisi['id_jabatan'],
            'index_surat' => $data['index_surat'],
            'm_asalsurat_id' => $data['m_asalsurat_id']
        );


        $this->db->insert('m_surat_masuk', $data2);
        $this->session->set_flashdata('pesan', 'Surat Masuk Berhasil Didisposisi');
        redirect('Admin/SuratMasuk');
    }

    public function EditSuratMasuk($id)
    {
        $surat = $this->db->get_where('v_list_surat_masuk', ['id_masuk' => $id])->row_array();
        $data['surat'] = $surat;
        $data['klasifikasi'] = $this->db->get('m_klasifikasi_surat')->result_array();
        $data['asal'] = $this->db->get('m_asal_surat')->result_array();

        $this->form_validation->set_rules('no_agenda', 'No_agenda', 'required', [
            'required' => 'No agenda tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('sifat_surat', 'Sifat surat', 'required', [
            'required' => 'Sifat surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('tgl_surat', 'Tgl_surat', 'required', [
            'required' => 'Tanggal Surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('asal', 'Asal Surat', 'required', [
            'required' => 'Asal surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('no_surat', 'No_surat', 'required', [
            'required' => 'No surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
            'required' => 'Perihal surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required', [
            'required' => 'Kode surat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('index_surat', 'Index_surat', 'required', [
            'required' => 'Index surat tidak boleh kosong',
        ]);


        $this->form_validation->set_rules('tgl_terima', 'Tgl_terima', 'required', [
            'required' => 'Tanggal terima surat tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            header_nav($data);
            $this->load->view('admin/Suratmasuk/editsuratmasuk', $data);
            $this->load->view('modals/index', $data);
            $this->load->view('inc/v_footer2');
        } else {
            $filename =  $surat['file_smasuk'];
            $upload_file = $_FILES['file_masuk']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '3048';
                $config['upload_path']   = './uploads/';
                $config['encrypt_name']   = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_masuk')) {
                    $old_file = $surat['file_smasuk'];
                    if ($old_file != '') {
                        unlink(FCPATH . './uploads/' . $old_file);
                    }
                    $new_file = $this->upload->data();
                    $filename = $new_file['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data1 = array(
                'tgl_surat' => $this->input->post('tgl_surat'),
                'no_surat' => $this->input->post('no_surat'),
                'perihal' => $this->input->post('perihal'),
                'no_agenda' => $this->input->post('no_agenda'),
                'sifat_surat' => $this->input->post('sifat_surat'),
                'm_klasifikasi_id' => $this->input->post('kode_surat'),
                'updated_at' => date('Y-m-d H:i:s'),
            );


            $suratid = $this->input->post('id_surat');
            $this->db->where('id_surat', $suratid);
            $this->db->update('m_surat', $data1);

            $data2 = array(
                'm_surat_id' => $suratid,
                'tgl_terima' => $this->input->post('tgl_terima'),
                'file_smasuk' => $filename,
                'status' => $surat['status'],
                'user_jabatan_id' => $surat['user_jabatan_id'],
                'index_surat' => $this->input->post('index_surat'),
                'm_asalsurat_id' => $this->input->post('asal')
            );

            $this->db->where('id_masuk', $id);
            $this->db->update('m_surat_masuk', $data2);
            $this->session->set_flashdata('pesan', 'Surat Masuk Berhasil Diubah');
            redirect('Admin/SuratMasuk');
        }
    }

    public function DeleteSuratMasuk($id)
    {
        $this->db->where('id_masuk', $id);
        $sm = $this->db->get('m_surat_masuk')->row_array();
        $this->db->delete('m_surat', array('id_surat' => $sm['m_surat_id']));
        $this->db->delete('m_surat_masuk', array('id_masuk' => $id));

        $this->session->set_flashdata('pesan', 'Surat Masuk Berhasil Dihapus');
        redirect('Admin/SuratMasuk');
    }

    public function TrackingSurat($id)
    {
        $data['title'] = "Tracking Surat";

        $data['tracking'] = $this->db->query("SELECT * FROM v_sm_jabatan WHERE id_surat = '$id' AND user_jabatan_id != 1")->result_array();
        $userjabatan = $this->session->userdata('jabatan_id');
        $data['surat'] = $this->db->query("SELECT * FROM v_list_surat_masuk WHERE id_surat = '$id' AND user_jabatan_id = '$userjabatan'")->row_array();

        header_nav($data);
        $this->load->view('admin/Suratmasuk/trackingsurat', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('inc/v_footer2');
    }

    public function CetakSurat($id)
    {
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

        // $dompdf = new DOMPDF();
        // $dompdf->loadHtml('Admin/Suratmasuk/disposisi');
        // $dompdf->setPaper('A4', 'potrait');
        // $dompdf->render();
        // if ($stream) {
        //     $dompdf->stream($filename.".pdf", array("Attachment" => 0));
        // } else {
        //     return $dompdf->output();
        // }

    }

    public function CetakLaporan($bulan, $tahun)
    {
        $jabatan = $this->session->userdata('jabatan_id');
        $param = [
            'user_jabatan_id' => $jabatan,
            'status' => '2'
        ];
        if ($bulan != "Pilih%20Bulan") $param["MONTH(tgl_surat)"] = $bulan;
        if ($tahun != "Pilih%20Tahun") $param["YEAR(tgl_surat)"] = $tahun;
        $data['surat'] = $this->db->get_where('v_list_surat_masuk', $param)->result_array();

        $this->load->library('Mypdf');
        $this->mypdf->generate('admin/Suratmasuk/laporansurat', $data, 'laporan-mahasiswa', 'A4', 'landscape');
    }

    private function _sendEmail($data, $jabatanid)
    {
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

        foreach ($jabatan as $j) {
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
                <td>' . $data['created_at'] . '</td>
            </tr>
            <tr>
                <td>Dengan No Surat</td>
                <td>:</td>
                <td>' . $data['no_surat']  . '</td>
            </tr>
            <tr>
                <td>Tanggal Surat</td>
                <td>:</td>
                <td>' . $data['tgl_surat']  . '</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>' . $data['perihal']  . '</td>
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
}
