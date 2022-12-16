<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_anggota extends CI_Model
{

    public function countAngota()
    {
        $sql = "SELECT COUNT(*) AS jumlah_anggota FROM `anggota`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataAngota()
    {
        $sql = "SELECT * FROM `anggota`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function detail_Angota($id_anggota)
    {
        $sql = "SELECT * FROM `anggota`
WHERE id_anggota='$id_anggota';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}
