<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{

    public function countKategori()
    {
        $sql = "SELECT COUNT(*) AS jumlah_kategori FROM `kategori`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataKategori()
    {
        $sql = "SELECT * FROM `kategori`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpan_katergori($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('kategori', $data);
        }
    }
}
