<?php

function is_logged_in()
{
    $ci = get_instance(); //pengganti this, karena $this pada helper tidak termasuk bagian dari CI

    if (!$ci->session->userdata('nip')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); //mengambil url dari urutan ke berapa


        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('Auth/Blocked');
        }
    }
}

function is_admin(){
    $ci = get_instance();
    $jabatan = $ci->session->userdata('level');

    if($jabatan != "Admin"){
        redirect('Auth/Blocked');
    }
}

function is_camat(){
    $ci = get_instance();
    $jabatan = $ci->session->userdata('level');

    if($jabatan != "Camat"){
        redirect('Auth/Blocked');
    }
}

function is_sekcam(){
    $ci = get_instance();
    $jabatan = $ci->session->userdata('level');

    if($jabatan != "Sekcam"){
        redirect('Auth/Blocked');
    }
}

function is_user(){
    $ci = get_instance();
    $jabatan = $ci->session->userdata('level');

    if($jabatan != "User"){
        redirect('Auth/Blocked');
    }
}



function checked_access($role_id, $menu_id)
{

    $ci = get_instance();
    $result =  $ci->db->get_where('user_access_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}


function model_admin()
{
    $ci = get_instance();
    $ci->load->model('Surat_model');
    $ci->load->model('SuratKeluar_model');
    $ci->load->model('User_model');
}


if (!function_exists('bulan')) {
    function bulan()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('tanggal')) {
    function tanggal()
    {
        $tanggal = Date('d') . " " . bulan() . " " . Date('Y');
        return $tanggal;
    }
}






function header_nav($data)
{
    $ci = get_instance();
    $ci->load->view('inc/v_header', $data);
    $ci->load->view('inc/v_navbar', $data);
    $ci->load->view('inc/v_sidebar', $data);
}

function footer_nav() 
{
    $ci = get_instance();
    $ci->load->view('inc/v_footer2');
}


function count_admin()
{
    $ci = get_instance();
    $ci->db->where('role_id = 1');
    return $ci->db->count_all_results('user');
}

function count_staff()
{
    $ci = get_instance();
    $ci->db->where('role_id = 2');
    return $ci->db->count_all_results('user');
}

function count_user()
{
    $ci = get_instance();
    $ci->db->where('role_id = 3');
    return $ci->db->count_all_results('user');
}

function count_kegiatan()
{
    $ci = get_instance();
    $ci->db->where('status = 1');
    return $ci->db->count_all_results('kegiatan');
}

function time_since($waktu)
{
    date_default_timezone_set('Asia/Jakarta');
    $chunks = array(
        array(60 * 60 * 24 * 365, 'tahun'),
        array(60 * 60 * 24 * 30, 'bulan'),
        array(60 * 60 * 24 * 7, 'minggu'),
        array(60 * 60 * 24, 'hari'),
        array(60 * 60, 'jam'),
        array(60, 'menit'),
    );

    $original = strtotime($waktu);

    $today = time();
    $since = $today - $original;

    if ($since > 604800) {
        $print = date("M jS", $original);
        if ($since > 31536000) {
            $print .= ", " . date("Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0)
            break;
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
    return $print . ' yang lalu';
}

function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    return $result;
  }
