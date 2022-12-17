<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{

    public function dataKategori()
    {
        $sql = "SELECT * FROM `kategori`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
