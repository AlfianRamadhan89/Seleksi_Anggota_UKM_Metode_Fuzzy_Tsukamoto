<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Aspek_penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        // $this->load->library('excel');
        if ($this->session->userdata('status') != 'login'){
            redirect('login/index');
        }
    }

    public function index() {
        $data['judul_halaman'] = 'Aspek Penilaian';
        $data['aspek_penilaian'] = $this->m_point_pelanggaran->select('aspek_penilaian','*','','id_aspek_penilaian','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/aspek_penilaian/aspek_penilaian');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $table = 'aspek_penilaian';
        $field = 'id_aspek_penilaian';

        $lastID = $this->m_point_pelanggaran->getMax($table, $field);
        $noUrut = (int) substr($lastID, -3, 3);
        $noUrut++;
        $str = "AP";
        $newID = $str . sprintf('%03s', $noUrut);

        $nama  = $this->input->post('nama');

        $nilai = array(
            'id_aspek_penilaian' => $newID,
            'nama_aspek_penilaian' => $nama,
        );

        $this->m_point_pelanggaran->insert('aspek_penilaian',$nilai);
        $this->session->set_userdata('pesan','t');
        redirect('aspek_penilaian');
    }

    public function edit() {
        $id     = $this->input->post('id_ap');
        $nama   = $this->input->post('nama');

        $nilai = array(
            'nama_aspek_penilaian' => $nama,
        );

        $where = array(
            'id_aspek_penilaian' => $id
        );

        $this->m_point_pelanggaran->update('aspek_penilaian',$nilai,$where);
        $this->session->set_userdata('pesan','e');
        redirect('aspek_penilaian');
    }

    public function hapus() {
        $id = $this->uri->segment('3');

        $where = array(
            'id_aspek_penilaian' => $id
        );

        $this->m_point_pelanggaran->delete('aspek_penilaian',$where);
        $this->session->set_userdata('pesan','h');
        redirect('aspek_penilaian');
    }

    function get_data_aspek_penilaian_edit() {
        $id_ap = $this->input->get('id');
        $get_jp = $this->m_point_pelanggaran->select('aspek_penilaian','*',"id_aspek_penilaian='$id_ap'",'id_aspek_penilaian','desc')->result();
        echo json_encode($get_jp); 
    }

}

?>