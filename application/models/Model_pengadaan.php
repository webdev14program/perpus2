<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengadaan extends CI_Model
{

    public function countPengadaan()
    {
        $sql = "SELECT SUM(jml) AS jumlah_pengadaan FROM `pengadaan`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataBuku()
    {
        $sql = "SELECT buku.id_buku,buku.id_kategori,buku.id_penerbit,buku.id_rak, buku.judul, penerbit.penerbit,buku.jmlbuku,kategori.kategori,rak.rak FROM `buku`
                INNER JOIN kategori
                ON buku.id_kategori=kategori.id_kategori
                INNER JOIN penerbit
                ON buku.id_penerbit=penerbit.id_penerbit
                INNER JOIN rak
                ON buku.id_rak=rak.id_rak;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function detailBuku($id_buku)
    {
        $sql = "SELECT * FROM `buku`
                INNER JOIN kategori
                ON buku.id_kategori=kategori.id_kategori
                INNER JOIN penerbit
                ON buku.id_penerbit=penerbit.id_penerbit
                INNER JOIN rak
                ON buku.id_rak=rak.id_rak
                WHERE buku.id_buku='$id_buku';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}
