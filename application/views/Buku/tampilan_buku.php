<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">Buku</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md mt-2">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#upload">
                    <i class="fas fa-plus-square"></i> Tambah Buku
                </button>
                <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_buku"><i class="fas fa-trash"></i> Hapus all Buku</a>
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
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th>Stok Buku</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($buku as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['judul']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['penerbit']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['jmlbuku']; ?> Buku</td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['kategori']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/detail_buku/<?= $row['id_buku']; ?>"> <i class="fas fa-search"></i></a>
                                    <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_buku/<?= $row['id_buku']; ?>"> <i class="fas fa-trash"></i>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase  font-weight-bold text-white" id="exampleModalLabel">Tambah Buku</h5>
            </div>
            <div class="modal-body">
                <?= form_open('Dashboard/simpan_buku') ?>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" name="judul">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <option class="bg-info text-white" disabled>Kategori</option>
                        <?php foreach ($kategori as $row) { ?>
                            <option value="<?= $row['id_kategori']; ?>"><?= $row['id_kategori']; ?> | <?= $row['kategori']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <select class="form-control" name="id_penerbit">
                        <option class="bg-info text-white" disabled>Penerbit</option>
                        <?php foreach ($penerbit as $row) { ?>
                            <option value="<?= $row['id_penerbit']; ?>"><?= $row['id_penerbit']; ?> | <?= $row['penerbit']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rak</label>
                    <select class="form-control" name="id_rak">
                        <option class="bg-info text-white" disabled>Rak</option>
                        <?php foreach ($rak as $row) { ?>
                            <option value="<?= $row['id_rak']; ?>"><?= $row['id_rak']; ?> | <?= $row['rak']; ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pengarang</label>
                    <input type="text" class="form-control" name='pengarang'>
                </div>
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" class="form-control" name="isbn">
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Jumlah Halaman</label>
                            <input type="number" class="form-control" name="jmlhal">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input type="number" class="form-control" name="jmlbuku">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" class="form-control" name="tahun">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Sinopsi</label>
                    <textarea class="form-control" rows="3" name="sinopsis"></textarea>
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