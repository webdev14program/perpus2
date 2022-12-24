<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class Dashboard extends CI_Controller
{

    public function index()
    {
        $isi['anggota'] = $this->Model_anggota->countAngota();
        $isi['buku'] = $this->Model_buku->countBuku();
        $isi['penerbit'] = $this->Model_penerbit->countPenerbit();
        $isi['kategori'] = $this->Model_kategori->countKategori();
        $isi['pengadaan'] = $this->Model_pengadaan->countPengadaan();
        $isi['pinjam'] = $this->Model_pinjam->countPinjam();
        $isi['rak'] = $this->Model_rak->countRak();
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

    public function upload_anggota()
    {
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);


                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    $save   = array();
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {

                            $cells = $row->getCells();

                            // $data = array(
                            //     'id_penerbit'              => $cells[0],
                            //     'penerbit'     => $cells[1],
                            //     'keterangan'            => $cells[2],
                            // );

                            $data = array(
                                'id_anggota' => $cells[0],
                                'nama_lengkap' => $cells[1],
                                'notelp' => $cells[2],
                                'jk' => $cells[3],
                                'tempat' => $cells[4],
                                'tgllahir' => $cells[5],
                                'umur' => $cells[6],
                                'alamat' => $cells[7],
                                'foto' => $cells[8],
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_anggota->simpan_anggota($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Annggota Berhasil Di Upload</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
                    redirect('Dashboard/anggota');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
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

    public function upload_kategori()
    {
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);


                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    $save   = array();
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {

                            $cells = $row->getCells();

                            $data = array(
                                'id_kategori'              => $cells[0],
                                'kategori'     => $cells[1],
                                'keterangan'            => $cells[2],
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_kategori->simpan_katergori($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Kategori Berhasil Di Upload</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
                    redirect('Dashboard/kategori_buku');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
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

    public function penerbit()
    {
        $isi['penerbit'] = $this->Model_penerbit->dataPenerbit();
        $isi['content'] = 'tampilan_penerbit';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }


    public function hapus_all_penerbit()
    {
        $this->db->empty_table('penerbit');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Semua Penerbit Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/penerbit');
    }

    public function upload_penerbit()
    {
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);


                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    $save   = array();
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {

                            $cells = $row->getCells();

                            $data = array(
                                'id_penerbit'              => $cells[0],
                                'penerbit'     => $cells[1],
                                'keterangan'            => $cells[2],
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_penerbit->simpan_penerbit($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Penerbit Berhasil Di Upload</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
                    redirect('Dashboard/penerbit');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function simpan_penerbit()
    {
        $id_penerbit = rand(11111111, 99999999);
        $penerbit = $this->input->post('penerbit');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'id_penerbit' => $id_penerbit,
            'penerbit' => $penerbit,
            'keterangan' => $keterangan,
        );
        $this->db->insert('penerbit', $data);

        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Penerbit Berhasil Di Simpan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/penerbit');
    }

    public function hapus_penerbit($id_penerbit)
    {

        $this->db->where('id_penerbit', $id_penerbit);
        $this->db->delete('penerbit');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Penerbit Berhasil Di Hupus Berdasarkan ID</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/penerbit');
    }

    public function rak()
    {
        $isi['rak'] = $this->Model_rak->dataRak();
        $isi['content'] = 'tampilan_rak';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_rak()
    {
        $this->db->empty_table('rak');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Semua RAK Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/rak');
    }

    public function upload_rak()
    {
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);


                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    $save   = array();
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {

                            $cells = $row->getCells();

                            $data = array(
                                'id_rak'              => $cells[0],
                                'rak'     => $cells[1],
                                'keterangan'            => $cells[2],
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_rak->simpan_rak($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data RAK Berhasil Di Upload</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
                    redirect('Dashboard/rak');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function simpan_rak()
    {
        $id_rak = rand(11111111, 99999999);
        $rak = $this->input->post('rak');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'id_rak' => $id_rak,
            'rak' => $rak,
            'keterangan' => $keterangan,
        );
        $this->db->insert('rak', $data);

        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data RAK Berhasil Di Simpan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/rak');
    }

    public function hapus_rak($id_rak)
    {

        $this->db->where('id_rak', $id_rak);
        $this->db->delete('rak');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data RAK Berhasil Di Hupus Berdasarkan ID</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/rak');
    }

    public function buku()
    {
        $isi['kategori'] = $this->Model_kategori->dataKategori();
        $isi['rak'] = $this->Model_rak->dataRak();
        $isi['penerbit'] = $this->Model_penerbit->dataPenerbit();
        $isi['buku'] = $this->Model_buku->dataBuku();
        $isi['content'] = 'Buku/tampilan_buku';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_buku()
    {
        $id_buku = rand(11111111, 99999999);
        $id_penerbit = rand(11111111, 99999999);
        $id_kategori = $this->input->post('id_kategori');
        $id_penerbit = $this->input->post('id_penerbit');
        $id_rak = $this->input->post('id_rak');
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $isbn = $this->input->post('isbn');
        $jmlhal = $this->input->post('jmlhal');
        $jmlbuku = $this->input->post('jmlbuku');
        $tahun = $this->input->post('tahun');
        $sinopsis = $this->input->post('sinopsis');
        $foto = 'book.png';
        $data = array(
            'id_buku' => $id_buku,
            'id_kategori' => $id_kategori,
            'id_penerbit' => $id_penerbit,
            'id_rak' => $id_rak,
            'judul' => $judul,
            'pengarang' => $pengarang,
            'isbn' => $isbn,
            'jmlhal' => $jmlhal,
            'jmlbuku' => $jmlbuku,
            'tahun' => $tahun,
            'sinopsis' => $sinopsis,
            'foto' => $foto,

        );
        $this->db->insert('buku', $data);

        // $data_penerbit = array(
        //     'id_penerbit' => $id_penerbit,
        //     'penerbit' => $penerbit,
        //     'keterangan' => $penerbit,
        // );
        // $this->db->insert('penerbit', $data_penerbit);

        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Buku Berhasil Di Simpan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/buku');
    }

    public function hapus_all_buku()
    {
        $this->db->empty_table('buku');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Semua Buku Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/buku');
    }

    public function hapus_buku($id_buku)
    {

        $this->db->where('id_buku', $id_buku);
        $this->db->delete('buku');
        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Buku Berhasil Di Hupus Berdasarkan ID</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/buku');
    }

    public function detail_buku($id_buku)
    {
        $isi['buku'] = $this->Model_buku->detailBuku($id_buku);
        $isi['content'] = 'Buku/tampilan_detail_buku';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function pemimjam()
    {
        $isi['peminjam'] = $this->Model_anggota->dataPeminjam();
        $isi['content'] = 'Anggota/tampilan_peminjam_buku';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
