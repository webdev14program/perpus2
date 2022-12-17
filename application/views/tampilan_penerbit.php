<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">Penerbit</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md mt-2">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#upload">
                    <i class="fas fa-plus-square"></i> Tambah Penerbit
                </button>
                <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_penerbit"><i class="fas fa-trash"></i> Hapus all Penerbit</a>
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
                        <th>ID Penerbit</th>
                        <th>Nama Penerbit</th>
                        <th>Keterangan</th>
                        <th>Time Created</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($penerbit as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_penerbit']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['penerbit']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['keterangan']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['timestamp']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_penerbit/<?= $row['id_penerbit']; ?>"> <i class="fas fa-trash"></i>
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase  font-weight-bold text-white" id="exampleModalLabel">Tambah Penerbit</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('Dashboard/simpan_penerbit') ?>
                <div class="form-group">
                    <label>Nama Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" required>
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