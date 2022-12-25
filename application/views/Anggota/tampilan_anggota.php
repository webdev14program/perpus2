<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">keanggotaan</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md mt-2">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus-square"></i> Tambah Anggota
                </button>
                <button type="button" class="btn btn-success btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#upload">
                    <i class="fas fa-plus-square"></i> Upload Anggota
                </button>
                <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_anggota"><i class="fas fa-trash"></i> Hapus all anggota</a>
            </div>
        </div>
    </div>
</div>
<?= $this->session->flashdata('pesan') ?>
<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center text-uppercase font-weight-bold">
                        <th>#</th>
                        <th>ID anggota</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>No.Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($anggota as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_anggota']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['nama_lengkap']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['jk']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['notelp']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/detail_anggota/<?= $row['id_anggota']; ?>"> <i class="fas fa-search"></i></a>
                                    <a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/detail_anggota/<?= $row['id_anggota']; ?>"> <i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_anggota/<?= $row['id_anggota']; ?>"> <i class="fas fa-trash"></i></a>
                                </h5>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
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
                <?php echo form_open('Dashboard/simpan_anggota') ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telpon</label>
                    <input type="text" class="form-control" name="notelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                        <option value="laki - laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgllahir" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur</label>
                            <input type="text" class="form-control" name="umur" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3"></textarea>
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

<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-uppercase  font-weight-bold text-white" id="exampleModalLabel">Upload Anggota</h5>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Dashboard/upload_anggota'); ?>
                <div class="form-group">
                    <input type="file" name="excel" class="form-control-file" name="file" required accept=".xlsx">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="upload" class="btn btn-primary">Upload</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>