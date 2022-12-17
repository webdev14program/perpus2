<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_penerbit extends CI_Model
{

    public function countPenerbit()
    {
        $sql = "SELECT count(*) AS jumlah_penerbit FROM `penerbit`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataPenerbit()
    {
        $sql = "SELECT * FROM `penerbit`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
