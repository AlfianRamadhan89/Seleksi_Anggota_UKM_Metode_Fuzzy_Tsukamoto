<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Rule extends CI_Controller {

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
        $data['judul_halaman'] = 'Rule (Aturan)';
        $data['rule'] = $this->m_point_pelanggaran->select('rule','*','','kd_rule','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/rule/rule');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $table = 'rule';
        $field = 'kd_rule';

        $lastKD = $this->m_point_pelanggaran->getMax($table, $field);
        $noUrut = (int) substr($lastKD, -2, 2);
        $noUrut++;
        $str = "R";
        $newKD = $str . sprintf('%02s', $noUrut);

        $nama = $this->input->post('nama');

        $nilai = array(
            'kd_rule' => $newKD,
            'nm_rule' => $nama,
        );
        
        $this->m_point_pelanggaran->insert('rule',$nilai);
        $this->session->set_userdata('pesan','t');
        redirect('rule');
    }

    public function edit() {
        $kd = $this->input->post('kd');
        $nama = $this->input->post('nama');

        $nilai = array(
            'nm_rule' => $nama,
        );

        $where = array(
            'kd_rule' => $kd
        );

        $this->m_point_pelanggaran->update('rule',$nilai,$where);
        $this->session->set_userdata('pesan','e');
        redirect('rule');
    }

    public function hapus() {
        $kd = $this->uri->segment('3');

        $where = array(
            'kd_rule' => $kd
        );
        
        $this->m_point_pelanggaran->delete('rule',$where);
        $this->session->set_userdata('pesan','h');
        redirect('rule');
    }

    function get_data_rule_edit() {
        $kd_r = $this->input->get('id');
        $get_k = $this->m_point_pelanggaran->select('rule','*',"kd_rule='$kd_r'",'kd_rule','desc')->result();
        echo json_encode($get_k); 
    }

}

?>