<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">Rak</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md mt-2">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus-square"></i> Tambah Rak
                </button>
                <button type="button" class="btn btn-success btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#upload">
                    <i class="fas fa-plus-square"></i> Upload Rak
                </button>
                <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_rak"><i class="fas fa-trash"></i> Hapus all Rak</a>
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
                        <th>ID Rak</th>
                        <th>Nama Rak</th>
                        <th>Keterangan</th>
                        <th>Time Created</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($rak as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_rak']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['rak']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['keterangan']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['timestamp']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_rak/<?= $row['id_rak']; ?>"> <i class="fas fa-trash"></i>
                                    </a>
                                </h5>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-uppercase  font-weight-bold text-white" id="exampleModalLabel">Upload Kategori</h5>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Dashboard/upload_rak'); ?>
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

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase  font-weight-bold text-white" id="exampleModalLabel">Tambah RAK</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('Dashboard/simpan_rak') ?>
                <div class="form-group">
                    <label>Nama Rak</label>
                    <input type="text" class="form-control" name="rak" required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required>
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