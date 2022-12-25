<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus-square"></i> Tambah Pinjam Buku
                </button>
                <a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/pemimjam">Kembali</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-2 mt-2">
        <div class="card ">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">foto</h5>
            </div>
            <div class="card-body">
                <h5 class="text-center"><img src="<?= base_url() ?>assets/icon/<?= $anggota['foto'] ?>" alt=""></h5>
            </div>
            <div class="card-footer">
                <div class="form-group"><label>ID Anggota</label>
                    <h4 class="h4 text-gray-800"><b><?= $anggota['id_anggota'] ?></b></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nama Lengkap -->
                <div class="form-group"><label>Nama Lengkap</label>
                    <h4 class="h4 text-gray-800"><?= $anggota['nama_lengkap'] ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-2 mt-2">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">Tabel Buku Pinjam</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center text-uppercase font-weight-bold">
                                <th>#</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Tempo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($tabel_buku as $row) {
                                ?>
                                    <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                                    <td class=" text-uppercase font-weight-bold"><?= $row['judul']; ?></td>
                                    <td class=" text-uppercase font-weight-bold"><?= $row['tgl_pinjam']; ?></td>
                                    <td class=" text-uppercase font-weight-bold"><?= $row['tempo']; ?></td>
                                    <td>
                                        <h5 class="text-center">
                                            <a class='btn btn-danger btn-sm text-uppercase font-weight-bold' href="<?= base_url() ?>Dashboard/hapus_peminjam_buku/<?= $row['id_pinjam']; ?>">Hapus</a>
                                        </h5>
                                    </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase  font-weight-bold text-white" id="exampleModalLabel">Tambah Anggota</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('Dashboard/simpan_peminjam') ?>
                <div class="form-group">
                    <label>ID Pinjam</label>
                    <input type="text" class="form-control" value="<?= $anggota['id_anggota'] ?>" name="id_anggota" readonly>
                </div>
                <div class="form-group">
                    <label>Buku</label>
                    <select class="form-control" name="id_buku">
                        <option class="bg-info text-white" disabled>Kategori</option>
                        <?php foreach ($buku as $row) { ?>
                            <option value="<?= $row['id_buku']; ?>"><?= $row['judul']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam">
                </div>
                <div class="form-group">
                    <label>Tanggal Tempo</label>
                    <input type="date" class="form-control" name="tempo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>