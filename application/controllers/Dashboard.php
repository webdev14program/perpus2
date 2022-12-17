<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $isi['anggota'] = $this->Model_anggota->countAngota();
        $isi['content'] = 'tampilan_home';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function anggota()
    {
        $isi['anggota'] = $this->Model_anggota->dataAngota();
        $isi['content'] = 'Anggota/tampilan_anggota';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_anggota()
    {
        $this->db->empty_table('anggota');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Semua Anggota Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/anggota');
    }

    public function simpan_anggota()
    {
        $id_anggota = rand(11111111, 99999999);
        $nama_lengkap = $this->input->post('nama_lengkap');
        $notelp = $this->input->post('notelp');
        $jk = $this->input->post('jk');
        $tempat = $this->input->post('tempat');
        $tgllahir = $this->input->post('tgllahir');
        $umur = $this->input->post('umur');
        $alamat = $this->input->post('alamat');
        $foto = 'man.png';
        $data = array(
            'id_anggota' => $id_anggota,
            'nama_lengkap' => $nama_lengkap,
            'notelp' => $notelp,
            'jk' => $jk,
            'tempat' => $tempat,
            'tgllahir' => $tgllahir,
            'umur' => $umur,
            'alamat' => $alamat,
            'foto' => $foto,
        );
        $this->db->insert('anggota', $data);

        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Anggota Berhasil Di Simpan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/anggota');


        redirect('Dashboard/anggota');
    }

    public function detail_anggota($id_anggota)
    {
        $isi['anggota'] = $this->Model_anggota->detail_Angota($id_anggota);
        $isi['content'] = 'Anggota/tampilan_detail_anggota';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_anggota($id_anggota)
    {

        $this->db->where('id_anggota', $id_anggota);
        $this->db->delete('anggota');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Anggota Berhasil Di Hupus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/anggota');
    }

    public function kategori_buku()
    {
        $isi['kategori'] = $this->Model_kategori->dataKategori();
        $isi['content'] = 'tampilan_kategori_buku';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_kategori()
    {
        $this->db->empty_table('kategori');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Semua kategori Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/kategori_buku');
    }

    public function simpan_kategori()
    {
        $id_kategori = rand(11111111, 99999999);
        $kategori = $this->input->post('kategori');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'id_kategori' => $id_kategori,
            'kategori' => $kategori,
            'keterangan' => $keterangan,
        );
        $this->db->insert('kategori', $data);

        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Kategori Berhasil Di Simpan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/kategori_buku');
    }

    public function hapus_kategori($id_kategori)
    {

        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Kategori Berhasil Di Hupus Berdasarkan ID</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/kategori_buku');
    }
}
