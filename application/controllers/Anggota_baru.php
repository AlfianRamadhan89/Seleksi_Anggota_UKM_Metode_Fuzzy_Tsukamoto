<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Anggota_baru extends CI_Controller {

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
        $data['judul_halaman'] = 'Data Anggota Baru';
        // $data['kelas']=$this->m_point_pelanggaran->select('kelas,guru','*','kelas.id_wali_kelas=guru.id_guru','kelas.id_kelas','asc')->result();
        $data['anggota_baru'] = $this->m_point_pelanggaran->select('calon_anggota','*','','stb','asc')->result();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/anggota_baru/anggota_baru');
        $this->load->view('super_admin/footer');
    }

    public function tambah() {
        $stb            = $this->input->post('stb');
        $nama           = $this->input->post('nama');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tggl_lahir     = $this->input->post('tggl_lahir');
        $jkl            = $this->input->post('jkl');
        $alamat         = $this->input->post('alamat');
        $no_hp          = $this->input->post('no_hp');
        $email          = $this->input->post('email');
        $jur            = $this->input->post('jur');
        $foto           = $_FILES['foto']['name'];
        // $foto           = $this->input->post('foto');
        // Pindah Ke Manajemen Akun
        // $username       = $this->input->post('username');
        // $pass           = $this->input->post('pass');
        // $status         = $this->input->post('status');

        if ($foto == '') {
            $isi = 'noavatar.jpg';
        } else {
            $config['upload_path']      = './assets/plugins/images/users';
            $config['allowed_types']    = 'jpeg|jpg|png|gif';
            $config['file_name']        = $stb;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            } else {
                $isi = $this->upload->data('file_name');
            }
        }

        $data = array(
            'stb' => $stb,
            'nama' => $nama,
            'tmpt_lahir' => $tempat_lahir,
            'tgl_lahir' => $tggl_lahir,
            'jkel' => $jkl,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'email' => $email,
            'jurusan' => $jur,
            'foto' => $isi,
            // Pindah Ke Manajemen Akun
            // 'username' => $username,
            // 'password' => $pass,
            // 'status_akun' => $status,
        );

        $this->db->select('stb');
        $this->db->where('stb', $stb);
        $query = $this->db->get('calon_anggota');
        $num = $query->num_rows();
        if ($num > 0) {
            // echo "Data Tersedia!";
            // var_dump($get_s);
            $this->session->set_userdata('pesan','a');
            redirect('anggota_baru');
        } else {
            // echo "Data Kosong";
            // var_dump($get_s);
            $this->m_point_pelanggaran->insert('calon_anggota',$data);
            $this->session->set_userdata('pesan','t');
            redirect('anggota_baru');
        }
    }

    public function edit() {
        $stb            = $this->input->post('stb');
        $nama           = $this->input->post('nama');
        $tempat_lahir   = $this->input->post('tmpt_lahir');
        $tggl_lahir     = $this->input->post('tggl_lahir');
        $jkl            = $this->input->post('jkl');
        $alamat         = $this->input->post('alamat');
        $no_hp          = $this->input->post('no_hp');
        $email          = $this->input->post('email');
        $jur            = $this->input->post('jur');
        $old_foto       = $this->input->post('old_foto');
        $new_foto       = $_FILES['foto']['name'];
        // Pindah Ke Manajemen Akun
        // $username       = $this->input->post('username');
        // $pass           = $this->input->post('pass');
        // $status         = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'tmpt_lahir' => $tempat_lahir,
            'tgl_lahir' => $tggl_lahir,
            'jkel' => $jkl,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'email' => $email,
            'jurusan' => $jur,
            // Pindah Ke Manajemen Akun
            // 'username' => $username,
            // 'password' => $pass,
            // 'status_akun' => $status,
        );

        $where = array(
            'stb' => $stb
        );

        if ($new_foto == TRUE) {
            if ($fp = '') {
            } else {
                $config['upload_path']      = './assets/plugins/images/users';
                $config['allowed_types']    = 'jpeg|jpg|png|gif';
                $config['file_name']        = $stb;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                } else {
                    $cekData = $this->db->get_where('calon_anggota', $where)->row();
                    if ($cekData->foto == 'noavatar.jpg') {
                    } else {
                        if (file_exists('./assets/plugins/images/users/'.$cekData->foto)) {
                            unlink('./assets/plugins/images/users/'.$cekData->foto);
                        }
                    }
                    $data['foto'] = $this->upload->data('file_name');
                }
            }
        } else {
            $data['foto'] = $old_foto;
        }
        
        $this->m_point_pelanggaran->update('calon_anggota',$data,$where);
        $this->session->set_userdata('pesan','e');
        redirect('anggota_baru');
    }

    public function hapus() {
        $id = $this->uri->segment('3');

        $where = array(
            'stb' => $id
        );

        $cekData = $this->db->get_where('calon_anggota', $where)->row();
        if ($cekData->foto == 'noavatar.jpg') {
        } else {
            if (file_exists('./assets/plugins/images/users/'.$cekData->foto)) {
                unlink('./assets/plugins/images/users/'.$cekData->foto);
            }
        }
        
        $this->m_point_pelanggaran->delete('calon_anggota',$where);
        $this->session->set_userdata('pesan','h');
        redirect('anggota_baru');
    }

    public function detail() {
        $stb = $this->uri->segment('3');

        $where = array(
            'stb' => $stb
        );

        $data['detailData'] = $this->db->get_where('calon_anggota', $where)->row();
        // $data['detailData'] = $this->m_point_pelanggaran->select('calon_anggota', '*', "stb='$stb'", 'stb' , 'asc')->row();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/anggota_baru/detail_anggota_baru');
        $this->load->view('super_admin/footer');
    }

    function get_data_anggota_edit() {
        $id = $this->input->get('id');
        $get_kelas = $this->m_point_pelanggaran->select('calon_anggota','*',"stb='$id'",'stb','desc')->result();
        echo json_encode($get_kelas); 
    }

    public function grafik() {
        $data['judul_halaman'] = 'Grafik Data Anggota Baru';
        $data['grafik_jkel'] = $this->m_point_pelanggaran->grafik_jkel();
        $data['grafik_jur'] = $this->m_point_pelanggaran->grafik_jur();
        // var_dump($data);
        // die();
        $this->load->view('super_admin/header',$data);
        $this->load->view('super_admin/sidebar');
        $this->load->view('super_admin/navbar');
        $this->load->view('super_admin/anggota_baru/grafik_anggota_baru');
        $this->load->view('super_admin/footer');
    }

}

?>