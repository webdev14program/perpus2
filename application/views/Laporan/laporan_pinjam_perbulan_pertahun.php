<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body bg-primary">
                <h4 class="text-center text-uppercase text-white font-weight-bold">Laporan Peminjaman Buku</h4>
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
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Jumlah Peminjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($laporan_pinjam as $row) {
                                ?>
                                    <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['bulan']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['jumlah_pinjam']; ?> Orang</td>
                                    <td class=" text-uppercase font-weight-bold">
                                        <h5 class="text-center">
                                            <a class="text-uppercase font-weight-bold btn btn-danger text-white btn-sm" href="<?= base_url() ?>Dashboard/print_laporan_pinjam/<?= $row['bulan_tahun'] ?>" target="_blank"><i class="fas fa-print"></i> Print</a>
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