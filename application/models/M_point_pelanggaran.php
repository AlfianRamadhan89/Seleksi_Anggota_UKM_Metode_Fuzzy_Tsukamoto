<?php
defined('BASEPATH') or exit('');

class M_point_pelanggaran extends CI_Model {

    public function getMax($table = null, $field = null) {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }
    
    public function insert($table,$where) {
        $this->db->insert($table,$where);
    }
    
    public function update($table,$value,$where) {
        $this->db->where($where);
        $this->db->update($table,$value);
    }

    public function delete($table,$where) {
        $this->db->delete($table,$where);
    }

    public function select($table,$select,$where,$order,$by) {
        $this->db->select($select);
        $this->db->from($table);
        if ($where == null) {
        } elseif ($where != null) {
            $this->db->where($where);
        }
        if ($order == null and $by == null) {
        } elseif ($order != null and $by != null) {
            $this->db->order_by($order,$by);
        }
        return $this->db->get();
    }

    public function grafik_metode() {
        $this->db->group_by('predikat');
        $this->db->select('predikat');
        $this->db->select('COUNT(*) AS total');
        return $this->db->from('penerapan')->get()->result();
    }

    public function grafik_jkel() {
        $this->db->group_by('jkel');
        $this->db->select('jkel');
        $this->db->select('COUNT(*) AS total');
        return $this->db->from('calon_anggota')->get()->result();
    }

    public function grafik_jur() {
        $this->db->group_by('jurusan');
        $this->db->select('jurusan');
        $this->db->select('COUNT(*) AS total');
        return $this->db->from('calon_anggota')->get()->result();
    }

}

?>