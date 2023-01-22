<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pinjam extends CI_Model
{

    public function countPinjam()
    {
        $sql = "SELECT COUNT(*) AS jumlah_pinjam FROM `peminjaman`
INNER JOIN anggota
ON peminjaman.id_anggota=anggota.id_anggota
INNER JOIN p_buku
ON p_buku.id_pinjam=peminjaman.id_pinjam
INNER JOIN buku
ON p_buku.id_buku=buku.id_buku
WHERE peminjaman.status='PINJAM';";
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

    public function dataBukuPinjam($id_anggota)
    {
        $sql = "SELECT peminjaman.id_pinjam,anggota.id_anggota,anggota.nama_lengkap, buku.judul,peminjaman.tgl_pinjam,peminjaman.tempo, peminjaman.status,peminjaman.usr_input FROM `peminjaman`
                INNER JOIN anggota
                ON peminjaman.id_anggota=anggota.id_anggota
                INNER JOIN p_buku
                ON p_buku.id_pinjam=peminjaman.id_pinjam
                INNER JOIN buku
                ON p_buku.id_buku=buku.id_buku
                WHERE anggota.id_anggota='$id_anggota' AND peminjaman.status='PINJAM';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataBukuKembali()
    {
        $sql = "SELECT peminjaman.id_pinjam,anggota.id_anggota,anggota.nama_lengkap, buku.judul,peminjaman.tgl_pinjam,peminjaman.tempo,peminjaman.timestamp, peminjaman.status,peminjaman.usr_input FROM `peminjaman`
                INNER JOIN anggota
                ON peminjaman.id_anggota=anggota.id_anggota
                INNER JOIN p_buku
                ON p_buku.id_pinjam=peminjaman.id_pinjam
                INNER JOIN buku
                ON p_buku.id_buku=buku.id_buku
                WHERE peminjaman.status='KEMBALI';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function pinjam_buku_perbulan_pertahun()
    {
        $sql = "SELECT monthname(peminjaman.timestamp) AS bulan, year(peminjaman.timestamp) AS tahun, COUNT(*) AS jumlah_pinjam,concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) AS bulan_tahun FROM `peminjaman`
                WHERE status='PINJAM'
                GROUP BY concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp) );";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function header_buku_perbulan_pertahun($bulan_tahun)
    {
        $sql = "SELECT monthname(peminjaman.timestamp) AS bulan, year(peminjaman.timestamp) AS tahun, COUNT(*) AS jumlah_pinjam,concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) AS bulan_tahun FROM `peminjaman`
                WHERE status='PINJAM' AND concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) = '$bulan_tahun'
                GROUP BY concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp) );";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function header_buku_kembali_perbulan_pertahun($bulan_tahun)
    {
        $sql = "SELECT monthname(peminjaman.timestamp) AS bulan, year(peminjaman.timestamp) AS tahun, COUNT(*) AS jumlah_pinjam,concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) AS bulan_tahun FROM `peminjaman`
                WHERE status='KEMBALI' AND concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) = '$bulan_tahun'
                GROUP BY concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp) );";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function laporan_buku_perbulan_pertahun($bulan_tahun)
    {
        $sql = "SELECT peminjaman.id_pinjam,anggota.id_anggota,anggota.nama_lengkap, buku.judul,peminjaman.tgl_pinjam,peminjaman.tempo,peminjaman.timestamp, peminjaman.status,peminjaman.usr_input FROM `peminjaman`
                INNER JOIN anggota
                ON peminjaman.id_anggota=anggota.id_anggota
                INNER JOIN p_buku
                ON p_buku.id_pinjam=peminjaman.id_pinjam
                INNER JOIN buku
                ON p_buku.id_buku=buku.id_buku
              WHERE status='PINJAM' AND concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) = '$bulan_tahun';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function kembali_buku_perbulan_pertahun()
    {
        $sql = "SELECT monthname(peminjaman.timestamp) AS bulan, year(peminjaman.timestamp) AS tahun, COUNT(*) AS jumlah_pinjam,concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) AS bulan_tahun FROM `peminjaman`
                WHERE status='KEMBALI'
                GROUP BY concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp) );";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function laporan_buku_kembali_perbulan_pertahun($bulan_tahun)
    {
        $sql = "SELECT peminjaman.id_pinjam,anggota.id_anggota,anggota.nama_lengkap, buku.judul,peminjaman.tgl_pinjam,peminjaman.tempo,peminjaman.timestamp, peminjaman.status,peminjaman.usr_input FROM `peminjaman`
                INNER JOIN anggota
                ON peminjaman.id_anggota=anggota.id_anggota
                INNER JOIN p_buku
                ON p_buku.id_pinjam=peminjaman.id_pinjam
                INNER JOIN buku
                ON p_buku.id_buku=buku.id_buku
              WHERE status='KEMBALI' AND concat(monthname(peminjaman.timestamp) , year(peminjaman.timestamp)) = '$bulan_tahun';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
