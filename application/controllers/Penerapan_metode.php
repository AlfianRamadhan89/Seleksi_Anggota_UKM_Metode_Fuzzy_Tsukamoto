<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Penerapan_metode extends CI_Controller {

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
        $data['judul_halaman'] = 'Penerapan Metode Fuzzy Tsukamoto';
        $data['calon_anggota'] = $this->m_point_pelanggaran->select('calon_anggota','*','','stb','asc')->result();
        $data['penerapan'] = $this->m_point_pelanggaran->select('penerapan,calon_anggota','*','penerapan.stb=calon_anggota.stb','penerapan.id_penerapan','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/penerapan_metode/penerapan_metode');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $table = 'penerapan';
        $field = 'id_penerapan';

        $lastKD = $this->m_point_pelanggaran->getMax($table, $field);
        $noUrut = (int) substr($lastKD, -3, 3);
        $noUrut++;
        $str = "M";
        $newKD = $str . sprintf('%03s', $noUrut);

        $stb = $this->input->post('stb');

        $nilai = array(
            'id_penerapan' => $newKD,
            'stb' => $stb,
        );

        $this->db->select('stb');
        $this->db->where('stb', $stb);
        $query = $this->db->get('penerapan');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_userdata('pesan','a');
            redirect('Penerapan_metode');
        } else {
            $this->m_point_pelanggaran->insert('penerapan',$nilai);
            $this->session->set_userdata('pesan','t');
            redirect('Penerapan_metode');
        }
    }

    public function hapus() {
        $id = $this->uri->segment('3');

        $where = array(
            'id_penerapan' => $id
        );
        
        $this->m_point_pelanggaran->delete('penerapan',$where);
        $this->session->set_userdata('pesan','h');
        redirect('Penerapan_metode');
    }

    public function grafik() {
        $data['judul_halaman'] = 'Grafik Penerapan Metode Fuzzy Tsukamoto';
        $data['grafik_penerapan'] = $this->m_point_pelanggaran->grafik_metode();
        // var_dump($data);
        // die();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/penerapan_metode/grafik_penerapan');
        $this->load->view('super_admin/footer');
    }

}

?>