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

    public function dataPeminjam()
    {
        $sql = "SELECT peminjaman.id_pinjam,buku.id_buku,anggota.id_anggota,anggota.nama_lengkap,buku.judul,peminjaman.tgl_pinjam,peminjaman.tempo,peminjaman.usr_input FROM `peminjaman`
INNER JOIN anggota
ON peminjaman.id_anggota=anggota.id_anggota
INNER join p_buku
ON p_buku.id_pinjam=peminjaman.id_pinjam
INNER JOIN buku
ON p_buku.id_buku=buku.id_buku;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function simpan_anggota($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('anggota', $data);
        }
    }
}
