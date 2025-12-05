<?php
error_reporting(0);
defined('BASEPATH') or exit('');

class Tsukamoto extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        // $this->load->library('excel');
        if ($this->session->userdata('status') != 'login') {
            redirect('login/index');
        }
    }

    public function proses() {
        $stb = $this->uri->segment('3');

        // echo $stb'<br>';

        $cek = $this->db->get_where('penilaian', array('stb' => $stb))->row();

        $nAbsensi       = $cek->absensi;
        $nPembelajaran  = $cek->pembelajaran;
        $nKegiatan      = $cek->kegiatan;

        // echo $cek->absensi'<br>';
        // echo $cek->pembelajaran'<br>';
        // echo $cek->kegiatan'<br>';

        $abRendah = 10;
        $abSedang = 6;
        $abTinggi = 2;

        $peBuruk  = 40;
        $peCukup  = 60;
        $peBaik   = 80;

        $keKurang = 1;
        $keBaik   = 4;

        $kpTidakLulus  = 45;
        $kpKesempatan  = 60;
        $kpLulus       = 75;

        $batasMinAbsensi = 0;
        $batasMaxAbsensi = 15;
        $batasMinKegiatan = 0;
        $batasMaxKegiatan = 5;
        $batasMinPembelajaran = 0;
        $batasMaxPembelajaran = 100;

        if ($nAbsensi < $batasMinAbsensi || $nAbsensi > $batasMaxAbsensi || $nKegiatan < $batasMinKegiatan || $nKegiatan > $batasMaxKegiatan || $nPembelajaran < $batasMinPembelajaran || $nPembelajaran > $batasMaxPembelajaran) {
            $this->session->set_userdata('pesan','x');
            redirect('Penerapan_metode');
        } else {

            // Start Fuzzifikasi

            //Absensi Rendah
            if ($nAbsensi >= $abRendah) {
                $abHasilRendah = 1;
            } else if ($nAbsensi > $abSedang && $nAbsensi < $abRendah) {
                $abHasilRendah = ($nAbsensi - $abSedang) / ($abRendah - $abSedang);
            } else if ($nAbsensi <= $abSedang) {
                $abHasilRendah = 0;
            }
            // echo $abHasilRendah.'<br>';

            //Absensi Cukup
            if ($nAbsensi == $abSedang) {
                $abHasilSedang = 1;
            } else if ($nAbsensi > $abSedang && $nAbsensi < $abRendah) {
                $abHasilSedang = ($abRendah - $nAbsensi) / ($abRendah - $abSedang);
            } else if ($nAbsensi > $abTinggi && $nAbsensi < $abSedang) {
                $abHasilSedang = ($nAbsensi - $abTinggi) / ($abSedang - $abTinggi);
            } else if ($nAbsensi <= $abTinggi || $nAbsensi >= $abRendah) {
                $abHasilSedang = 0;
            }
            // echo $abHasilSedang.'<br>';

            //Absensi Tinggi
            if ($nAbsensi <= $abTinggi) {
                $abHasilTinggi = 1;
            } else if ($nAbsensi > $abTinggi && $nAbsensi < $abSedang) {
                $abHasilTinggi = ($abSedang - $nAbsensi) / ($abSedang - $abTinggi);
            } else if ($nAbsensi >= $abSedang) {
                $abHasilTinggi = 0;
            }
            // echo $abHasilTinggi.'<br>';

            //Pembelajaran Buruk
            if ($nPembelajaran <= $peBuruk) {
                $peHasilBuruk = 1;
            } else if ($nPembelajaran > $peBuruk && $nPembelajaran < $peCukup) {
                $peHasilBuruk = ($peCukup - $nPembelajaran) / ($peCukup - $peBuruk);
            } else if ($nPembelajaran >= $peCukup) {
                $peHasilBuruk = 0;
            }
            // echo $peHasilBuruk.'<br>';

            //Pembelajaran Cukup
            if ($nPembelajaran == $peCukup) {
                $peHasilCukup = 1;
            } else if ($nPembelajaran > $peCukup && $nPembelajaran < $peBaik) {
                $peHasilCukup = ($peBaik - $nPembelajaran) / ($peBaik - $peCukup);
            } else if ($nPembelajaran > $peBuruk && $nPembelajaran < $peCukup) {
                $peHasilCukup = ($nPembelajaran - $peBuruk) / ($peCukup - $peBuruk);
            } else if ($nPembelajaran <= $peBuruk || $nPembelajaran >= $peBaik) {
                $peHasilCukup = 0;
            }
            // echo $peHasilCukup.'<br>';

            //Pembelajaran Baik
            if ($nPembelajaran >= $peBaik) {
                $peHasilBaik = 1;
            } else if ($nPembelajaran > $peCukup && $nPembelajaran < $peBaik) {
                $peHasilBaik = ($nPembelajaran - $peCukup) / ($peBaik - $peCukup);
            } else if ($nPembelajaran <= $peCukup) {
                $peHasilBaik = 0;
            }
            // echo $peHasilBaik.'<br>';

            //Kegiatan Kurang
            if ($nKegiatan <= $keKurang) {
                $keHasilKurang = 1;
            } else if ($nKegiatan > $keKurang && $nKegiatan < $keBaik) {
                $keHasilKurang = ($keBaik - $nKegiatan) / ($keBaik - $keKurang);
            } else if ($nKegiatan >= $keBaik) {
                $keHasilKurang = 0;
            }
            // echo $keHasilKurang.'<br>';

            //Kegiatan Baik
            if ($nKegiatan >= $keBaik) {
                $keHasilBaik = 1;
            } else if ($nKegiatan > $keKurang && $nKegiatan < $keBaik) {
                $keHasilBaik = ($nKegiatan - $keKurang) / ($keBaik - $keKurang);
            } else if ($nKegiatan <= $keKurang) {
                $keHasilBaik = 0;
            }
            // echo $keHasilBaik.'<br>';

            // End Fuzzifikasi


            // Start Inferensi

            $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = $a7 = $a8 = $a9 = $a10 = $a11 = $a12 = $a13 = $a14 = $a15 = $a16 = $a17 = $a18 = $a19 = $a20 = $a21 = $a22 = $a23 = $a24 = $a25 = $a26 = $a27 = $a28 = $a29 = $a30 = $a31 = $a32 = $a33 = $a34 = $a35 = $a36 = 0;
            // echo $a1.'<br>';

            $z1 = $z2 = $z3 = $z4 = $z5 = $z6 = $z7 = $z8 = $z9 = $a10 = $z11 = $z12 = $z13 = $z14 = $z15 = $z16 = $z17 = $z18 = $z19 = $z20 = $z21 = $z22 = $z23 = $z24 = $z25 = $z26 = $z27 = $z28 = $z29 = $z30 = $z31 = $z32 = $z33 = $z34 = $z35 = $z36 = 0;
            // echo $z1.'<br>';

            // Start Perhitungan Berdasarkan Rules Yang Telah Dibuat

            // Kurva Turun
            // $z1 = $kpKesempatan - $a1 * ($kpKesempatan - $kpTidakLulus);

            // Kurva Naik
            // $z2 = $a2 * ($kpLulus - $kpKesempatan) + $$kpKesempatan;

            $a1 = min($abHasilTinggi,$peHasilBaik,$keHasilBaik); //R1 Hasilnya Lulus
            $z1 = $a1 * ($kpLulus - $kpTidakLulus) + $kpTidakLulus;

            $a2 = min($abHasilTinggi,$peHasilBaik,$keHasilKurang); //R2 Hasilnya Tidak Lulus
            $z2 = $kpLulus - $a2 * ($kpLulus - $kpTidakLulus);

            $a3 = min($abHasilTinggi,$peHasilCukup,$keHasilBaik); //R3 Hasilnya Lulus
            $z3 = $a3 * ($kpLulus - $kpTidakLulus) + $kpTidakLulus;

            $a4 = min($abHasilTinggi,$peHasilCukup,$keHasilKurang); //R4 Hasilnya Tidak Lulus
            $z4 = $kpLulus - $a4 * ($kpLulus - $kpTidakLulus);

            $a5 = min($abHasilTinggi,$peHasilBuruk,$keHasilBaik); //R5 Hasilnya Tidak Lulus
            $z5 = $kpLulus - $a5 * ($kpLulus - $kpTidakLulus);

            $a6 = min($abHasilTinggi,$peHasilBuruk,$keHasilKurang); //R6 Hasilnya Tidak Lulus
            $z6 = $kpLulus - $a6 * ($kpLulus - $kpTidakLulus);

            $a7 = min($abHasilSedang,$peHasilBaik,$keHasilBaik); //R7 Hasilnya Lulus
            $z7 = $a7 * ($kpLulus - $kpTidakLulus) + $kpTidakLulus;

            $a8 = min($abHasilSedang,$peHasilBaik,$keHasilKurang); //R8 Hasilnya Tidak Lulus
            $z8 = $kpLulus - $a8 * ($kpLulus - $kpTidakLulus);

            $a9 = min($abHasilSedang,$peHasilCukup,$keHasilBaik); //R9 Hasilnya Lulus
            $z9 = $a9 * ($kpLulus - $kpTidakLulus) + $kpTidakLulus;

            $a10 = min($abHasilSedang,$peHasilCukup,$keHasilKurang); //R10 Hasilnya Tidak Lulus
            $z10 = $kpLulus - $a10 * ($kpLulus - $kpTidakLulus);

            $a11 = min($abHasilSedang,$peHasilBuruk,$keHasilBaik); //R11 Hasilnya Tidak Lulus
            $z11 = $kpLulus - $a11 * ($kpLulus - $kpTidakLulus);

            $a12 = min($abHasilSedang,$peHasilBuruk,$keHasilKurang); //R12 Hasilnya Tidak Lulus
            $z12 = $kpLulus - $a12 * ($kpLulus - $kpTidakLulus);

            $a13 = min($abHasilRendah,$peHasilBaik,$keHasilBaik); //R13 Hasilnya Tidak Lulus
            $z13 = $kpLulus - $a13* ($kpLulus - $kpTidakLulus);

            $a14 = min($abHasilRendah,$peHasilBaik,$keHasilKurang); //R14 Hasilnya Tidak Lulus
            $z14= $kpLulus - $a14 * ($kpLulus - $kpTidakLulus);

            $a15 = min($abHasilRendah,$peHasilCukup,$keHasilBaik); //R15 Hasilnya Tidak Lulus
            $z15 = $kpLulus - $a15 * ($kpLulus - $kpTidakLulus);

            $a16 = min($abHasilRendah,$peHasilCukup,$keHasilKurang); //R16 Hasilnya Tidak Lulus
            $z16 = $kpLulus - $a16 * ($kpLulus - $kpTidakLulus);

            $a17 = min($abHasilRendah,$peHasilBuruk,$keHasilBaik); //R17 Hasilnya Tidak Lulus
            $z17 = $kpLulus - $a17 * ($kpLulus - $kpTidakLulus);

            $a18 = min($abHasilRendah,$peHasilBuruk,$keHasilKurang); //R18 Hasilnya Tidak Lulus
            $z18 = $kpLulus - $a18 * ($kpLulus - $kpTidakLulus);
            // echo $z7.'<br>';
            // echo $a7.'<br>';

            // End Perhitungan Berdasarkan Rules Yang Telah Dibuat

            // End Inferensi


            // Start Defuzzifikasi

            $total_AiZi = ($a1 * $z1) + ($a2 * $z2) + ($a3 * $z3) + ($a4 * $z4) + ($a5 * $z5) + ($a6 * $z6) + ($a7 * $z7) + ($a8 * $z8) + ($a9 * $z9) + ($a10 * $z10) + ($a11 * $z11) + ($a12 * $z12) + ($a13 * $z13) + ($a14 * $z14) + ($a15 * $z15) + ($a16 * $z16) + ($a17 * $z17) + ($a18 * $z18);
            // echo $total_AiZi.'<br>';

            $total_a = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12 + $a13 + $a14 + $a15 + $a16 + $a17 + $a18;
            // echo $total_a.'<br>';

            $total_z = $z1 + $z2 + $z3 + $z4 + $z5 + $z6 + $z7 + $z8 + $z9 + $z10 + $z11 + $z12 + $z13 + $z14 + $z15 + $z16 + $z17 + $z18;
            // echo $total_z.'<br>';

            // $coba1 = $total_z / $total_a;
            // echo $coba1.'<br>';
            // $coba2 = $total_z / $total_AiZi;
            // echo $coba2.'<br>';
            // $hasil_coba = $coba1 / $coba2;
            // echo $hasil_coba.'<br>';

            $keputusan = $total_AiZi / $total_a;
            // $keputusan = 61;
            // echo $keputusan.'<br>';

            //Nilai Rekomendasi Tidak Lulus
            if ($keputusan <= $kpTidakLulus) {
                $HasilRekomTdkLulus = 1;
            } else if ($keputusan > $kpTidakLulus && $keputusan < $kpLulus) {
                $HasilRekomTdkLulus = ($kpLulus - $keputusan) / ($kpLulus - $kpTidakLulus);
            } else if ($keputusan >= $kpLulus) {
                $HasilRekomTdkLulus = 0;
            }
            // if ($keputusan <= $kpTidakLulus) {
            //     $HasilRekomTdkLulus = 1;
            // } else if ($keputusan > $kpTidakLulus && $keputusan < $kpKesempatan) {
            //     $HasilRekomTdkLulus = ($kpKesempatan - $keputusan) / ($kpKesempatan - $kpTidakLulus);
            // } else if ($keputusan >= $kpKesempatan) {
            //     $HasilRekomTdkLulus = 0;
            // }
            // echo $HasilRekomTdkLulus.'<br>';

            //Nilai Rekomendasi Lulus
            if ($keputusan >= $kpLulus) {
                $HasilRekomLulus = 1;
            } else if ($keputusan > $kpTidakLulus && $keputusan < $kpLulus) {
                $HasilRekomLulus = ($keputusan - $kpTidakLulus) / ($kpLulus - $kpTidakLulus);
            } else if ($keputusan <= $kpTidakLulus) {
                $HasilRekomLulus = 0;
            }
            // if ($keputusan >= $kpLulus) {
            //     $HasilRekomLulus = 1;
            // } else if ($keputusan > $kpKesempatan && $keputusan < $kpLulus) {
            //     $HasilRekomLulus = ($kpLulus - $keputusan) / ($kpLulus - $kpKesempatan);
            // } else if ($keputusan <= $kpKesempatan) {
            //     $HasilRekomLulus = 0;
            // }
            // echo $HasilRekomLulus.'<br>';

            // Predikat yang didapat
            if (round($HasilRekomLulus,0) >= round($HasilRekomTdkLulus,0)) {
                $predikat = "Lulus";
            } else if (round($HasilRekomLulus,0) < round($HasilRekomTdkLulus,0)) {
                $predikat = "Tidak Lulus";
            }
            // echo $predikat.'<br>';

            // End Defuzzifikasi
        }

        $nilai = array(
            'ab_tinggi' => $abHasilTinggi,
            'ab_sedang' => $abHasilSedang,
            'ab_rendah' => $abHasilRendah,
            'pe_baik' => $peHasilBaik,
            'pe_cukup' => $peHasilCukup,
            'pe_buruk' => $peHasilBuruk,
            'ke_baik' => $keHasilBaik,
            'ke_kurang' => $keHasilKurang,
            'total_AiZi' => $total_AiZi,
            'total_a' => $total_a,
            'kep_lulus' => $HasilRekomLulus,
            'kep_tdklulus' => $HasilRekomTdkLulus,
            'n_rekomendasi' => $keputusan,
            'predikat' => $predikat,
        );

        $where = array(
            'stb' => $stb
        );

        $this->db->select('stb');
        $this->db->where('stb', $stb);
        $query = $this->db->get('penilaian');
        $num = $query->num_rows();
        if ($num > 0) {
            // echo "Data Telah Dinilai";
            $this->m_point_pelanggaran->update('penerapan',$nilai,$where);
            $this->session->set_userdata('pesan','e');
            redirect('Penerapan_metode');
        } else {
            // echo "Data Belum Dinilai";
            $this->session->set_userdata('pesan','n');
            redirect('Penerapan_metode');
        }
    }

}

?>