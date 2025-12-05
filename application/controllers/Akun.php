<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Akun extends CI_Controller {

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
        $data['judul_halaman'] = 'Manajemen Akun';
        $data['anggota'] = $this->m_point_pelanggaran->select('calon_anggota','*','','stb','asc')->result();
        $data['akun'] = $this->m_point_pelanggaran->select('akun,calon_anggota','*','akun.stb=calon_anggota.stb','id_akun','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/akun/akun');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $table = 'akun';
        $field = 'id_akun';

        $lastID = $this->m_point_pelanggaran->getMax($table, $field);
        $noUrut = (int) substr($lastID, -3, 3);
        $noUrut++;
        $str = "A";
        $newID = $str . sprintf('%03s', $noUrut);

        $stb        = $this->input->post('stb');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $level      = $this->input->post('level');
        $status     = $this->input->post('status');

        $nilai = array(
            'id_akun' => $newID,
            'stb' => $stb,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'status_akun' => $status,
        );

        // $cek1 = $stb;
        // $get_a = $this->db->query('SELECT count(stb) AS hasil1 FROM akun WHERE stb = "$cek1"')->row_array();
        $this->db->select('stb');
        $this->db->where('stb',$stb);
        $query = $this->db->get('akun');
        $num = $query->num_rows();
        if ($num > 0) {
            // echo "Data Tersedia";
            $this->session->set_userdata('pesan','a');
            redirect('Akun');
        } else {
            // echo "Data Kosong";
            $this->m_point_pelanggaran->insert('akun',$nilai);
            $this->session->set_userdata('pesan','t');
            redirect('Akun');
        }
    }

    public function edit() {
        $id         = $this->input->post('id_akun');
        $stb        = $this->input->post('stb');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $level      = $this->input->post('level');
        $status     = $this->input->post('status');

        $nilai = array(
            'stb' => $stb,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'status_akun' => $status,
        );

        $where = array(
            'id_akun' => $id,
        );

        $this->m_point_pelanggaran->update('akun',$nilai,$where);
        $this->session->set_userdata('pesan','e');
        redirect('Akun');
    }

    public function hapus() {
        $id = $this->uri->segment('3');

        $where = array(
            'id_akun' => $id
        );
        
        $this->m_point_pelanggaran->delete('akun',$where);
        $this->session->set_userdata('pesan','h');
        redirect('Akun');
    }

    function get_data_akun_edit() {
        $id_a = $this->input->get('id');
        $get_k = $this->m_point_pelanggaran->select('akun','*',"id_akun='$id_a'",'id_akun','desc')->result();
        echo json_encode($get_k); 
    }

}

?>