<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        // $this->load->library('excel');
        if ($this->session->userdata('status') != 'login') {
            redirect('login/index');
        }
        
    }

    public function index() {
        $data['judul_halaman'] = 'Penilaian Anggota Baru';
        $data['penilaian'] = $this->m_point_pelanggaran->select('penilaian,calon_anggota','*','penilaian.stb=calon_anggota.stb','penilaian.id','asc')->result();
        $data['calon_anggota'] = $this->m_point_pelanggaran->select('calon_anggota','*','','stb','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/penilaian/penilaian');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $table = 'penilaian';
        $field = 'id';

        $lastKD = $this->m_point_pelanggaran->getMax($table, $field);
        $noUrut = (int) substr($lastKD, -3, 3);
        $noUrut++;
        $str = "P";
        $newKD = $str . sprintf('%03s', $noUrut);

        $stb            = $this->input->post('stb');
        $absen          = $this->input->post('absen');
        $pembelajaran   = $this->input->post('pembelajaran');
        $kegiatan       = $this->input->post('kegiatan');

        $nilai = array(
            'id' => $newKD,
            'stb' => $stb,
            'absensi' => $absen,
            'pembelajaran' => $pembelajaran,
            'kegiatan' => $kegiatan,
        );

        // $cek = $stb;
        // $get_s = $this->db->query('SELECT count(stb) AS hasil FROM penilaian WHERE stb = "$cek"')->num_rows();
        $this->db->select('stb');
        $this->db->where('stb', $stb);
        $query = $this->db->get('penilaian');
        $num = $query->num_rows();
        if ($num > 0) {
            // echo "Data Tersedia!";
            // var_dump($get_s);
            $this->session->set_userdata('pesan','a');
            redirect('penilaian');
        } else {
            // echo "Data Kosong";
            // var_dump($get_s);
            $this->m_point_pelanggaran->insert('penilaian',$nilai);
            $this->session->set_userdata('pesan','t');
            redirect('penilaian');
        }
    }

    public function edit() {
        $id             = $this->input->post('id');
        $absen          = $this->input->post('absen');
        $pembelajaran   = $this->input->post('pembelajaran');
        $kegiatan       = $this->input->post('kegiatan');

        $nilai = array(
            'absensi' => $absen,
            'pembelajaran' => $pembelajaran,
            'kegiatan' => $kegiatan,
        );

        $where = array(
            'id' => $id
        );

        $this->m_point_pelanggaran->update('penilaian',$nilai,$where);
        $this->session->set_userdata('pesan','e');
        redirect('penilaian');
    }

    public function hapus() {
        $id = $this->uri->segment('3');

        $where = array(
            'id' => $id
        );
        
        $this->m_point_pelanggaran->delete('penilaian',$where);
        $this->session->set_userdata('pesan','h');
        redirect('penilaian');
    }

    function get_data_penilaian_edit() {
        $id_p = $this->input->get('id');
        $get_k = $this->m_point_pelanggaran->select('penilaian','*',"id='$id_p'",'id','desc')->result();
        echo json_encode($get_k); 
    }

}

?>