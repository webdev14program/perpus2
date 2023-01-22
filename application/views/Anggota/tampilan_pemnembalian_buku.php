<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">Pengembalian Buku</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md mt-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center text-uppercase font-weight-bold">
                                <th>#</th>
                                <th>ID anggota</th>
                                <th>Nama Lengkap</th>
                                <th>Judul Buku</th>
                                <th>Status</th>
                                <th>Waktu Pengembalian Buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($kembali as $row) {
                                ?>
                                    <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['id_anggota']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_lengkap']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['judul']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['status']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['timestamp']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>