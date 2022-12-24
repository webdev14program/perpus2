<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">Peminjaman Buku</h4>
            </div>
        </div>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center text-uppercase font-weight-bold">
                        <th>#</th>
                        <th>ID Peminjam</th>
                        <th>Nama Lengkap</th>
                        <th>Buku Pinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Tempo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($peminjam as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_pinjam']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['nama_lengkap']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['judul']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['tgl_pinjam']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['tempo']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/detail_anggota/<?= $row['id_anggota']; ?>"> <i class="fas fa-search"></i></a>
                                </h5>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>