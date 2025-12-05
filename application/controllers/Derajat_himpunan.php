<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Derajat_Himpunan extends CI_Controller {

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
        $data['judul_halaman'] = 'Derajat Himpunan';
        $data['derajat'] = $this->m_point_pelanggaran->select('derajat','*','','kd_derajat','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/Derajat_himpunan/Derajat_himpunan');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $table = 'derajat';
        $field = 'kd_derajat';

        $lastKD = $this->m_point_pelanggaran->getMax($table, $field);
        $noUrut = (int) substr($lastKD, -2, 2);
        $noUrut++;
        $str = "H";
        $newKD = $str . sprintf('%02s', $noUrut);

        $nama   = $this->input->post('nama');
        $foto   = $_FILES['foto']['name'];

        if ($foto == '') {
        } else {
            $config['upload_path']      = './assets/plugins/images/derajat_himpunan';
            $config['allowed_types']    = 'jpeg|jpg|png|gif';
            $config['file_name']        = $nama;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            } else {
                $isi = $this->upload->data('file_name');
            }
        }

        $nilai = array(
            'kd_derajat' => $newKD,
            'nm_derajat' => $nama,
            'grafik'     => $isi,
        );

        $this->m_point_pelanggaran->insert('derajat',$nilai);
        $this->session->set_userdata('pesan','t');
        redirect('Derajat_himpunan');
    }

    public function edit() {
        $kd         = $this->input->post('kd_derajat');
        $nama       = $this->input->post('nama');
        $old_foto   = $this->input->post('old_foto');
        $new_foto   = $_FILES['foto']['name'];

        $data = array(
            'nm_derajat' => $nama,
        );

        $where = array(
            'kd_derajat' => $kd
        );

        if ($new_foto == TRUE) {
            if ($fp = '') {
            } else {
                $config['upload_path']      = './assets/plugins/images/derajat_himpunan';
                $config['allowed_types']    = 'jpeg|jpg|png|gif';
                $config['file_name']        = $nama;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                } else {
                    if (file_exists('./assets/plugins/images/derajat_himpunan/'.$old_foto)) {
                        unlink('./assets/plugins/images/derajat_himpunan/'.$old_foto);
                    }
                    $data['grafik'] = $this->upload->data('file_name');
                }
            }
        } else {
            $data['grafik'] = $old_foto;
        }

        $this->m_point_pelanggaran->update('derajat',$data,$where);
        $this->session->set_userdata('pesan','e');
        redirect('Derajat_himpunan');
    }

    public function hapus() {
        $kd = $this->uri->segment('3');

        $where = array(
            'kd_derajat' => $kd
        );

        $cekData = $this->db->get_where('derajat', $where)->row();
            if (file_exists('./assets/plugins/images/derajat_himpunan/'.$cekData->grafik)) {
                unlink('./assets/plugins/images/derajat_himpunan/'.$cekData->grafik);
            }

        $this->m_point_pelanggaran->delete('derajat',$where);
        $this->session->set_userdata('pesan','h');
        redirect('Derajat_himpunan');
    }

    function get_data_derajat_edit() {
        $kd_d = $this->input->get('id');
        $get_k = $this->m_point_pelanggaran->select('derajat','*',"kd_derajat='$kd_d'",'kd_derajat','desc')->result();
        echo json_encode($get_k); 
    }

}

?>