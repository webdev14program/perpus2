<a class="btn btn-success btn-sm mb-2" href="<?= base_url() ?>Dashboard/buku">Kembali</a>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card ">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">foto</h5>
            </div>
            <div class="card-body">
                <h5 class="text-center"><img src="<?= base_url() ?>assets/icon/<?= $buku['foto'] ?>" alt=""></h5>
            </div>
            <div class="card-footer text-muted">
                <h5 class="h4 text-gray-800 text-center">Waktu Daftar <br>
                    <?= $buku['date'] ?>
                </h5>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-2">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">Detail Buku</h5>
            </div>
            <div class="card-body">
                <div class="form-group"><label>ID Buku</label>
                    <h4 class="h4 text-gray-800"><b><?= $buku['id_buku'] ?></b></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nama Lengkap -->
                <div class="form-group"><label>Judul Buku</label>
                    <h4 class="h4 text-gray-800"><?= $buku['judul'] ?></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- NoTelepon -->
                <div class="form-group"><label>Kategori</label>
                    <h4 class="h4 text-gray-800"><?= $buku['kategori'] ?></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Pengarang</label>
                    <h4 class="h4 text-gray-800"><?= $buku['pengarang'] ?></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>ISBN</label>
                    <h4 class="h4 text-gray-800"><?= $buku['isbn'] ?></h4>
                </div>
                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Jumlah Halaman</label>
                    <h4 class="h4 text-gray-800"><?= $buku['jmlhal'] ?> Halaman</h4>
                </div>
                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Jumlah Buku</label>
                    <h4 class="h4 text-gray-800"><?= $buku['jmlbuku'] ?> Buku</h4>
                </div>

                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Tahun Penerbitan Buku</label>
                    <h4 class="h4 text-gray-800"><?= $buku['tahun'] ?></h4>
                </div>

                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Sinopsis</label>
                    <h4 class="h4 text-gray-800"><?= $buku['sinopsis'] ?></h4>
                </div>

                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Penerbit</label>
                    <h4 class="h4 text-gray-800"><?= $buku['penerbit'] ?></h4>
                </div>

                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Rak</label>
                    <h4 class="h4 text-gray-800"><?= $buku['rak'] ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>