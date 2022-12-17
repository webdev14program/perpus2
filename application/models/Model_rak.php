<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_rak extends CI_Model
{

    public function countRak()
    {
        $sql = "SELECT COUNT(*)  AS jumlah_rak FROM `rak`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataRak()
    {
        $sql = "SELECT * FROM `rak`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
